var t = [];

function utworzPlansze(szerokosc, wysokosc){
    for(wiersz = 0; wiersz < szerokosc; wiersz++){
        t[wiersz] = [];
        for(kolumna = 0; kolumna < wysokosc; kolumna++){
            t[wiersz][kolumna] = 0;
        }
    }
}

function sasiadujacePole(wiersz, kolumna, szerkosc, wysokosc){
    // lewo góra
    if((wiersz > 0) && (kolumna > 0) && (t[wiersz - 1][kolumna - 1] != -1)){
        t[wiersz - 1][kolumna - 1]++;
    }
    // góra
    if((wiersz > 0) && (t[wiersz - 1][kolumna] != -1)){
        t[wiersz - 1][kolumna]++;
    }
    // prawo góra
    if((wiersz > 0) && (kolumna < wysokosc) && (t[wiersz - 1][kolumna + 1] != -1)){
        t[wiersz - 1][kolumna + 1]++;
    }
    // lewo dół
    if((wiersz < szerkosc) && (kolumna > 0) && (t[wiersz + 1][kolumna - 1] != -1)){
        t[wiersz + 1][kolumna - 1]++;
    }
    // dół
    if((wiersz < szerkosc) && (t[wiersz + 1][kolumna] != -1)){
        t[wiersz + 1][kolumna]++;
    }
    // prawo dół
    if((wiersz < szerkosc) && (kolumna < wysokosc) && (t[wiersz + 1][kolumna + 1] != -1)){
        t[wiersz + 1][kolumna + 1]++;
    }
    // lewo
    if((kolumna > 0) && (t[wiersz][kolumna - 1] != -1)){
        t[wiersz][kolumna - 1]++;
    }
    // prawo
    if((kolumna < 8) && (t[wiersz][kolumna + 1] != -1)){
        t[wiersz][kolumna + 1]++;
    }
}

function postawBomby(bomby, szerokosc, wysokosc){
    while (bomby > 0){
        wiersz = Math.floor(Math.random()*szerokosc);
        kolumna = Math.floor(Math.random()*wysokosc);
        if(t[wiersz][kolumna] != -1){
            t [wiersz][kolumna] = -1;
            sasiadujacePole(wiersz, kolumna);
            bomby--;
        }
    }
}

function pokazPlansze(szerokosc, wysokosc){
    var table = document.getElementById("plansza");
    table.innerHTML = '';
    for (let wiersz = 0; wiersz < szerokosc; wiersz++){
        var tr = document.createElement('tr');
        for (let kolumna = 0; kolumna < wysokosc; kolumna++){
            var td = document.createElement('td');
            td.innerText = t[wiersz][kolumna];
            td.className = 'p'+t[wiersz][kolumna];
            let button = document.createElement('button');
            button.id = wiersz+'x'+kolumna;
            td.appendChild(button);
            button.onclick = function (){
                if(t[wiersz][kolumna] == -1){
                    alert('przegrales');
                 }
                ukryjPrzycisk(wiersz, kolumna, szerokosc, wysokosc);
            };
            button.oncontextmenu = function (event){
                event.preventDefault();
                if(button.className == 'flagged'){
                    button.className = '';
                } else {
                    button.className = 'flagged'
                }
            }
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }
}

function ukryjPrzycisk(wiersz, kolumna, szerkosc, wysokosc){
    // console.log(wiersz+' x '+kolumna);
    // console.log(t[wiersz][kolumna]);
    var id = wiersz + 'x' + kolumna;
    var button = document.getElementById(id);
    if (button.style.display == 'none'){
        return;
    }
    button.style.display = 'none';

    if(t[wiersz][kolumna] == 0){
        // prawo
        if(kolumna < wysokosc){
            ukryjPrzycisk(wiersz, kolumna+1);
        }
        // lewo
        if(kolumna > 0){
            ukryjPrzycisk(wiersz, kolumna-1);
        }
        // góra
        if(wiersz > 0){
            ukryjPrzycisk(wiersz-1, kolumna);
        }
        // dół
        if(wiersz < szerokosc){
            ukryjPrzycisk(wiersz+1, kolumna);
        }
        // prawo góra
        if((kolumna < wysokosc) && (wiersz > 0)){
            ukryjPrzycisk(wiersz-1, kolumna+1);
        }
        // lewo góra 
        if((kolumna > 0) && (wiersz > 0)){
            ukryjPrzycisk(wiersz-1, kolumna-1);
        }
        // prawo dół
        if((kolumna < wysokosc) && (wiersz < szerokosc)){
            ukryjPrzycisk(wiersz+1, kolumna+1);
        }
        // lewo dół
        if((kolumna > 0) && (wiersz < szerokosc)){
            ukryjPrzycisk(wiersz+1, kolumna-1);
        }
    }
}

function odNowa(){
    var szerokosc = prompt('Podaj wysokosc planszy');
    var wysokosc = prompt('Podaj szerokosc planszy');
    var bomby = prompt('Podaj ilosc bomb');
    utworzPlansze(szerokosc, wysokosc);
    postawBomby(bomby, szerokosc, wysokosc);
    pokazPlansze(szerokosc, wysokosc);
    console.table(t);
}



