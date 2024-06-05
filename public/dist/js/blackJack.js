let anchoDocumento = $(document).width();

var canvas = document.getElementById("canvas");
canvas.width = 1220 * 2;
canvas.height = 400 * 2;
canvas.style.width = 1220 + "px";
if(anchoDocumento > 1050)
    canvas.style.height = 400 + "px";
else if(anchoDocumento <= 1050 && anchoDocumento >= 600)
    canvas.style.height = 600 + "px";
else if(anchoDocumento <= 599)
    canvas.style.height = 700 + "px";
var ctx = canvas.getContext("2d");

let pointsUser = 0;
let pointsCasa = 0;
let pointsWin = 0;

// Clase carta
class carta {
    // las variables static pertenecen a la clase
    static x = 50;
    static y = 50;

    constructor(valor, palo) {
        this.img = new Image();
        this.valor = valor;
        this.palo = palo;
    }
}

// Variables que vamos a usar
var cartas = [];
var cartasJugador = [];
var cartasCasa = [];
var indiceCarta = 0;
var palos = ["S", "H", "D", "C"];

// Generamos las cartas. Con atributos valor y palo
for (i = 0; i < 4; i++) {
    for (j = 1; j <= 11; j++) {
        cartas.push(new carta(j, palos[i]));
    }
}

// Barajamos las cartas
for (i = 0; i < 100; i++) {
    cartas.splice(Math.random() * 52, 0, cartas[0]);
    cartas.shift();
}
function obtenerAnchoDeCarta(){
    if(anchoDocumento > 1050)
        return 239;
    else if(anchoDocumento <= 1050 && anchoDocumento >= 600)
        return 460;
    else if(anchoDocumento <= 599 && anchoDocumento >= 300)
        return 660;
    else
        return 1100;
}

function obtenerSumatoriaEspacio(){
    if(anchoDocumento > 1050)
        return 300;
    else if(anchoDocumento <= 1050 && anchoDocumento >= 600)
        return 600;
    else if(anchoDocumento <= 599 && anchoDocumento >= 300)
        return 820;
    else
        return 1200;
}

function obtenerAltoDeCarta(){
    if(anchoDocumento > 1050)
        return 335;
    else if(anchoDocumento <= 1050 && anchoDocumento >= 600)
        return 320;
    else if(anchoDocumento <= 599 && anchoDocumento >= 300)
        return 220;
    else
        return 170;
}

function validarUbicacionCarta(){
    if(anchoDocumento > 1050){
        carta.y = 50;
    }
    else if(anchoDocumento <= 1050 && anchoDocumento >= 600){
        if(indiceCarta >= 4){
            carta.y = 430;
            if(indiceCarta == 4){
                carta.x = 50;
                //console.log(canvas.style.height);
                //canvas.style.height = "800px";
            }   
        }
    }
    else if(anchoDocumento <= 599 && anchoDocumento >= 300){
        if(indiceCarta >= 3 && indiceCarta < 6){
            carta.y = 300;
            if(indiceCarta == 3){
                carta.x = 50;
            }  
        }else if(indiceCarta >= 6){
            
            carta.y = 550;
            if(indiceCarta == 6){
                carta.x = 50;
            }  
        }
    }else{
        carta.y = 10;
        if(indiceCarta >= 2 && indiceCarta < 4){
            carta.y = 210;
            if(indiceCarta == 2){
                carta.x = 50;
            }  
        }else if(indiceCarta >= 4 &&  indiceCarta < 6){
            carta.y = 400;
            if(indiceCarta == 4){
                carta.x = 50;
            }  
        }else if(indiceCarta > 5){
            carta.y = 600;
            if(indiceCarta == 6){
                carta.x = 50;
            }  
        }
    }
}
function dibujarCarta(CJ) {
    // Tenemos que primero cargar la carta y luego añadir el src
    // Si no las cartas no cargan en la pagina
    validarUbicacionCarta();
    CJ.img.onload = () => {
        ctx.drawImage(CJ.img, carta.x, carta.y, obtenerAnchoDeCarta(), obtenerAltoDeCarta());
        carta.x += obtenerSumatoriaEspacio();
    };
    
    // Para cargar la imagen correcta concatenamos el numero y el palo, que coincida con el nombre del fichero
    var rutaImagen = $("#rutaimagescarta").val();
    CJ.img.src = rutaImagen + "/images/cartas/" + CJ.valor.toString() + CJ.palo + ".svg";
}


