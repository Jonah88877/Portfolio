document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("cardForm");
    let cardContainer = document.getElementById("cardContainer");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let cardTitle = document.getElementById("cardTitel").value;
        let cardDescription = document.getElementById("cardBesch").value;
        let buttonLink = document.getElementById("buttonLink").value;

        form.reset();
    });
});