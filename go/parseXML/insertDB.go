package main

import(
//	"fmt"
	"github.com/ziutek/mymysql/mysql"
        _ "github.com/ziutek/mymysql/native" // Native engine
        // _ "github.com/ziutek/mymysql/thrsafe" // Thread safe engine
	"time"
)

type insertInfo struct{
	Table string
	ColName[2] string
	NO2_AVG float64
	Time time.Time

}

func (iF *insertInfo) insertData(db mysql.Conn) {
	var stmtString string
	stmtString = "insert into " + iF.Table +"("+iF.ColName[0]+", "+iF.ColName[1]+") values(?, ?)"
//	fmt.Println(iF)
 	stmt, err := db.Prepare(stmtString)
        _, err = stmt.Run(iF.NO2_AVG, iF.Time)
        if err != nil {
		panic(err)
	}
}
