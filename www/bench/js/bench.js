function rgb(r, g, b) {
    return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
}

var speedMax = 30

var freq = 0.25; // 0.25 - 2
var updateIntervalMs = 250; // ms
var range = [150, 255];
var baseColor = [0, 0, 0];
var colorMult = [1, 0, 0.8];
var i = 0;
var size = 0;

var left_active = 0;
var right_active = 0;
var center_active = 0;

var left_active_2 = 0;
var right_active_2 = 0;
var center_active_2 = 0;


function getStatus() {

    

    var Url = "http://ljusplusplus.se:8080/status";
    xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", Url, true);
    xmlHttp.send(null);

    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        	var json = xmlHttp.responseText;
        	var obj  = JSON.parse(json)

            for (i = obj.length-6; i < obj.length; i++) { 
            isActive(obj[i].status, obj[i].seat, obj[i].bench_id)
    
            }

        }
    };

}

function getStatus_post(status, seat, id) {

    var data = {};
    data.status = status;
    data.bench_id = id;
    data.seat = seat; 
    var Url = "http://ljusplusplus.se:8080/status";
    xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", Url, true);
    xmlHttp.send(JSON.stringify(data));

    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            console.log("Post done: ");

        }
    };

}


function testAll_on(){
    getStatus_post(1, 1, 1)
    getStatus_post(1, 2, 1)
    getStatus_post(1, 3, 1)

    getStatus_post(1, 1, 2)
    getStatus_post(1, 2, 2)
    getStatus_post(1, 3, 2)
 
}

function testAll_off(){
    getStatus_post(0, 1, 1)
    getStatus_post(0, 2, 1)
    getStatus_post(0, 3, 1)

    getStatus_post(0, 1, 2)
    getStatus_post(0, 2, 2)
    getStatus_post(0, 3, 2)
 
}

function isActive(active, seat, id) {

    //This bench
    if (seat == 1 && id == 1) {
        //console.log("Seat 1_1 change status")
        left_active = active
    }

    if (seat == 2 && id == 1) {
        //console.log("Seat 1_2 change status")
        center_active = active
    }

    if (seat == 3 && id == 1 ) {
        //console.log("Seat 1_3 change status")
        right_active = active
    }
    //Other bench
    if (seat == 1 && id == 2) {
        //console.log("Seat 2_1 change status")
        left_active_2 = active
    }

    if (seat == 2 && id == 2) {
        //console.log("Seat 2_2 change status")
        center_active_2 = active
    }

    if (seat == 3 && id == 2 ) {
        //console.log("Seat 2_3 change status")
        right_active_2 = active
    }
}

function status(){
    console.log("Bench id 1: Left: "+ left_active+ ", Center: " + center_active + ", Right: " + right_active);
    console.log("Bench id 2: Left: "+ left_active_2 + ", Center: " + center_active_2 + ", Right: "   + right_active_2);
}

