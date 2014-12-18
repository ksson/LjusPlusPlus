package main

import(
	
      	"github.com/ziutek/mymysql/mysql"
    	_ "github.com/ziutek/mymysql/native" // Native engine
    	// _ "github.com/ziutek/mymysql/thrsafe" // Thread safe engine
)


func openDB() mysql.Conn {
	db := mysql.New("tcp", "", "127.0.0.1:3306","root", "jaam","D7017E")
	err := db.Connect()
	if err != nil {
		panic(err.Error())
	}
	return db
}
