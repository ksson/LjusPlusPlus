package main

import (
	"fmt"
	"os/exec"
)

type jsonData struct {
	cmdType string
	cmdData []string
}

func (jd jsonData) filter() {
	var forwardCmd string
	var iF insertInfo
	db := openDB()
	writeToken := "6c5da8cf710ba4d745b8b00b523a9f6a"
	troop := "12"
	fmt.Println("Preparing to forward command...")
	switch jd.cmdType {

	case "speed":
		fmt.Println("Speed:  " + jd.cmdData[0])
		forwardCmd = "speed(" + jd.cmdData[0] + ")"
		iF.Table, iF.Data[0], iF.Data[1] = "pinoccioData", "speed", jd.cmdData[0]
		iF.insertData(db)
		break
	case "spiralTop":
		fmt.Println("Spiral is done!!")
		forwardCmd = "spiraltop"
		break
	case "start":
		fmt.Println("start sent")
		forwardCmd = "start"
		break
	case "halt":
		fmt.Println("halt sent")
		forwardCmd = "halt"
		iF.Table, iF.Data[0], iF.Data[1] = "pinoccioData", "halt", "0"
		iF.insertData(db)
		break
	}
	c := "https://api.pinocc.io/v1/" + troop + "/1/command/" + forwardCmd + "?token=" + writeToken
	fmt.Println(c)
	runCmd(c)
}

func runCmd(cmd string) {
	out, err := exec.Command("curl", cmd).Output()
	if err != nil {
		fmt.Println("error occured")
		fmt.Printf("%s", err)
	}
	fmt.Println(string(out))
}
