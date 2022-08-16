"use strict";

document.addEventListener('DOMContentLoaded', evt => {

    const form = document.forms.namedItem('user-reg');
    const errorDiv = document.getElementById('error');

    form.addEventListener('submit', async evt => {
        evt.preventDefault();
        const formData = new FormData(form);

        await fetch(location.origin + '/inc/userFormProcessor.php', {
            method: 'POST',
            body: formData
        })
            .then((response) => {
                errorDiv.classList.add('d-none');
                return response.json();
            })
            .then((result) => {


            })
            .catch((error) => {
                errorDiv.textContent = error;
                errorDiv.classList.remove('d-none');
            });
    });
});

/*
f_name : Vardas
l_name : Pavardė
city : vilnius
lang[] : php
lang[] : pyt
info : Papildoma informacija
user-image : File {
    lastModified: 1660066506324
    lastModifiedDate: Tue Aug 09 2022 20:35:06 GMT+0300 (Eastern European Summer Time) {}
    name: "random.jpg"
    size: 8853
    type: "image/jpeg"
    webkitRelativePath: ""
}
*/
