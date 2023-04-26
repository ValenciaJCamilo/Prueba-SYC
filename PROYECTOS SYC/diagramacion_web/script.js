//*SCRIPT PARA PODER VISUALIZAR LAS IMAGENES EN GRANDE AL MOMENTO DE PRESIONAR SOBRE ALGUNA DE ELLAS

// 1. Se identifican las variables a usar, para poder manipular así el HTML
let bodyScroll = document.getElementById("modalOpen"); // Variable para manipular scroll al abrir imagen
let images = document.querySelectorAll('.container img'); // Obtener todas las imágenes que están dentro de la clase container
let modal = document.getElementById("modal"); // Obtener el modal
let close = document.getElementById("close"); // Obtener la X del modal
let modalImg = document.getElementById("imgModal"); //Manipular la imagen del modal


// Agregar un evento click a cada imagen
images.forEach(img => {
img.addEventListener('click', function() {
    // Mostrar el modal
    modal.style.display = "block";
    bodyScroll.style.overflow ="hidden";
    // Actualizar la imagen en el modal
    modalImg.src = this.src;

    // X para cerrar la imagen en grande
    close.addEventListener('click', function() {
    modal.style.display = "none";
    bodyScroll.style.overflow ="auto";
    });
    });
});
