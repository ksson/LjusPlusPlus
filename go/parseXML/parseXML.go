package main
 
import (
	"encoding/xml"
	"fmt"
	"io/ioutil"
	"time"
	"os"
//	"strconv"
)
 
type Query struct {
	// Have to specify where to find episodes since this
	// doesn't match the xml tags of the data that needs to go into it
	Dynamics AirQuality `xml:"Dynamics"`
}
 
type AirQuality struct {
	AirQualityList []Data `xml:"AirQualityDynamic"`
}

type Data struct {
	LastUpdated  string
	NO2    float64
} 
 
func (d Data) String() string {
	return fmt.Sprintf(" %s - %s", d.LastUpdated, d.NO2)
}
 
func main() {
	fmt.Println(len(os.Args))
	fmt.Println(os.Args)
	fmt.Println(os.Args[0])
	if(len(os.Args) > 2){
	  fmt.Println("Too many arguments, only 1 required")
	  return
	}else if(len(os.Args) < 2){
	  fmt.Println("Too few arguments, 1 required")
	  return
	}
	
	
	xmlFile, err := os.Open(""+os.Args[1])
	if err != nil {
		fmt.Println("Error opening file:", err)
		return
	}
	defer xmlFile.Close()
 
	b, _ := ioutil.ReadAll(xmlFile)
 	var info = new(insertInfo)
	info.Table = "AirQuality"
	info.ColName[0] = "no2"
	info.ColName[1] = "time"
	var q Query
	xml.Unmarshal(b, &q)
	db := openDB()
	fmt.Println("AirPollution - Luleå")
	var no2_avg float64
	if(len(q.Dynamics.AirQualityList) < 1){
	  fmt.Println("No values to upload")
	  return
	}
	for _, quality := range q.Dynamics.AirQualityList {
//		fmt.Printf("\t%s\n", quality)
		no2_avg = no2_avg + quality.NO2
	}
	res := no2_avg / float64(len(q.Dynamics.AirQualityList))

	info.NO2_AVG = res
	info.Time  = time.Now()
	info.insertData(db)
	fmt.Println("Parsing and Upload successful!")
}
