package main

import(
	"fmt"
	"github.com/ziutek/mymysql/mysql"
        _ "github.com/ziutek/mymysql/native" // Native engine
        // _ "github.com/ziutek/mymysql/thrsafe" // Thread safe engine
)

type insertInfo struct{
	Table string
	Data [2]string

}

func (iF *insertInfo) insertData(db mysql.Conn) {
	var stmtString string
	stmtString = "insert into " + iF.Table + "(type, data1) values(?, ?)"
	fmt.Println(stmtString)
 	stmt, err := db.Prepare(stmtString)
        _, err = stmt.Run(iF.Data[0], iF.Data[1])
        if err != nil {
		panic(err)
	}
}
