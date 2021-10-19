var canvas = document.getElementById("canvas")
var ctx = canvas.getContext("2d")
/*
ctx.beginPath();
ctx.moveTo(100,100);
ctx.lineTo(200,200);
ctx.strokeStyle = "red";
ctx.stroke();


ctx.beginPath();
ctx.moveTo(200,200);
ctx.lineTo(200,100);
ctx.strokeStyle = "green";
ctx.stroke();
*/
function rysujPlansze() {
    ctx.beginPath();
    ctx.moveTo(0,0);
    ctx.lineTo(640,0);
    ctx.lineTo(640,480);
    ctx.lineTo(0,480);
    ctx.lineTo(0,0);
    ctx.strokeStyle = "pink";
    ctx.stroke();
}


class Ball {
    constructor(x,y) {
        this.x = x;
        this.y = y;
        this.r = 5;
        this.dx = 2;
        this.dy = 2;
        this.color = "black"
    }
    rysuj(ctx) {
        ctx.beginPath();
        ctx.arc(this.x,this.y,this.r,0,Math.PI*2);
        // ctx.strokeStyle="black";
        // ctx.stroke();
        ctx.fillStyle = this.color;
        ctx.fill();
    }
    ruch() {
        this.x = this.x + this.dx;
        this.y = this.y + this.dy;
        //odbij od dołu
        if (this.y>(480-this.r)) {
            this.y = 480 - this.r;
            this.dy = -this.dy;
        }
        // odbij od prawej
        if (this.x > (640 - this.r)) {
            this.x = 640 - this.r;
            this.dx = -this.dx;
        }
        // od gory
        if (this.y < this.r) {
            this.y = this.r;
            this.dy = -this.dy;
        }
        // od lewej
        if (this.x < this.r) {
            this.x = this.r;
            this.dx = -this.dx;
        }
    }
}

var pilka = new Ball(100,100);

var pilki = [];
for (i=0;i<1000;i++) {
    x = Math.floor(Math.random()*600)+20;
    y = Math.floor(Math.random()*440)+20;
    // -3 3
    dx = Math.floor(Math.random()*6)-3;
    dy = Math.floor(Math.random()*6)-3;
    // 3 10
    r = Math.floor(Math.random()*7)+3;
    var pilka = new Ball(x,y);
    pilka.dx=dx;
    pilka.dy = dy;
    pilka.r = r;
    // black
    // rgb(0,0,0)
    cr = Math.floor(Math.random()*256);
    cg = Math.floor(Math.random()*256);
    cb = Math.floor(Math.random()*256);
    pilka.color="rgb("+cr+","+cg+","+cb+")";

    pilki.push(pilka);
}


function klatka() {
    ctx.clearRect(0,0,640,480);
    for (i=0;i<1000;i++) {
        pilka = pilki[i];
        pilka.ruch();
        pilka.rysuj(ctx);
    }
  
    requestAnimationFrame(klatka);

}

// klatka();
// setInterval(klatka,20);
requestAnimationFrame(klatka)


// rysujPlansze();
// rysujPilke(pilka);

