'use strict';

document.addEventListener('DOMContentLoaded', e => {
    let botonesDeleteJson = document.querySelectorAll('.btn-danger');

    botonesDeleteJson.forEach(x => {
        x.addEventListener('click', e => {
            e.preventDefault();
           // console.log(e.target);
            fetch(e.target.href, {method: 'DELETE'}).then(x => console.log(x.json()))/*.then(y=>{
               e.target.parentElement.parentElement.remove();
               alert(y.mensaje)*/;
        })
    })
});