/*$(document).ready(function() {
    resize();
    draw();
    $(window).on("resize", function() {
        resize();
    });
});

function resize() {
    $("#canvas").outerHeight($(window).height() - $("#canvas").offset().top - Math.abs($("#canvas").outerHeight(true) - $("#canvas").outerHeight()) - $(".face").outerHeight() - 10);
}*/

var canvas = document.getElementById("canvas");
var ctx = canvas.getContext('2d');
var width = canvas.width;
var height = canvas.height;
var face_state = 'frown';
var centerX = width / 2;
var centerY = height / 2;
var radius = 200;

var smile_button = document.getElementById('smile');
smile_button.onclick = function() {
    if (face_state === 'smile') {
        console.log(face_state);
        face_state = 'frown';
        smile_button.innerHTML = 'Make me Happy';
        drawSmile();
    } else {
        console.log(face_state);
        face_state = 'smile';
        smile_button.innerHTML = 'Make me Sad';
        drawFrown();
    }
}

//get mouse coordinates and check with distance formula
canvas.onclick = function(e) {
	var rect = canvas.getBoundingClientRect();
	var x = e.clientX - rect.left;
	var y = e.clientY - rect.top;

	console.log("x: " + x + ', y: ' + y, ' centerX: ' + centerX + ' centerY: ' + centerY + 'radius: ' + radius);
	var dist = Math.sqrt(Math.pow((x - centerX), 2) + Math.pow((y - centerY), 2));

	if(dist <= radius){
		console.log('inside smile');
		if (face_state === 'smile') {
        console.log(face_state);
        face_state = 'frown';
        smile_button.innerHTML = 'Make me Happy';
        drawSmile();
    } else {
        console.log(face_state);
        face_state = 'smile';
        smile_button.innerHTML = 'Make me Sad';
        drawFrown();
    }

	} else {
		console.log('outside smile');
	}

}


function drawSmile() {
    //circle body
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
    ctx.fillStyle = 'blue';
    ctx.fill();
    ctx.lineWidth = 5;
    ctx.strokeStyle = '#003300';
    ctx.stroke();

    //left eye
    ctx.beginPath();
    ctx.arc(centerX - width / 8, centerY - height / 8, radius / 6, 0, 2 * Math.PI, false);
    ctx.fillStyle = 'yellow';
    ctx.fill();
    ctx.lineWidth = 5;
    ctx.strokeStyle = '#003300';
    ctx.stroke();

    //right eye
    ctx.beginPath();
    ctx.arc(centerX + width / 8, centerY - height / 8, radius / 6, 0, 2 * Math.PI, false);
    ctx.fillStyle = 'yellow';
    ctx.fill();
    ctx.lineWidth = 5;
    ctx.strokeStyle = '#003300';
    ctx.stroke();

    //smile
    ctx.beginPath();
    ctx.arc(centerX, centerY + height / 12, radius / 2, 0, Math.PI, false);
    ctx.fillStyle = 'yellow';
    ctx.fill();
    ctx.lineWidth = 5;
    ctx.strokeStyle = '#003300';
    ctx.stroke();

}

function drawFrown() {
	    //circle body
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
    ctx.fillStyle = 'red';
    ctx.fill();
    ctx.lineWidth = 5;
    ctx.strokeStyle = '#003300';
    ctx.stroke();

    //left eye
    ctx.beginPath();
    ctx.arc(centerX - width / 8, centerY - height / 8, radius / 6, 0, 2 * Math.PI, false);
    ctx.fillStyle = 'yellow';
    ctx.fill();
    ctx.lineWidth = 5;
    ctx.strokeStyle = '#003300';
    ctx.stroke();

    //right eye
    ctx.beginPath();
    ctx.arc(centerX + width / 8, centerY - height / 8, radius / 6, 0, 2 * Math.PI, false);
    ctx.fillStyle = 'yellow';
    ctx.fill();
    ctx.lineWidth = 5;
    ctx.strokeStyle = '#003300';
    ctx.stroke();

    //frown
    ctx.beginPath();
    ctx.arc(centerX, centerY + height / 6, radius / 2, Math.PI, 2 * Math.PI, false);
    
    ctx.lineWidth = 5;
    ctx.strokeStyle = '#003300';
    ctx.stroke();	
}

window.onload = function() {
    drawSmile();
}