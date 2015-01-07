package main

import (
	"database/sql"
	"encoding/json"
	"flag"
	"fmt"
	"time"
	_ "github.com/ziutek/mymysql/godrv"
	"io/ioutil"
	"log"
	//"math"
	"net/http"
//	"strconv"

	"github.com/gorilla/mux"
)

// error response struct
type handlerError struct {
	Error   error
	Message string
	Code    int
}

type BenchData struct {
	Id       uint64 `json:"id"`
	Status   uint64 `json:"status"`
	Bench_Id string `json:"bench_id"`
	Seat     uint64 `json:"seat"`
	Count uint64	`json:"count"` 
}

type AirQuality struct {
	Id uint64	`json:"id"`
	NO2_AVG float64 `json:"no2"`
	Time time.Time  `json:"time"` 
}

// a custom type that we can use for handling errors and formatting responses
type handler func(w http.ResponseWriter, r *http.Request) (interface{}, *handlerError)

// attach the standard ServeHTTP method to our handler so the http library can call it
func (fn handler) ServeHTTP(w http.ResponseWriter, r *http.Request) {
	// here we could do some prep work before calling the handler if we wanted to

	// call the actual handler
	response, err := fn(w, r)

	// check for errors
	if err != nil {
		log.Printf("ERROR: %v\n", err.Error)
		http.Error(w, fmt.Sprintf(`{"error":"%s"}`, err.Message), err.Code)
		return
	}
	if response == nil {
		log.Printf("ERROR: response from method is nil\n")
		http.Error(w, "Internal server error. Check the logs.", http.StatusInternalServerError)
		return
	}

	// turn the response into JSON
	bytes, e := json.Marshal(response)
	if e != nil {
		http.Error(w, "Error marshalling JSON", http.StatusInternalServerError)
		return
	}

	// send the response and log
	w.Header().Set("Content-Type", "application/json")
	w.Header().Set("Access-Control-Allow-Origin", "*")
	w.Write(bytes)
	log.Printf("%s %s %s %d", r.RemoteAddr, r.Method, r.URL, 200)
}

/*
	List all users in the db
	!READY FOR TESTING!
*/





func getAQ(w http.ResponseWriter, r *http.Request) (interface{}, *handlerError) {
	con, err := sql.Open("mymysql", "tcp:localhost:3306*D7017E/root/jaam")
	if err != nil {
		return nil, &handlerError{err, "Local error opening DB", http.StatusInternalServerError}
		log.Fatal(err)
	}
	defer con.Close()

	rows, err := con.Query("SELECT * FROM AirQuality ORDER BY id DESC LIMIT 3")
	if err != nil {
		return nil, &handlerError{err, "Error in DB", http.StatusInternalServerError}
		//log.Printf("No user with that ID")
	}

	var result []AirQuality // create an array of stairs
	var id uint64
	var no2_avg float64
	var time time.Time

	for rows.Next() {
		aq := new(AirQuality)
		err = rows.Scan(&id, &no2_avg, &time)
		if err != nil {
			return result, &handlerError{err, "Error in DB", http.StatusInternalServerError}
		}
		aq.Id = id
		aq.NO2_AVG = no2_avg
		aq.Time = time
		result = append(result, *aq)
	}

	return result, nil
}




func getStatus(w http.ResponseWriter, r *http.Request) (interface{}, *handlerError) {
	con, err := sql.Open("mymysql", "tcp:localhost:3306*D7017E/root/jaam")
	if err != nil {
		return nil, &handlerError{err, "Local error opening DB", http.StatusInternalServerError}
		log.Fatal(err)
	}
	defer con.Close()

	rows, err := con.Query("select * from benchData")
	if err != nil {
		return nil, &handlerError{err, "Error in DB", http.StatusInternalServerError}
		//log.Printf("No user with that ID")
	}

	var result []BenchData // create an array of stairs
	var id, status, seat uint64
	var bench_id string
	for rows.Next() {
		bd := new(BenchData)
		err = rows.Scan(&id, &status, &bench_id, &seat)
		if err != nil {
			return result, &handlerError{err, "Error in DB", http.StatusInternalServerError}
		}
		bd.Id = id
		bd.Status = status
		bd.Bench_Id = bench_id
		bd.Seat = seat
		result = append(result, *bd)
	}

	return result, nil
}






func getTotal(w http.ResponseWriter, r *http.Request) (interface{}, *handlerError) {
	con, err := sql.Open("mymysql", "tcp:localhost:3306*D7017E/root/jaam")
	if err != nil {
		return nil, &handlerError{err, "Local error opening DB", http.StatusInternalServerError}
		log.Fatal(err)
	}
	defer con.Close()

	rows, err := con.Query("select COUNT(*) from benchData WHERE status = 1")
	if err != nil {
		return nil, &handlerError{err, "Error in DB", http.StatusInternalServerError}
		//log.Printf("No user with that ID")
	}

	var result []BenchData // create an array of stairs
	var count uint64
	for rows.Next() {
		bd := new(BenchData)
		err = rows.Scan(&count)
		if err != nil {
			return result, &handlerError{err, "Error in DB", http.StatusInternalServerError}
		}
		bd.Count = count
		result = append(result, *bd)
	}

	return result, nil
}

