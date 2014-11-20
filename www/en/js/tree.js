function rgb(r, g, b) {
    return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
}

var speedMax = 30

var freq = 0.25; // 0.25 - 2
var updateIntervalMs = 100; // ms
var range = [150, 255];
var baseColor = [0, 0, 0];
var colorMult = [1, 0, 0.8]; 
var i = 0;
var size = 0;


function setValues(current, avg) {
	// freq = a*speed^2
	freq = 0.25 + ((1.75)/(speedMax*speedMax))*Math.pow(current, 2);

	if(avg > 18 && avg <= 30) {
		size = 4;
	}
	else if(avg > 13 && avg <= 18) {
		size = 3;
	}
	else if(avg > 8 && avg <= 13) {
		size = 2;
	}
	else if(avg > 3 && avg <= 8) {
		size = 1;
	}
	else {
		size = 0;
	}
}

function tickGlow() {
    canvas = document.createElement('canvas');

    // Check the element is in the DOM and the browser supports canvas
    if(canvas && canvas.getContext) {
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

	        fg = new Image();
	        fg.onload = function() {
		        // create offscreen buffer, 
		        glowBuffer = document.createElement('canvas');
		        glowBuffer.width = width;
		        glowBuffer.height = height;
		        bx = glowBuffer.getContext('2d');

		        var d = range[1] - range[0];
		        var t = (updateIntervalMs*i)*0.001
		        var s = range[0] + d/2 + (d/2)*Math.sin(2*Math.PI*freq*t);
		        var s1 = range[0] + d/2 + (d/2)*Math.sin(2*Math.PI*freq*t+Math.PI*0.3);
		        var s2 = range[0] + d/2 + (d/2)*Math.sin(2*Math.PI*freq*t+Math.PI*0.5);
		        i = i+1;

		        bx.drawImage(fg, 0, 0);
		        op = bx.getImageData(0, 0, width, height);
		        np = bx.getImageData(0, 0, width, height);

		        for(var I = 0, L = op.data.length; I < L; I += 4)
		        {
		            if(np.data[I + 3] > 0) // If it's not a transparent pixel
		            {
		                np.data[I] = baseColor[0] + colorMult[0]*s;
		                np.data[I + 1] = baseColor[1] + colorMult[1]*s1;
		                np.data[I + 2] = baseColor[2] + colorMult[2]*s2;
		            }
		        }

		        ctx.putImageData(np, 0, 0);

		        ctx.globalCompositeOperation = "destination-over";
        		ctx.drawImage(bg, 0, 0);

				document.getElementById("tree").style.backgroundImage = "url(" + canvas.toDataURL() + ")";

	    	}
        	fg.src = 'images/hjarta_'+size+'.png';
	    }
	    bg.src = "images/tree.png";
 	}
}
setInterval(tickGlow, updateIntervalMs);