const canvas = document.getElementById('whiteboard');
const ctx = canvas.getContext('2d');
let drawing = false;

canvas.width = window.innerWidth - 50;
canvas.height = window.innerHeight - 50;

canvas.addEventListener('mousedown', (e) => {
    drawing = true;
    ctx.beginPath();
    ctx.moveTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
});

canvas.addEventListener('mousemove', (e) => {
    if (drawing) {
        const x = e.clientX - canvas.offsetLeft;
        const y = e.clientY - canvas.offsetTop;
        sendDrawing(x, y, 'move');
        drawOnCanvas(x, y, 'move');
    }
});

canvas.addEventListener('mouseup', () => {
    drawing = false;
    ctx.closePath();
});

// WebSocket
const socket = new WebSocket('ws://localhost:3000'); // Cambia la URL a tu servidor WebSocket

socket.addEventListener('open', (event) => {
   console.log('WebSocket abierto');
});
   
socket.addEventListener('close', (event) => {
    console.log('WebSocket cerrado', event);
  });

socket.addEventListener('message', (event) => {
    const data = JSON.parse(event.data);
    drawLine(data.x1, data.y1, data.x2, data.y2);
});

function sendDrawing(x, y, type) {
    const message = JSON.stringify({ x, y, type });
    socket.send(message);
}

function drawOnCanvas(x, y, type) {
    ctx.lineWidth = 2;
    ctx.lineJoin = 'round';
    ctx.strokeStyle = 'black';

    if (type === 'start') {
        ctx.beginPath();
        ctx.moveTo(x, y);
    } else if (type === 'move') {
        ctx.lineTo(x, y);
        ctx.stroke();
    } else {
        ctx.closePath();
    }
}

window.addEventListener('resize', () => {
    canvas.width = window.innerWidth - 50;
    canvas.height = window.innerHeight - 50;
});

var figuras = document.querySelectorAll('.item');

figuras.forEach(function(figura) {
  figura.addEventListener('dragstart', function(e) {
    e.dataTransfer.setData('text/plain', figura.id);
    console.log('Drag start');
  });
});

canvas.addEventListener('dragover', function(e) {
  e.preventDefault();
  console.log('dragover')
});

canvas.addEventListener('drop', function(e) {
  e.preventDefault();
  var figuraId = e.dataTransfer.getData('text/plain');
  var figura = document.getElementById(figuraId);

  if (figura) {
    var figuraClonada = figura.cloneNode(true);
    figuraClonada.removeAttribute('draggable');
 
     // Añade la figura al canvas
     canvas.appendChild(figuraClonada);
     console.log('clonado')
     setTimeout(function() {
        var coordenadas = {
          x: figuraClonada.offsetLeft,
          y: figuraClonada.offsetTop
        };
    
        console.log('Coordenadas de la figura clonada:', coordenadas);
      }); 
  }
});