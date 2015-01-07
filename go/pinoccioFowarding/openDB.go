package main

import (
	"github.com/ziutek/mymysql/mysql"
	_ "github.com/ziutek/mymysql/native" // Native engine
	// _ "github.com/ziutek/mymysql/thrsafe" // Thread safe engine
	"encoding/json"
	"fmt"
	"os"
)

type DB_config struct {
	DB_init []string 
}

var adress, db_user, db_pwd, db_name string
var configSet bool

func openDB() mysql.Conn {

	if configSet != true {
		initConfig()
	}
	db := mysql.New("tcp", "", adress, db_user, db_pwd, db_name)
	err := db.Connect()
	if err != nil {
		panic(err.Error())
	}
	return db
}

func initConfig() {
	file, _ := os.Open("db_config.json")
	decoder := json.NewDecoder(file)
	config := DB_config{}
	err := decoder.Decode(&config)
	if err != nil {
		fmt.Println("error:", err)
	}
	adress, db_name, db_user, db_pwd = config.DB_init[0], config.DB_init[1], config.DB_init[2], config.DB_init[3]
	configSet = true
}
