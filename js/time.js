var script = document.createElement('script');
script.src = 'js/jquery-3.6.3.min.js';
document.getElementsByTagName('head')[0].appendChild(script);

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
    s:5,
    dx:0,
    dy:-6
}
const brick = {
    row:4,
    column:5,
    width:100,
    height:20,
    marginTop:20,
    offsetLeft:50,
    offsetTop:20,
}

let run = true;
let bricks = [];
let level = 1;
let lives = 3;
let millisecond = 5;
let leftArrow = false;
let rightArrow = false;

let timer = setInterval(Timer, 1000);

function PaddleCollision(){
    if (ball.y>paddle.y && ball.y<paddle.y+paddle.height && ball.x>paddle.x && ball.x<paddle.x+paddle.width){
        let point = ball.x - (paddle.x+paddle.width/2);
        point = point / (paddle.width/2);
        let a = point * (Math.PI/3);
        ball.dx = ball.s * Math.sin(a);
        ball.dy = -ball.s * Math.cos(a);
        multiplier = 1;
    }
}

function PaddleMove(){
    if (rightArrow && paddle.x+paddle.width < cvs.width)
        paddle.x += paddle.dx;
    if (leftArrow && paddle.x > 0)
        paddle.x -= paddle.dx;
}

function PaddleDraw(){
    ctx.fillStyle = "black";
    ctx.fillRect(paddle.x, paddle.y, paddle.width, paddle.height);
    ctx.strokeStyle = "white";
    ctx.strokeRect(paddle.x, paddle.y, paddle.width, paddle.height);
}

function PaddleReset(){
    paddle.x = cvs.width/2 - 150/2;
    paddle.y = cvs.height - 20 - 50;
}

function BallMove(){
    ball.x += ball.dx;
    ball.y += ball.dy;
}

function BallDraw(){
    ctx.beginPath();
    ctx.arc(ball.x, ball.y, ball.r, 0, Math.PI*2);
    ctx.fillStyle = "black";
    ctx.fill();
    ctx.strokeStyle = "white";
    ctx.stroke();
    ctx.closePath();
}

function BallReset(){
    ball.x = cvs.width/2;
    ball.y = paddle.y-10;
    ball.dx = 0;
    ball.dy = -6;
}

function WallCollision(){
    if (ball.x+ball.r > cvs.width || ball.x-ball.r < 0)
        ball.dx = -ball.dx;
    if (ball.y-ball.r < 0)
        ball.dy = -ball.dy;
    if (ball.y+ball.r > cvs.height){
        lives--;
        document.getElementById("lives").innerHTML = "Életek: " + lives;
        BallReset();
        PaddleReset();
    }
}

function BrickReset(){
    for (let i = 0; i < brick.row; i++){
        bricks[i] = [];
        for (let j = 0; j < brick.column; j++){
            bricks[i][j]={
                x:j*(brick.width+brick.offsetLeft)+brick.offsetLeft,
                y:i*(brick.height+brick.offsetTop)+brick.offsetTop+brick.marginTop,
                status:true
            };
        }
    }
}

function BrickDraw(){
    for (let i = 0; i < brick.row; i++){
        for (let j = 0; j < brick.column; j++){
            if(bricks[i][j].status){
                ctx.fillStyle = "black";
                ctx.fillRect(bricks[i][j].x, bricks[i][j].y, brick.width, brick.height);
                if (i < 4)
                    ctx.strokeStyle = "lime";
                else if (i < 6)
                    ctx.strokeStyle = "yellow";
                else if (i < 8)
                    ctx.strokeStyle = "orange";
                else
                    ctx.strokeStyle = "red";
                ctx.strokeRect(bricks[i][j].x, bricks[i][j].y, brick.width, brick.height);
            }
        }
    }
}

function BrickCollision(){
    for (let i = 0; i < brick.row; i++){
        for (let j = 0; j < brick.column; j++){
            let temp = bricks[i][j];
            if (temp.status){
                if (ball.x+ball.r>temp.x && ball.x-ball.r<temp.x+brick.width && ball.y+ball.r>temp.y && ball.y-ball.r<temp.y+brick.height){
                    bricks[i][j].status = false;
                    ball.dy = -ball.dy;
                }
            }
        }
    }
}

function Lose(){
    debugger;
    run = false;
    clearInterval(timer);
    ctx.clearRect(0, 0, cvs.width, cvs.height);
    ctx.fillStyle = "black";
    ctx.fillRect(295, 255, 210, 90);
    ctx.strokeStyle = "white";
    ctx.strokeRect(295, 255, 210, 90);
    ctx.fillStyle = "white"
    ctx.font = "30px Comic Sans MS";
    ctx.fillText("VESZTETTÉL", 303, 310);
}

function Win(){
    if (ball.s <= 8)
        ball.s += 1;
    if (brick.row <= 10)
        brick.row++;
    level++;
    document.getElementById("prog").innerHTML = "Szint: " + level;
    BrickReset();
    BallReset();
    PaddleReset();
}

function RunCheck(){
    if (lives <= 0)
        Lose();
    else{
        for (let i = 0; i < brick.row; i++){
            for (let j = 0; j < brick.column; j++){
                if (bricks[i][j].status)
                    return;
            }
        }
        Win();
    }
}

function Draw(){
    ctx.clearRect(0, 0, cvs.width, cvs.height);
    BallDraw();
    PaddleDraw();
    BrickDraw();
}

function Update(){
    PaddleMove();
    WallCollision();
    PaddleCollision();
    BrickCollision();
    BallMove();
}

function GameLoop(){
    Update();
    Draw();
    RunCheck();
    if (run)
        requestAnimationFrame(GameLoop);
}

function Main(){
    BrickReset();
    GameLoop();
}

function Timer()
{
    millisecond--;
    if (millisecond < 0)
    {
        Lose();
        millisecond = 0;
    }
    document.getElementById("second").innerHTML = Format(millisecond % 60);
    document.getElementById("minute").innerHTML = Format(parseInt(millisecond / 60));
}

function Format(value)
{
    var element = value + "";
    if (element.length < 2)
        return "0" + element;
    else
        return element;
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