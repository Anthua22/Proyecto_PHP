'use strict';

document.addEventListener('DOMContentLoaded', e => {
    let botonesDeleteJson = document.querySelectorAll('.btn-danger');

    botonesDeleteJson.forEach(x => {
        x.addEventListener('click',e=>{
            e.preventDefault();
            fetch(e.target.href, {method : 'DELETE'})
                .then(respuesta =>  respuesta.json())
                .then(resp => {
                    //e.target.parentElement.parentElement.parentElement.remove();
                    Swal.fire({
                        title: "Eliminado",
                        text: resp.mensaje,
                        icon: "success",
                    });

                    location.assign('/arbitros');
                }).catch(y=>Swal.fire({
                title: "Error",
                text: y,
                icon: "error"
            }));
        })
    });
});