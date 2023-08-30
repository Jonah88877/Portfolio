document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("cardForm");
    let cardContainer = document.getElementById("cardContainer");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let Titel = document.getElementById("cardTitel").value;
        let Beschrijving = document.getElementById("cardBesch").value;
        let Link = document.getElementById("buttonLink").value;

        let cardHTML = '<div class="card w-50 mb-3">' +
            '<img src="../imgs/18410.jpg" class="card-img-top" alt="placeholder">' +
            '<div class="card-body">' +
            '<h5 class="card-title">' + Titel + '</h5>' +
            '<p class="card-text">' + Beschrijving + '</p>' +
            '<a href="' + Link + '" class="btn btn-primary" target="_blank">Naar het project</a>' +
            '</div></div>';

        cardContainer.insertAdjacentHTML('beforeend', cardHTML);
        form.reset();
    });
});