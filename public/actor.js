// actorSelector.js

document.addEventListener("DOMContentLoaded", () => {
    // Función para manejar el inicio del arrastre
    function dragStart(event) {
        event.dataTransfer.setData("text/plain", event.target.id);
    }

    // Función para permitir soltar el actor en el lienzo
    function allowDrop(event) {
        event.preventDefault();
    }

    // Función para soltar el actor en el lienzo y colocarlo en la posición deseada
    function drop(event) {
        event.preventDefault();
        const actorId = event.dataTransfer.getData("text/plain");
        const actor = document.getElementById(actorId);

        if (actor) {
            const canvas = document.getElementById("canvas");
            const rect = canvas.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            actor.style.left = x + "px";
            actor.style.top = y + "px";
        }
    }

    // Agrega eventos de arrastre y soltar a los actores
    const actors = document.querySelectorAll(".actor");
    actors.forEach((actor) => {
        actor.addEventListener("dragstart", dragStart);
    });

    // Agrega eventos de soltar al lienzo
    const canvas = document.getElementById("canvas");
    canvas.addEventListener("dragover", allowDrop);
    canvas.addEventListener("drop", drop);
});
