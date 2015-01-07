package main

import (
	"encoding/json"
	"fmt"
	"os"
	"os/exec"
	"time"
)

type AVG_AQ struct {
	Id   uint64    `json:"id"`
	NO2  float64   `json:"no2"`
	Time time.Time `json:"time"`
}

type Configuration struct {
	Troops   []string
	Troop_Id []string
	Tokens   []string
}

//curl -sb -H "Accept: application/json" "http://ljusplusplus.se:8080/aq"
var green, yellow float64
var greenTroop, redTroop, greenId, redId, writeToken string

func main() {
	file, _ := os.Open("../config.json")
	decoder := json.NewDecoder(file)
	config := Configuration{}
	err := decoder.Decode(&config)
	if err != nil {
		fmt.Println("error:", err)
	}
	fmt.Println(config)
	enableConfig(config)
	green = 4
	yellow = 2

	str := redTroop + "/" + redId + "/command/dis"
	runCmd(str)
	str1 := redTroop + "/" + redId + "/command/clr"
	runCmd(str1)
	str = greenTroop + "/" + greenId + "/command/dis"
	runCmd(str)
	str1 = greenTroop + "/" + greenId + "/command/clr"
	runCmd(str1)

	cmd := exec.Command("curl", "-sb", "-H", "Accept: application/json", "http://ljusplusplus.se:8888/latest")
	out, err := cmd.Output()
	if err != nil {
		fmt.Println(err.Error())
		return
	}

	fmt.Println(string(out))
	var res []AVG_AQ
	err = json.Unmarshal([]byte(out), &res)
	if err != nil {
		fmt.Println(err.Error())
		return
	}
	//	fmt.Println(res)
	for i := 0; i < len(res); i++ {
		setColors(i, res[i].NO2)
	}
}

func enableConfig(config Configuration) {
	redTroop, greenTroop = config.Troops[0], config.Troops[1]
	redId, greenId = config.Troop_Id[0], config.Troop_Id[1]
	writeToken = config.Tokens[1]
	fmt.Println(config) // prints Current Pinoccio configs
}

func setColors(order int, input float64) {
	/**
	b1 = red bench and b2 = green bench
	**/

	var b1, b2 [2]string
	if input < yellow {
		switch order {
		case 0:
			b1[0] = redTroop + "/" + redId + "/command/s3(1)"
			b2[0] = greenTroop + "/" + greenId + "/command/sit(3,0)"
			break
		case 1:
			b1[0] = redTroop + "/" + redId + "/command/s2(1)"
			b2[0] = greenTroop + "/" + greenId + "/command/sit(2,0)"
			break
		case 2:
			b1[0] = redTroop + "/" + redId + "/command/s1(1)"
			b2[0] = greenTroop + "/" + greenId + "/command/sit(1, 0)"
			break
		default:
			fmt.Println("Something went wrong..")
			break
		}
	} else if input < green {
		switch order {
		case 0:
			b1[0] = redTroop + "/" + redId + "/command/s3(1)"
			b1[1] = redTroop + "/" + redId + "/command/sit(3,1)"
			b2[0] = greenTroop + "/" + greenId + "/command/s3(1)"
			b2[1] = greenTroop + "/" + greenId + "/command/sit(3,0)"
			break
		case 1:
			b1[0] = redTroop + "/" + redId + "/command/s2(1)"
			b1[1] = redTroop + "/" + redId + "/command/sit(2,1)"
			b2[0] = greenTroop + "/" + greenId + "/command/s2(1)"
			b2[1] = greenTroop + "/" + greenId + "/command/sit(2,0)"
			break
		case 2:
			b1[0] = redTroop + "/" + redId + "/command/s1(1)"
			b1[1] = redTroop + "/" + redId + "/command/sit(1,1)"
			b2[0] = greenTroop + "/" + greenId + "/command/s1(1)"
			b2[1] = greenTroop + "/" + greenId + "/command/sit(1,0)"
			break
		default:
			fmt.Println("Something went wrong..")
			break
		}

	} else {
		switch order {
		case 0:
			b1[0] = redTroop + "/" + redId + "/command/sit(3,1)"
			b2[0] = greenTroop + "/" + greenId + "/command/s3(1)"
			break
		case 1:
			b1[0] = redTroop + "/" + redId + "/command/sit(2,1)"
			b2[0] = greenTroop + "/" + greenId + "/command/s2(1)"
			break
		case 2:
			b1[0] = redTroop + "/" + redId + "/command/sit(1,1)"
			b2[1] = greenTroop + "/" + greenId + "/command/s1(1)"
			break
		default:
			fmt.Println("Something went wrong..")
			break
		}

	}
	for i := 0; i < len(b1); i++ {
		if b1[i] != "" {
			runCmd(b1[i])
		}
		if b2[i] != "" {
			runCmd(b2[i])
		}
	}

}

func runCmd(command string) {
	c := "https://api.pinocc.io/v1/" + command + "?token=" + writeToken
	out, err := exec.Command("curl", c).Output()
	if err != nil {
		fmt.Println("error occured")
		fmt.Printf("%s", err)
	}
	fmt.Println(string(out))
}