function elegirValorAs() {
    return new Promise((resolve, reject) => {
      const container = document.getElementById("as-message-container");
      container.classList.remove("hidden");
  
      const message = document.createElement("p");
      message.textContent = "Ingresa el valor del As (1 u 11):";
  
      const input = document.createElement("input");
      input.type = "number";
      input.min = 1;
      input.max = 11;
  
      const button = document.createElement("button");
      button.textContent = "Aceptar";
  
      container.appendChild(message);
      container.appendChild(input);
      container.appendChild(button);
  
      button.addEventListener("click", () => {
        const valor = parseInt(input.value);
        if (valor === 1 || valor === 11) {
          container.classList.add("hidden");
          container.innerHTML = "";
          resolve(valor); // Resolvemos la promesa con el valor correcto
        } else {
          alert("Valor inválido. Se asignará el valor de 11 por defecto.");
          container.classList.add("hidden");
          container.innerHTML = "";
          resolve(11); // Resolvemos la promesa con el valor predeterminado
        }
      });
    });
  }



async function pedirCarta() {
    if (indiceCarta < 8) {
        let CJ = cartas[indiceCarta]; // Carta Jugada
        
        // Si la carta es un As para el jugador, pedir al usuario que elija el valor
        if (CJ.valor === 1) {
            CJ.valor = await elegirValorAs();
        }
        
        cartasJugador.push(CJ);
        dibujarCarta(CJ);
        indiceCarta++;
    }
}

async function plantarme() {
    document.getElementById("pedir").disabled = true;
    document.getElementById("plantar").disabled = true;
    document.getElementById("reset").style.visibility = "visible";

    let info = document.getElementById("info");
    info.classList.remove("hidden"); // Show the info div

    // Contamos e imprimimos los puntos del jugador
    for (i in cartasJugador) {
        pointsUser += cartasJugador[i].valor;
    }

    // Sacamos cartas de la Casa y contamos sus puntos
    while (pointsCasa < 17) {
        cartasCasa.push(cartas[indiceCarta]);
        pointsCasa += cartas[indiceCarta].valor;
        indiceCarta++;
    }

    // Puntos de la partida se ponen en info
    info.innerHTML = "Puntuación jugador: " + pointsUser + "<br>Puntuación de la Casa: " + pointsCasa;

    // Dibujamos las cartas de la casa
    carta.x = 50;
    carta.y = 400;
    for (i in cartasCasa) {
        dibujarCarta(cartasCasa[i]);
    }

    // Inicializamos puntosWin
    pointsWin = 0;

    // Comprobamos si hay empate
    if (pointsUser == pointsCasa) {
        info.innerHTML += "<br><b>Has quedado en empate.</b>";
    } else {
        // Comprobamos ganador
        if (pointsUser == 21) {
            info.innerHTML += "<br><b> ¡BLACKJACK! GANAS 100 PUNTOS</b>";
            pointsWin += 100; // Aumentar puntos si el jugador obtiene Blackjack
        }else if (pointsCasa > 21) {
            info.innerHTML += "<br><b>Has ganado!!! La casa se ha pasado de puntos</b>";
            pointsWin += 50; // Aumentar puntos si la casa se pasa de puntos
        } else if (pointsUser > 21) {
            info.innerHTML += "<br><b>Ha ganado La Casa... Te has pasado de puntos</b>";
           
        }  else if (pointsCasa >= pointsUser) {
            info.innerHTML += "<br><b>Ha ganado La Casa...</b>";
          
        } else {
            info.innerHTML += "<br><b>Has ganado!!!</b>";
            pointsWin += 50; // Aumentar puntos si el jugador gana
        }
    }

    // Enviar datos al servidor
    var ruta = $("#rutaGuardarPuntaje").val();
    var formData = new FormData();
    formData.append("puntos_ganados", pointsWin);
    formData.append("puntos_crupier", pointsCasa);
    formData.append("puntos_jugador", pointsUser);
    formData.append("_token", $('#_token').val());

    const response = await fetch(ruta, {
        method: 'POST',
        body: formData
    });

    // Manejar la respuesta (opcional)
    const result = await response.json();
    console.log(result);
}


// Recarga la pagina cuando se presiona el botón
function playagain() {
    location.reload(true);
}