func getTest(w http.ResponseWriter, r *http.Request) (interface{}, *handlerError) {
	con, err := sql.Open("mymysql", "tcp:localhost:3306*D7017E/root/jaam")
	if err != nil {
		return nil, &handlerError{err, "Local error opening DB", http.StatusInternalServerError}
		log.Fatal(err)
	}
	defer con.Close()

	rows, err := con.Query("select * from benchData ORDER BY id DESC LIMIT 100")
	if err != nil {
		return nil, &handlerError{err, "Error in DB", http.StatusInternalServerError}
		//log.Printf("No user with that ID")
	}
	var redSeatL, greenSeatL [3]uint64
	rc := 0
	gc := 0 

	var result []BenchData // create an array of stairs
	var id, status, seat uint64
	var bench_id string

	for rows.Next() {
		bd := new(BenchData)
		err = rows.Scan(&id, &status, &bench_id, &seat)
		if err != nil {
			return result, &handlerError{err, "Error in DB", http.StatusInternalServerError}
		}

		if(bench_id == "red" && !isInArray(seat, redSeatL)){
			redSeatL[rc] = seat 
			rc = rc + 1
			bd.Id = id
			bd.Status = status
			bd.Bench_Id = bench_id
			bd.Seat = seat
			result = append(result, *bd)
		} else if(bench_id == "green" && !isInArray(seat, greenSeatL)){
			greenSeatL[gc] = seat 
			gc = gc + 1
			bd.Id = id
			bd.Status = status
			bd.Bench_Id = bench_id
			bd.Seat = seat
			result = append(result, *bd)
		}

		
	}

	return result, nil
}

func isInArray(value uint64, list [3]uint64) bool {
	for i := 0; i < len(list); i++ {
		if(value == list[i]){
			return true
		}
	} 
	return false

}

func addStatus(rw http.ResponseWriter, req *http.Request) (interface{}, *handlerError) {
	data, e := ioutil.ReadAll(req.Body)

	if e != nil {
		fmt.Println("BAD REQUEST")
		fmt.Println(string(data))
		return nil, &handlerError{e, "Can't read request", http.StatusBadRequest}
	}
	var payload BenchData
	e = json.Unmarshal(data, &payload)
	if e != nil {

		fmt.Println(e)
		fmt.Println("UNMARSHALING FAILED")
		fmt.Println(payload)
		return BenchData{}, &handlerError{e, "Could'nt parse JSON", http.StatusInternalServerError}
	}
	con, err := sql.Open("mymysql", "tcp:localhost:3306*D7017E/root/jaam")

	if err != nil {
		fmt.Println("Couldn't open DB")
		return nil, &handlerError{err, "Internal server error", http.StatusInternalServerError}
	}
	defer con.Close()
	//jimmie vill ha statiskt...... fultfultfult!!
	//fixar ickestatiskt när han har bättre tankar:P
	//typ om dobbe eller dobbelina
	// eller kanske linkeboda??
	//		OOOOOOOOO
	_, err = con.Exec("insert into benchData(status, bench_id, seat) values(?,?,?)", payload.Status, payload.Bench_Id, payload.Seat)

	if err != nil {
		fmt.Println("FAILED POSTING TO DB")
		return nil, &handlerError{err, "Error adding to DB", http.StatusInternalServerError}
	}

	return payload, nil
	//row, err := con.Query("select * from users where uid =?", param)
}

func main() {
	// command line flags
	port := flag.Int("port", 8888, "port to serve on")
//	dir := flag.String("directory", "web/", "directory of web files")
	flag.Parse()

	// connect to database
	//	connect()

	// handle all requests by serving a file of the same name
//	fs := http.Dir(*dir)
//	fileHandler := http.FileServer(fs)

	// setup routes
	router := mux.NewRouter()
	router.Handle("/", http.RedirectHandler("/static/", 302))

	// Handlers for Users
	router.Handle("/all", handler(getStatus)).Methods("GET")
	router.Handle("/latest", handler(getTest)).Methods("GET")
	router.Handle("/total", handler(getTotal)).Methods("GET")
	router.Handle("/status", handler(addStatus)).Methods("POST")

	router.Handle("/aq", handler(getAQ)).Methods("GET")
	// hämta ut infon för att lägga till ny
	/*router.Handle("/users", handler(addUser)).Methods("POST")
	router.Handle("/users/{id}", handler(getSitting)).Methods("GET")
	router.Handle("/users/{id}", handler(removeUser)).Methods("DELETE")
	*/
	http.Handle("/", router)

	log.Printf("Running on port %d\n", *port)

	addr := fmt.Sprintf("192.168.1.6:%d", *port)
	// this call blocks -- the progam runs here forever
	err := http.ListenAndServe(addr, nil)
	fmt.Println(err.Error())
}
