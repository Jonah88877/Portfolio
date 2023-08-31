document.addEventListener("DOMContentLoaded", function () {
    const cardForm = document.getElementById("cardForm");
    const cardOutput = document.getElementById("cardOutput");

    cardForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const Titel = document.getElementById("cardTitel").value;
        const Beschrijving = document.getElementById("cardBesch").value;
        const Link = document.getElementById("buttonLink").value;

        const cardHTML = `
        <div class="col-md-6">
            <div class="card mb-3">
                <img src="../imgs/18410.jpg" class="card-img-top" alt="placeholder">
                <div class="card-body">
                    <h5 class="card-title">${Titel}</h5>
                    <p class="card-text">${Beschrijving}</p>
                    <a href="${Link}" class="btn btn-primary">Naar het project</a>
                </div>
            </div>
        </div>`;

        cardOutput.insertAdjacentHTML("beforeend", cardHTML);

        cardForm.reset();
    });
});