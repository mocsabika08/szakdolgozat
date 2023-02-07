const cvs = document.getElementById("arkanoid");
const ctx = cvs.getContext("2d");
const paddle = {
    width:150,
    height:20,
    x:cvs.width/2 - 150/2,
    y:cvs.height - 20 - 50,
    dx:7
}
const ball = {
    r:10,
    x:cvs.width/2,
    y:paddle.y-10,
    s:6,
    dx:0,
    dy:-6
}
const brick = {
    row:3,
    column:5,
    width:55,
    height:20,
    offsetLeft:20,
    offsetTop:20,
    fill:"",
    stroke:""
}

let bricks = [];
let leftArrow = false;
let rightArrow = false;
let lives = 3;

function DrawPaddle(){
    ctx.fillStyle = "black";
    ctx.fillRect(paddle.x, paddle.y, paddle.width, paddle.height);
    ctx.strokeStyle = "white";
    ctx.strokeRect(paddle.x, paddle.y, paddle.width, paddle.height);
}

function DrawBall(){
    ctx.beginPath();
    ctx.arc(ball.x, ball.y, ball.r, 0, Math.PI*2);
    ctx.fillStyle = "black";
    ctx.fill();
    ctx.strokeStyle = "white";
    ctx.stroke();
    ctx.closePath();
}

function MovePaddle(){
    if (rightArrow && paddle.x+paddle.width < cvs.width)
        paddle.x += paddle.dx;
    if (leftArrow && paddle.x > 0)
        paddle.x -= paddle.dx;
}

function MoveBall(){
    ball.x += ball.dx;
    ball.y += ball.dy;
}

function WallCollision(){
    if (ball.x+ball.r > cvs.width || ball.x-ball.r < 0){
        ball.dx = -ball.dx;
    }
    if (ball.y-ball.r < 0){
        ball.dy = -ball.dy;
    }
    if (ball.y+ball.r > cvs.height){
        lives--;
        ResetBall();
    }
}

function PaddleCollision(){
    if (ball.y>paddle.y && ball.y<paddle.y+paddle.height && ball.x>paddle.x && ball.x<paddle.x+paddle.width){
        let point = ball.x - (paddle.x+paddle.width/2);
        point = point / (paddle.width/2);
        console.log(event);
        debugger;
        let a = point * (Math.PI/3);
        ball.dx = ball.s * Math.sin(a);
        ball.dy = -ball.s * Math.cos(a);
    }
}

function ResetBall(){
    ball.x = cvs.width/2;
    ball.y = paddle.y-10;
    ball.dx = 0;
    ball.dy = -6;
}

function Draw(){
    DrawBall();
    DrawPaddle();
}

function Update(){
    MovePaddle();
    WallCollision();
    PaddleCollision();
    MoveBall();
}

function Main(){
    ctx.clearRect(0, 0, cvs.width, cvs.height);
    Update();
    Draw();
    requestAnimationFrame(Main);
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

Main();