package main

import(
	"fmt"
)


func main(){

	for {
		restartListen()
	}

	fmt.Println("Terminating Progam")
}

func restartListen(){
	fmt.Println("Restarting curlListener..")
	startListen()
}
