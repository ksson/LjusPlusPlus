package main

import(
	"fmt"
	"os/exec"
	"encoding/json"
	"time"
	"os"
)

type AVG_AQ struct {
	Id uint64 `json:"id"`
	NO2 float64 `json:"no2"`
	Time time.Time  `json:"time"`

}


//curl -sb -H "Accept: application/json" "http://ljusplusplus.se:8080/aq"
var green, yellow float64
var writeToken string
var greenTroop, redTroop, greenId, redId string
func main(){
	writeToken = "6c5da8cf710ba4d745b8b00b523a9f6a" 
	green = 4
	yellow = 2
//	Check if 2 script had 4 arguemnts
	if(len(os.Args) > 5){
		fmt.Println("Too many arguements, only 2 required\n./displayAirQuality [redTroodId] [redId] [greenTroopId] [greenId]")
		os.Exit(0)
		
	}else if(len(os.Args) < 5){
		fmt.Println("Too few arguements, 2 required\n./displayAirQuality [redTroopId] [redId] [greenTroopId] [greenId]")
		os.Exit(0)
	}
	redTroop = os.Args[1]
	redId = os.Args[2]
	greenTroop = os.Args[3]
	greenId = os.Args[4]

	str := redTroop+"/"+redId+"/command/dis"
	runCmd(str)
	str1 := redTroop+"/"+redId+"/command/clr"
	runCmd(str1)
	str = greenTroop+"/"+greenId+"/command/dis"
 	runCmd(str)
	str1 = greenTroop+"/"+greenId+"/command/clr"
	runCmd(str1)

	
	cmd := exec.Command("curl","-sb","-H","Accept: application/json", "http://trollegeuna.se:8888/aq")
  	out, err := cmd.Output()
  	if err != nil {
  		fmt.Println(err.Error())
  		return
  	}

	fmt.Println(string(out))
	var res []AVG_AQ
	err = json.Unmarshal([]byte(out), &res)
	if(err != nil) {
	  fmt.Println(err.Error())
	  return
	}
//	fmt.Println(res)
	for i := 0; i < len(res); i++ {
		setColors(i, res[i].NO2)
	} 
}

func setColors(order int,input float64){
	/**
	b1 = red bench and b2 = green bench
	**/
	
	var b1, b2 [2]string
	if(input < yellow){
	  switch(order){
		case 0:
			b1[0] = redTroop+"/"+redId+"/command/s3(1)"
			b2[0] = greenTroop+"/"+greenId+"/command/sit(3,0)"
			break;
		case 1:
			b1[0] = redTroop+"/"+redId+"/command/s2(1)"
			b2[0] = greenTroop+"/"+greenId+"/command/sit(2,0)"
			break;
		case 2: 
			b1[0] = redTroop+"/"+redId+"/command/s1(1)"
			b2[0] = greenTroop+"/"+greenId+"/command/sit(1, 0)"
			break;
		default:
			fmt.Println("Something went wrong..")
			break;
	   }
	}else if(input < green){
	  switch(order){
		case 0:
			b1[0] = redTroop+"/"+redId+"/command/s3(1)"
			b1[1] = redTroop+"/"+redId+"/command/sit(3,1)"
			b2[0] = greenTroop+"/"+greenId+"/command/s3(1)"
			b2[1] = greenTroop+"/"+greenId+"/command/sit(3,0)"
			break;
		case 1:
			b1[0] = redTroop+"/"+redId+"/command/s2(1)"
			b1[1] = redTroop+"/"+redId+"/command/sit(2,1)"
			b2[0] = greenTroop+"/"+greenId+"/command/s2(1)"
			b2[1] = greenTroop+"/"+greenId+"/command/sit(2,0)"
			break;
		case 2: 
			b1[0] = redTroop+"/"+redId+"/command/s1(1)"
			b1[1] = redTroop+"/"+redId+"/command/sit(1,1)"
			b2[0] = greenTroop+"/"+greenId+"/command/s1(1)"
			b2[1] = greenTroop+"/"+greenId+"/command/sit(1,0)"
			break;
		default:
			fmt.Println("Something went wrong..")
			break;
	   }

	}else{
	  switch(order){
		case 0:
			b1[0] = redTroop+"/"+redId+"/command/sit(3,1)"
			b2[0] = greenTroop+"/"+greenId+"/command/s3(1)"
			break;
		case 1:
			b1[0] = redTroop+"/"+redId+"/command/sit(2,1)"
			b2[0] = greenTroop+"/"+greenId+"/command/s2(1)"
			break;
		case 2: 
			b1[0] = redTroop+"/"+redId+"/command/sit(1,1)"
			b2[1] = greenTroop+"/"+greenId+"/command/s1(1)"
			break;
		default:
			fmt.Println("Something went wrong..")
			break;
	   }

	}
	for i := 0; i < len(b1); i++{
		if(b1[i] != ""){
	       		runCmd(b1[i])
		}
		if(b2[i] != ""){
			runCmd(b2[i])
		}
	}

}


func runCmd(command string){
	c := "https://api.pinocc.io/v1/"+command+"?token="+writeToken
        out, err := exec.Command("curl",c ).Output()
        if err != nil {
                fmt.Println("error occured")
                fmt.Printf("%s", err)
        }
        fmt.Println(string(out))
}