function bench() {
    //console.log("Controll that the function is looping")
    getStatus()

    canvas = document.createElement('canvas');

    if (canvas && canvas.getContext) {
        // Initaliase a 2-dimensional drawing context
        ctx = canvas.getContext('2d');
        width = 374;
        height = 428;
        canvas.width = width;
        canvas.height = height;

        bg = new Image();
        bg.onload = function() {
            ctx.clearRect(0, 0, width, height);
            ctx.drawImage(bg, 0, 0);

            fg_right = new Image();
            fg_center = new Image();
            fg_left = new Image();

            benchLight = document.createElement('canvas');
            benchLight.width = width;
            benchLight.height = height;

            if ((left_active == false) && (right_active == false) && (center_active == false)) {

                //console.log("No one is using the bench")
                document.getElementById("bench-right").style.backgroundImage = "url(" + canvas.toDataURL() + ")";

            }



            if (left_active == true) {

                fg_left.onload = function() {
                    //console.log("Left is active: ")

                    left = benchLight.getContext('2d');

                    var d = range[1] - range[0];
                    var t = (updateIntervalMs * i) * 0.001
                    var s = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t);
                    var s1 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.3);
                    var s2 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.5);
                    i = i + 1;

                    left.drawImage(fg_left, 0, 0);

                    op_left = left.getImageData(0, 0, width, height);
                    np_left = left.getImageData(0, 0, width, height);


                    for (var I = 0, L = op_left.data.length; I < L; I += 4) {
                        if (np_left.data[I + 3] > 0) // If it's not a transparent pixel
                        {
                            np_left.data[I] = baseColor[0] + colorMult[0] * s;
                            np_left.data[I + 1] = baseColor[1] + colorMult[1] * s1;
                            np_left.data[I + 2] = baseColor[2] + colorMult[2] * s2;
                        }
                    }

                    ctx.putImageData(np_left, 0, 0);

                    ctx.globalCompositeOperation = "destination-over";
                    ctx.drawImage(bg, 0, 0);
                    //console.log("Animate left:")
                    //console.log("Animate left: if ")
                    document.getElementById("bench-right").style.backgroundImage = "url(" + canvas.toDataURL() + ")";
                }
                fg_left.src = 'images/bench/rightbench_leftseat.gif';


            } else {
                //will use center_col to select color
                //console.log("Animate left: else")

            }

            if (center_active == true) {
                fg_center.onload = function() {
                    //console.log("center is active: ")

                    center = benchLight.getContext('2d');

                    var d = range[1] - range[0];
                    var t = (updateIntervalMs * i) * 0.001
                    var s = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t);
                    var s1 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.3);
                    var s2 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.5);
                    i = i + 1;

                    center.drawImage(fg_center, 0, 0);

                    op_center = center.getImageData(0, 0, width, height);
                    np_center = center.getImageData(0, 0, width, height);


                    for (var I = 0, L = op_center.data.length; I < L; I += 4) {
                        if (np_center.data[I + 3] > 0) // If it's not a transparent pixel
                        {
                            np_center.data[I] = baseColor[0] + colorMult[0] * s;
                            np_center.data[I + 1] = baseColor[1] + colorMult[1] * s1;
                            np_center.data[I + 2] = baseColor[2] + colorMult[2] * s2;
                        }
                    }

                    ctx.putImageData(np_center, 0, 0);

                    ctx.globalCompositeOperation = "destination-over";
                    ctx.drawImage(bg, 0, 0);
                    //console.log("Animate left:")
                    //console.log("Animate left: if ")
                    document.getElementById("bench-right").style.backgroundImage = "url(" + canvas.toDataURL() + ")";
                }
                fg_center.src = 'images/bench/rightbench_middleseat.gif';


            } else {
                //will use right and left to select color
            }

            if (right_active == true) {
                fg_right.onload = function() {
                    //console.log("right is active: ")

                    right = benchLight.getContext('2d');

                    var d = range[1] - range[0];
                    var t = (updateIntervalMs * i) * 0.001
                    var s = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t);
                    var s1 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.3);
                    var s2 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.5);
                    i = i + 1;

                    right.drawImage(fg_right, 0, 0);

                    op_right = right.getImageData(0, 0, width, height);
                    np_right = right.getImageData(0, 0, width, height);


                    for (var I = 0, L = op_right.data.length; I < L; I += 4) {
                        if (np_right.data[I + 3] > 0) // If it's not a transparent pixel
                        {
                            np_right.data[I] = baseColor[0] + colorMult[0] * s;
                            np_right.data[I + 1] = baseColor[1] + colorMult[1] * s1;
                            np_right.data[I + 2] = baseColor[2] + colorMult[2] * s2;
                        }
                    }

                    ctx.putImageData(np_right, 0, 0);

                    ctx.globalCompositeOperation = "destination-over";
                    ctx.drawImage(bg, 0, 0);
                    //console.log("Animate left:")
                    //console.log("Animate left: if ")
                    document.getElementById("bench-right").style.backgroundImage = "url(" + canvas.toDataURL() + ")";
                }
                fg_right.src = 'images/bench/rightbench_rightseat.gif';


            } else {
                //will use center to select color


            }

            //            document.getElementById("bench-right").style.backgroundImage = "url(" + canvas.toDataURL() + ")";
        }
        bg.src = "images/bench/rightbench.gif";


        ctx_2 = canvas.getContext('2d');
        width = 374;
        height = 428;
        canvas.width = width;
        canvas.height = height;

        bg_2 = new Image();
        bg_2.onload = function() {
            ctx_2.clearRect(0, 0, width, height);
            ctx_2.drawImage(bg_2, 0, 0);

            fg_right_2 = new Image();
            fg_center_2 = new Image();
            fg_left_2 = new Image();

            benchLight_2 = document.createElement('canvas');
            benchLight_2.width = width;
            benchLight_2.height = height;

            if ((left_active_2 == false) && (right_active_2 == false) && (center_active_2 == false)) {

                //console.log("No one is using the bench")
                document.getElementById("bench-left").style.backgroundImage = "url(" + canvas.toDataURL() + ")";

            }



            if (left_active_2 == true) {

                fg_left_2.onload = function() {
                    //console.log("Left is active: ")

                    left_2 = benchLight_2.getContext('2d');

                    var d = range[1] - range[0];
                    var t = (updateIntervalMs * i) * 0.001
                    var s = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t);
                    var s1 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.3);
                    var s2 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.5);
                    i = i + 1;

                    left_2.drawImage(fg_left_2, 0, 0);

                    op_left_2 = left_2.getImageData(0, 0, width, height);
                    np_left_2 = left_2.getImageData(0, 0, width, height);


                    for (var I = 0, L = op_left_2.data.length; I < L; I += 4) {
                        if (np_left_2.data[I + 3] > 0) // If it's not a transparent pixel
                        {
                            np_left_2.data[I] = baseColor[0] + colorMult[0] * s;
                            np_left_2.data[I + 1] = baseColor[1] + colorMult[1] * s1;
                            np_left_2.data[I + 2] = baseColor[2] + colorMult[2] * s2;
                        }
                    }

                    ctx_2.putImageData(np_left_2, 0, 0);

                    ctx_2.globalCompositeOperation = "destination-over";
                    ctx_2.drawImage(bg_2, 0, 0);
                    //console.log("Animate left:")
                    //console.log("Animate left: if ")
                    document.getElementById("bench-left").style.backgroundImage = "url(" + canvas.toDataURL() + ")";
                }
                fg_left_2.src = 'images/bench/leftbench_leftseat.gif';


            } else {
                //will use center_col to select color
                //console.log("Animate left: else")

            }

            if (center_active_2 == true) {
                fg_center_2.onload = function() {
                    //console.log("center is active: ")

                    center_2 = benchLight_2.getContext('2d');

                    var d = range[1] - range[0];
                    var t = (updateIntervalMs * i) * 0.001
                    var s = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t);
                    var s1 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.3);
                    var s2 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.5);
                    i = i + 1;

                    center_2.drawImage(fg_center_2, 0, 0);

                    op_center_2 = center_2.getImageData(0, 0, width, height);
                    np_center_2 = center_2.getImageData(0, 0, width, height);


                    for (var I = 0, L = op_center_2.data.length; I < L; I += 4) {
                        if (np_center_2.data[I + 3] > 0) // If it's not a transparent pixel
                        {
                            np_center_2.data[I] = baseColor[0] + colorMult[0] * s;
                            np_center_2.data[I + 1] = baseColor[1] + colorMult[1] * s1;
                            np_center_2.data[I + 2] = baseColor[2] + colorMult[2] * s2;
                        }
                    }

                    ctx_2.putImageData(np_center_2, 0, 0);

                    ctx_2.globalCompositeOperation = "destination-over";
                    ctx_2.drawImage(bg_2, 0, 0);
                    //console.log("Animate left:")
                    //console.log("Animate left: if ")
                    document.getElementById("bench-left").style.backgroundImage = "url(" + canvas.toDataURL() + ")";
                }
                fg_center_2.src = 'images/bench/leftbench_middleseat.gif';


            } else {
                //will use right and left to select color
            }

            if (right_active_2 == true) {
                fg_right_2.onload = function() {
                    //console.log("right is active: ")

                    right_2 = benchLight_2.getContext('2d');

                    var d = range[1] - range[0];
                    var t = (updateIntervalMs * i) * 0.001
                    var s = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t);
                    var s1 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.3);
                    var s2 = range[0] + d / 2 + (d / 2) * Math.sin(2 * Math.PI * freq * t + Math.PI * 0.5);
                    i = i + 1;

                    right_2.drawImage(fg_right_2, 0, 0);

                    op_right_2 = right_2.getImageData(0, 0, width, height);
                    np_right_2 = right_2.getImageData(0, 0, width, height);


                    for (var I = 0, L = op_right_2.data.length; I < L; I += 4) {
                        if (np_right_2.data[I + 3] > 0) // If it's not a transparent pixel
                        {
                            np_right_2.data[I] = baseColor[0] + colorMult[0] * s;
                            np_right_2.data[I + 1] = baseColor[1] + colorMult[1] * s1;
                            np_right_2.data[I + 2] = baseColor[2] + colorMult[2] * s2;
                        }
                    }

                    ctx_2.putImageData(np_right_2, 0, 0);

                    ctx_2.globalCompositeOperation = "destination-over";
                    ctx_2.drawImage(bg_2, 0, 0);
                    //console.log("Animate left:")
                    //console.log("Animate left: if ")
                    document.getElementById("bench-left").style.backgroundImage = "url(" + canvas.toDataURL() + ")";
                }
                fg_right_2.src = 'images/bench/leftbench_rightseat.gif';


            } else {
                //will use center to select color


            }

            //            document.getElementById("bench-right").style.backgroundImage = "url(" + canvas.toDataURL() + ")";
        }
        bg_2.src = "images/bench/leftbench.gif";





    }
}





setInterval(bench, updateIntervalMs);

