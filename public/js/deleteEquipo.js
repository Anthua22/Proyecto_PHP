'use strict';

document.addEventListener('DOMContentLoaded', e => {
    let botonesDeleteJson = document.querySelectorAll('.btn-danger');

    botonesDeleteJson.forEach(x => {
        x.addEventListener('click', e => {
            e.preventDefault();
            Swal.fire({
                title: 'Estas Seguro?',
                text: "Los partidos donde haya participado este equipo se eliminaran",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(e.target.href, {method: 'DELETE'})
                        .then(respuesta => respuesta.json())
                        .then(resp => {
                            e.target.parentElement.parentElement.parentElement.remove();
                            Swal.fire({
                                title: 'Borrado!',
                                text: resp.mensaje,
                                icon: 'success',});
                        }).catch(y => swal({
                        title: "Error",
                        text: y,
                        type: "error"
                    }));
                }
            })

        });
    })


})
