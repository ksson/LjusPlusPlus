package main

import (
	"encoding/json"
	"fmt"
	"github.com/andelf/go-curl"
	"github.com/ziutek/mymysql/mysql"
	_ "github.com/ziutek/mymysql/native" // Native engine
	"os"
	// _ "github.com/ziutek/mymysql/thrsafe" // Thread safe engine
)

type Message struct {
	Data *jData
	DB   mysql.Conn
}

type jData struct {
	Type  string
	Troop string
	Scout string
	Value *jValue
}

type jValue struct {
	Status string
	Type   string
	Name   string
	Custom []string
}

type Configuration struct {
	Troops   []string `json:"Troops"` 
	Troop_Id []string `json:"Troop_Id"`
	Tokens   []string `json:"Tokens"`
}

var redTroop, redId, greenTroop, greenId, readToken, writeToken string

func startListen() {

	file, _ := os.Open("../config.json")
	decoder := json.NewDecoder(file)
	config := Configuration{}
	err := decoder.Decode(&config)
	if err != nil {
		fmt.Println("error:", err)
	}
	enableConfig(config)
	enableProgram(writeToken)
	fmt.Println("Curl is listening to Pinoccio...")

	var m Message
	var t string
	easy := curl.EasyInit()
	defer easy.Cleanup()
	m.DB = openDB()
	m.Data = new(jData)
	m.Data.Value = new(jValue)
	easy.Setopt(curl.OPT_URL, "https://api.pinocc.io/v1/sync?token="+readToken)
	// make a callback function
	read := func(buf []byte, userdata interface{}) bool {
		err := json.Unmarshal([]byte(buf), &m)
		if err == nil && m.Data.Value.Type == "custom" && m.Data.Value.Name != "ping" {

			t = m.Data.Value.Name
			fmt.Println("Type: " + t)
			fmt.Print("\nTroop: " + m.Data.Troop)
			jd := new(jsonData)
			jd.cmdType, jd.cmdData = m.Data.Value.Name, m.Data.Value.Custom
			if m.Data.Troop == greenTroop {
				jd.filter("red", redId, writeToken)
			} else if m.Data.Troop == redTroop {
				jd.filter("green", greenId, writeToken)
			}

		}

		return true
	}

	easy.Setopt(curl.OPT_WRITEFUNCTION, read)

	if err := easy.Perform(); err != nil {
		fmt.Printf("ERROR: %v\n", err)
	}
}

func enableConfig(config Configuration) {
	redTroop, greenTroop = config.Troops[0], config.Troops[1]
	redId, greenId = config.Troop_Id[0], config.Troop_Id[1]
	readToken, writeToken = config.Tokens[0], config.Tokens[1]
	fmt.Println(config) // prints Current Pinoccio configs
}

func enableProgram(write string) {
	c := "https://api.pinocc.io/v1/" + greenTroop + "/" + greenId + "/command/en?token=" + write
	runCmd(c)
	c = "https://api.pinocc.io/v1/" + redTroop + "/" + redId + "/command/en?token=" + write
	runCmd(c)
}

func checkArguments(args []string) {
	if len(args) < 5 {
		fmt.Println("Too few arguments, 4 needed\npinoccioFowarding [redTroopId] [redId] [greenTroopId] [greenId]")
		os.Exit(0)
	} else if len(args) > 5 {
		fmt.Println("Too many arguments, only 4 needed\n pinoccioFowarding [redTroopId] [redId] [greenTroopId] [greenId]")
		os.Exit(0)
	}
}

func checkError(err error) {
	if err != nil {
		panic(err)
	}
}
