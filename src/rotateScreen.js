//Obtener la pantalla de rotate
let portraitAlert = document.getElementById('portraitAlert');
let gameCanvas = document.querySelector("#unity-canvas");


// Listen for orientation changes


window.addEventListener("orientationchange", function() {
    if (window.innerHeight > window.innerWidth) {
        portraitAlert.style.width = `100%`;
        portraitAlert.style.height = `100%`;
    }
      
    
}, false);
