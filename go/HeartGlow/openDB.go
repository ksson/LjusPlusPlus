package main

import(
	
      	"github.com/ziutek/mymysql/mysql"
    	_ "github.com/ziutek/mymysql/native" // Native engine
    	// _ "github.com/ziutek/mymysql/thrsafe" // Thread safe engine
)


func openDB() mysql.Conn {
	adress := "127.0.0.1:3306"
	dbuser := "root"
	dbpwd := "lulealis"
	dbname := "d7017e"
	db := mysql.New("tcp", "", adress, dbuser, dbpwd, dbname)
	err := db.Connect()
	if err != nil {
		panic(err.Error())
	}
	return db
}
