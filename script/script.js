// Wacht tot de pagina geladen is, dan voert die alles uit

document.addEventListener("DOMContentLoaded", function () {
    const cardOutput = document.getElementById("cardOutput");

    // Pak de cards uit de localstorage of een nieuwe lijst als er niks is
    let cardStorage = JSON.parse(localStorage.getItem("cards")) || [];

    // Show de cards vanuit de storage op de pagina
    cardStorage.forEach(function (cardHTML) {
        cardOutput.insertAdjacentHTML("beforeend", cardHTML);
    });

    const cardForm = document.getElementById("cardForm");

    // Checkt of een nieuwe kaart toegevoegt word
    cardForm.addEventListener("submit", function (event) {
        event.preventDefault();

        // Ingevulde values slaat die op
        const cardTitel = document.getElementById("cardTitel").value;
        const cardBesch = document.getElementById("cardBesch").value;
        const cardLink = document.getElementById("buttonLink").value;

        // Maakt een card met alle info
        const cardHTML = `
        <div class="col-md-6">
            <div class="card mb-3">
                <img src="../imgs/18410.jpg" class="card-img-top" alt="placeholder">
                <div class="card-body">
                    <h5 class="card-title">${cardTitel}</h5>
                    <p class="card-text">${cardBesch}</p>
                    <a href="${cardLink}" class="btn btn-primary">Naar het project</a>
                    <button class="btn btn-outline-secondary edit-btn">Bewerken</button>
                    <button class="btn btn-outline-danger delete-btn">Verwijderen</button>
                </div>
            </div>
        </div>`;

        // Voeg cardHTML toe aan de cards in localstorage en sla ze op
        cardStorage.push(cardHTML);
        localStorage.setItem("cards", JSON.stringify(cardStorage));

        cardOutput.insertAdjacentHTML("beforeend", cardHTML);
        cardForm.reset();

        // Voegt event listeners toe aan de nieuwe kaart
        addCardEventListeners();
    });

    // Voegt event listeners toe aan de cards
    function addCardEventListeners() {
        let deleteButtons = document.querySelectorAll(".delete-btn");
        let editButtons = document.querySelectorAll(".edit-btn");

        deleteButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                // Verwijder de dichtbijzijnde card van de button
                let card = button.closest(".card");
                card.remove();
                updateLocalStorage();
            });
        });
        // Edit bestaande cards
        editButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                // Kijk welke card bewerkt moet worden
                let card = button.closest(".card");
                let title = card.querySelector(".card-title");
                let description = card.querySelector(".card-text");
                let link = card.querySelector(".btn-primary");

                let newTitle = prompt("Nieuwe titel:", title.textContent);
                let newDescription = prompt("Nieuwe beschrijving:", description.textContent);
                let newLink = prompt("Nieuwe link:", link.href);

                // Update de cards en sla deze op in localStorage
                title.textContent = newTitle;
                description.textContent = newDescription;
                link.href = newLink;
                updateLocalStorage();
            });
        });
    }

    // Update de opgeslagen kaarten in localStorage met de nieuwe info
    function updateLocalStorage() {
        let updatedCardStorage = [];
        const cards = cardOutput.querySelectorAll(".card");

        cards.forEach(function (card) {
            updatedCardStorage.push(card.outerHTML);
        });

        localStorage.setItem("cards", JSON.stringify(updatedCardStorage));
    }

    // Voegt event listeners toe aan de cards bij het laden van de pagina
    addCardEventListeners();
});
