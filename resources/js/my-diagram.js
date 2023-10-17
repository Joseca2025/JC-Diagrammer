import * as go from 'gojs';

function init() {
    var $ = go.GraphObject.make;
    var diagram = $(go.Diagram, "diagramDiv", {
      // Configuración de tu pizarra, como herramientas y estilo
    });
  
    // Define el nodo de ejemplo
    diagram.nodeTemplate =
      $(go.Node, "Auto",
        $(go.Shape, "RoundedRectangle", { fill: "lightblue" }),
        $(go.TextBlock, "Nodo de ejemplo")
      );
  
    // Crea un nodo de ejemplo y añádelo a la pizarra
    diagram.model = $(go.GraphLinksModel, {
      nodeDataArray: [
        { key: 1, text: "Nodo 1" },
        { key: 2, text: "Nodo 2" },
      ]
    });
  }
  
  // Llama a la función "init" cuando se carga la página
  document.addEventListener("DOMContentLoaded", init);
  