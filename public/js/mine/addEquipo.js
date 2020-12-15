'use strict';
import('sweetalert2')

let form;
document.addEventListener('DOMContentLoaded',()=>{
    form = document.getElementById('login-form');
    form.addEventListener('submit',e=>checkDifferentTeams);
})

function checkDifferentTeams(event){
    event.preventDefault();
    if(form.equiposlocales.value()===form.equiposvisitantes){
        Swal.fire(
            'Error'
        );
    }
};