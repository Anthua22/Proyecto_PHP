'use strict';
let imgPreview;
let equipoForm;


document.addEventListener("DOMContentLoaded", e => {
    imgPreview = document.getElementById('imgPreview');
    equipoForm = document.getElementById('form');
    equipoForm.image.addEventListener('change', e => {
        loadImage(e)
    });

});

function loadImage(event) {
    let file= event.target.files[0];
    let reader = new FileReader();
    if (file) reader.readAsDataURL(file);

    reader.addEventListener('load', e => {
        imgPreview.src = reader.result.toString();
        imgPreview.style.display = "inline";
    })
}