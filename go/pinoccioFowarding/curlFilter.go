package main

import(
	"os/exec"
	"fmt"
	"strings"
)

type jsonData struct{
	cmdType string
	cmdData []string
}

func (jd jsonData) filter(troop string, leaderId string) {
	var forwardCmd string
	var iF insertInfo
	iF.Data[2] = troop
	db := openDB()
	writeToken := "6c5da8cf710ba4d745b8b00b523a9f6a"
	fmt.Println("Preparing to forward command...")
	if(strings.Contains(jd.cmdType, "sit")) {
		forwardCmd = jd.cmdType+"("+jd.cmdData[0]+","+jd.cmdData[1]+")"
		fmt.Println("Troop:"+ troop + "\nCommand: "+forwardCmd+"("+jd.cmdData[0]+")\n")
		seat := jd.cmdData[0]
		iF.Table, iF.Data[0], iF.Data[1] = "benchData", "1", seat
		iF.insertData(db)
	}else if(strings.Contains(jd.cmdType,"uns")){
		forwardCmd = jd.cmdType+"("+jd.cmdData[0]+")"
		fmt.Println("Troop:"+ troop + "\nCommand: "+forwardCmd+"("+jd.cmdData[0]+")\n")
		seat := jd.cmdData[0]
		iF.Table, iF.Data[0], iF.Data[1] = "benchData", "0", seat
		iF.insertData(db)
	}
	c := "https://api.pinocc.io/v1/" + troop + "/"+leaderId+"/command/" + forwardCmd + "?token=" + writeToken
	fmt.Println(c)
	runCmd(c)
}

func runCmd(cmd string){
    	out, err := exec.Command("curl",cmd ).Output()
    	if err != nil {
        	fmt.Println("error occured")
        	fmt.Printf("%s", err)
    	}
	fmt.Println(string(out))
}




