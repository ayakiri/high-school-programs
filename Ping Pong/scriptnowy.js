var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

class Ball {
  constructor(x, y) {
    this.x = x;
    this.y = y;
    this.r = 5;
    this.dx = 2;
    this.dy = 2;
    this.color = "black";
  }
  rysuj(ctx) {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
    // ctx.strokeStyle="black";
    // ctx.stroke();
    ctx.fillStyle = this.color;
    ctx.fill();
  }
  ruch() {
    this.x = this.x + this.dx;
    this.y = this.y + this.dy;
    //odbij od dołu
    if (this.y > 480 - this.r) {
      this.y = 480 - this.r;
      this.dy = -this.dy;
    }
    // od gory
    if (this.y < this.r) {
      this.y = this.r;
      this.dy = -this.dy;
    }
  }
}

class Pad {
  constructor(x, y) {
    this.x = x;
    this.y = y;
    this.h = 50;
    this.w = 5;
    this.dy = 0;
    this.color = "white";
  }
  rysuj(ctx) {
    ctx.beginPath();
    ctx.rect(this.x, this.y, this.w, this.h);

    ctx.fillStyle = this.color;
    ctx.fill();
  }
  ruch() {
    this.y = this.y + this.dy;
    // dol
    if (this.y > 480 - this.h) {
      this.y = 480 - this.h;
    }
    // gora
    if (this.y < 0) {
      this.y = 0;
    }
  }
}

function rysujPlansze() {
  ctx.beginPath();
  ctx.moveTo(0, 0);
  ctx.lineTo(640, 0);
  ctx.lineTo(640, 480);
  ctx.lineTo(0, 480);
  ctx.lineTo(0, 0);
  ctx.strokeStyle = "lightgrey";
  ctx.stroke();

  ctx.beginPath();
    ctx.moveTo(320, 0);
    ctx.lineTo(320,480);
    ctx.strokeStyle = "grey";
    ctx.stroke();
}

var pilka = new Ball(320, 240);
pilka.color = "white";

var rightPad = new Pad(630, 225);
var leftPad = new Pad(5, 225);

var leftScore = 0;
var rightScore= 0;

function klatka() {
  ctx.clearRect(0, 0, 640, 480);
  rysujPlansze();

  ctx.font = "50px Arial";
  ctx.fillText(leftScore, 200, 75);
  ctx.fillText(rightScore, 400, 75);

  pilka.ruch();
  

  rightPad.ruch();
  rightPad.rysuj(ctx);

  leftPad.ruch();
  leftPad.rysuj(ctx);

  // kolizja pilki z prawą paletką
  if ((pilka.dx>0) &&     //pilka leci w kierunku prawej paletki
    (pilka.x > 640 - 5 - rightPad.w - pilka.r) &&   //x
    (pilka.y >= rightPad.y) &&   //y - gorna krawedz
    (pilka.y <= rightPad.y + rightPad.h)) {  //y - dolna krawedz
        pilka.x = 640 - 5 - rightPad.w - pilka.r;
        pilka.dx = -pilka.dx;
        var sound = document.getElementById("pacsound");
        sound.play()
    }   
  
  // doleć od prawej
  if (pilka.x >= 640 - pilka.r) {
    leftScore++
    pilka.x = 320;
  }
  
  // kolizja z lewą
  if ((pilka.dx < 0) &&    //pilka leci w kierunku lewej paletki
    (pilka.x < 5 + leftPad.w + pilka.r)  && //x
    (pilka.y >= leftPad.y) &&   //y - gorna krawedz
    (pilka.y <= leftPad.y + leftPad.h)) {  //y - dolna krawedz
        pilka.x = 5 + leftPad.w + pilka.r;
        pilka.dx = -pilka.dx;
        var sound = document.getElementById("pacsound");
        sound.play()
    }

  // doleć od lewej
  if (pilka.x <= pilka.r) {
    rightScore++
    pilka.x = 320;
  }


  pilka.rysuj(ctx);

  requestAnimationFrame(klatka);
}

requestAnimationFrame(klatka);

function keyDown(event) {
  switch (event.code) {
    case "KeyK":
      rightPad.dy = -3;
      break;
    case "KeyM":
      rightPad.dy = 3;
      break;
    case "KeyA":
        leftPad.dy = -3;
        break;
    case "KeyZ":
        leftPad.dy = 3;
        break;

  }
}

// down K, down M, up K

function keyUp(event) {
  switch (event.code) {
    case "KeyK":
      if (rightPad.dy < 0) {
        rightPad.dy = 0;
      }
      break;
    case "KeyM":
      if (rightPad.dy > 0) {
        rightPad.dy = 0;
      }
      break;
    case "KeyA":
        if (leftPad.dy < 0) {
            leftPad.dy = 0;
          }
        break;
    case "KeyZ":
        if (leftPad.dy > 0) {
            leftPad.dy = 0;
          }
        break;
  }
}
