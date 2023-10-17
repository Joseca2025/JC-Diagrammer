// Importa los módulos necesarios
import http from 'http';
import { Server } from 'socket.io';

// Crea un servidor HTTP
const server = http.createServer((req, res) => {
    res.end('Socket.io server is running.');
});

// Crea un servidor de Socket.io
const io = new Server(server, {
    cors: {
        origin: "http://localhost:3000", // Reemplaza con la dirección de tu aplicación cliente
        methods: ["GET", "POST"]
    }
});

// Maneja la conexión de Socket.io
io.on('connection', (socket) => {
    console.log('Usuario conectado');

    // Escucha y maneja eventos de cliente
    socket.on('chat message', (msg) => {
        console.log(`Nuevo mensaje: ${msg}`);
        // Puedes transmitir este mensaje a otros clientes si lo deseas
        // socket.broadcast.emit('chat message', msg);
    });

    socket.on('disconnect', () => {
        console.log('Usuario desconectado');
    });
});

// Escucha en el puerto 3000
server.listen(3000, () => {
    console.log('Servidor de Socket.io está escuchando en el puerto 3000');
});
