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
var movement = 10;
var marioX;
var marioY;
var img = document.getElementById('mario');
var marioX_scale=50;
var marioY_scale=50;


function move(dir){
    if(dir== 'left'){
        if((marioX - movement) >= 0){
            console.log("Mario move left in bounds");
            marioX = marioX - movement;
            drawMario();
        } else{
            console.log('Mario move left out of bounds')
        }
    }
    if(dir== 'right'){
        if((marioX + movement) <= width - marioX_scale){
            console.log("Mario move right in bounds");
            marioX = marioX + movement;
            drawMario();
        }
        else{
            console.log('Mario move right out of bounds')
        }
    }
    if(dir== 'up'){
        if((marioY - movement) >= 0){
            console.log("Mario move up in bounds");
            marioY = marioY- movement;
            drawMario();
        }
        else{
            console.log('Mario move up out of bounds')
        }
    }
    if(dir== 'down'){
        if((marioY - movement) <= height - marioY_scale - 20){
            console.log("Mario move down in bounds");
            marioY = marioY + movement;
            drawMario();
        }
        else{
            console.log('Mario move down out of bounds')
        }
    }

}


document.addEventListener('keydown', function(event) {
    if(event.keyCode == 37) {
        console.log('Left was pressed');
        move('left');
    }
    else if(event.keyCode == 39) {
        console.log('Right was pressed');
        move('right');
    } else if(event.keyCode == 38){
        console.log('Up was pressed');
        move('up');
    } else if(event.keyCode == 40){
        console.log('Down was pressed');
        move('down');
    }
});

function drawMario() {
    //clear(ctx);
    ctx.clearRect(0, 0,width, height);
     ctx.drawImage(img,marioX, marioY, marioX_scale,marioY_scale);
}

window.onload = function() {
   //drawSmile();

   marioX = centerX - 50;
   marioY = centerY - 50;
   drawMario();
  
}