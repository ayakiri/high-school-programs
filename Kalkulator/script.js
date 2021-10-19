var a = 0;
var b = 0;
var dz = '';

function onButton(numerek){
    var display = document.getElementById('display');
    if(display.value == 0){
        display.value = numerek;
    } else {
        display.value += numerek;
    }
}

function poPrzecinku(){
    var display = document.getElementById('display');
    if(display.value.indexOf(',') == -1) {
        display.value = display.value + ',';
    }
}

function wyczysc(){
    var display = document.getElementById('display');
    display.value = 0;
}

function wyczyscAll(){
    var display = document.getElementById('display');
    display.value = 0;
    a = 0;
    b = 0;
    dz = '';
}

function wyczyscLast(){
    var display = document.getElementById('display');
    display.value = display.value.slice(0, -1);
}

function dzialanie(znak){
    var display = document.getElementById('display');
    a = parseFloat(display.value.replace(',','.'));
    dz = znak;
    wyczysc()
    console.log('a= ', a);
    console.log(dz);
}

function plusMinus(){
    var display = document.getElementById('display');
    display.value = display.value.replace(',','.');
    display.value = display.value - display.value*2;
    display.value = display.value.replace('.',',');
}

function pierwiastekx(){
    var display = document.getElementById('display');
    display.value = display.value.replace(',','.');
    display.value = Math.sqrt(display.value);
    display.value = display.value.replace('.',',');
}

function jedennax(){
    var display = document.getElementById('display');
    display.value = display.value.replace(',','.');
    display.value = 1 / display.value;
    display.value = display.value.replace('.',',');
}

function silnia(){
    var display = document.getElementById('display');
    display.value = display.value.replace(',','.');
    var z = display.value;
    for(i = 1; i < display.value; i++){
        z = z * i;
    }
    display.value = z;
    display.value = display.value.replace('.',',');
}

function rownaSie(){
    var display = document.getElementById('display');
    b = parseFloat(display.value.replace(',','.'));
    console.log('b= ', b);
    if(dz == '/'){
        if (b == 0){
            alert("Nie wolno dzielic przez 0");
        } else {
            wynik = a / b;
        }
    } else if(dz == '*'){
        wynik = a * b;
    } else if(dz == '-'){
        wynik = a - b;
    } else if(dz == '+'){
        wynik = a + b;
    } else if(dz == 'doy'){
        wynik = Math.pow(a, b);
    }
    wynik = Math.round(wynik * 100000)/100000;
    display.value = wynik.toString().replace('.',',');
    console.log("Wynik= ", display.value);
}
