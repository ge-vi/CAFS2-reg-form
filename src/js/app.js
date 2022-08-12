"use strict";

document.addEventListener('DOMContentLoaded', evt => {

  const form = document.forms.namedItem('user-reg');
  form.addEventListener('click', evt => {
    evt.preventDefault();

    console.log(location.origin);

    // fetch()

  });
});
