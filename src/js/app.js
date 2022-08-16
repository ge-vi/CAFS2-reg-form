"use strict";

document.addEventListener('DOMContentLoaded', evt => {

    const form = document.forms.namedItem('user-reg');
    const errorDiv = document.getElementById('error');

    const resultDiv = document.querySelector('#result ');

    function displayParticipantInfo(data) {

        resultDiv.querySelector('#res-fname').textContent = data.f_name;
        resultDiv.querySelector('#res-lname').textContent = data.l_name;
        resultDiv.querySelector('#res-city').textContent = data.city;
        resultDiv.querySelector('#res-langs').textContent = data.lang;
        resultDiv.querySelector('#res-info').textContent = data.info;
        resultDiv.querySelector('#res-img').src = data.image;

        resultDiv.classList.remove('d-none');
        form.reset();
    }

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

                displayParticipantInfo(result.participant);

            })
            .catch((error) => {
                errorDiv.textContent = 'Klaida, patikrinkite įvestus duomenis';
                errorDiv.classList.remove('d-none');
            });
    });
});
