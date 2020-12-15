'use strict';

document.addEventListener('DOMContentLoaded', e => {
    let botonesDeleteJson = document.querySelectorAll('.btn-danger');

    botonesDeleteJson.forEach(x => {
        x.addEventListener('click',e=>{
            e.preventDefault();
            fetch(e.target.href, {method : 'DELETE'})
                .then(respuesta =>  respuesta.json())
                .then(resp => {
                    e.target.parentElement.parentElement.parentElement.remove();
                    swal({
                        title: "Eliminado",
                        text: resp.mensaje,
                        type: "success",
                    });
                }).catch(y=>console.log(y));
        })
    });
});