const cvs = document.getElementById("arkanoid");
const ctx = cvs.getContext("2d");
const paddle = {
    x:190,
    y:784,
    width:100,
    height:20,
    dx:5
}

let leftArrow = false;
let rightArrow = false;

function DrawPaddle(){
    ctx.fillStyle = "black";
    ctx.fillRect(paddle.x, paddle.y, paddle.width, paddle.height);
    ctx.strokeStyle = "white";
    ctx.strokeRect(paddle.x, paddle.y, paddle.width, paddle.height);
}

function Update(){
    if (rightArrow)
        paddle.x += paddle.dx;
    if (leftArrow)
        paddle.x -= paddle.dx;
}

function GameLoop(){
    ctx.clearRect(0, 0, cvs.width, cvs.height);
    Update();
    DrawPaddle();
    requestAnimationFrame(GameLoop);
}

document.addEventListener("keydown", function(event){
    if (event.keyCode==37){
        leftArrow = true;
        return;}
    if (event.keyCode==39){
        rightArrow = true;
        return;}
});

document.addEventListener("keyup", function(event){
    if (event.keyCode==37){
        leftArrow = false;
        return;}
    if (event.keyCode==39){
        rightArrow = false;
        return;}
});

GameLoop();