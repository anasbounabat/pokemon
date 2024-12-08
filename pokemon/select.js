
let selectedPokemon1 = null;
let selectedPokemon2 = null;

function selectPokemon(pokemonName, element) {
    if (element.classList.contains('selected')) {
        element.classList.remove('selected');
        if (selectedPokemon1 === pokemonName) {
            selectedPokemon1 = null;
            document.getElementById('pokemon1').value = "";
        } else if (selectedPokemon2 === pokemonName) {
            selectedPokemon2 = null;
            document.getElementById('pokemon2').value = "";
        }
    } else {
        if (!selectedPokemon1) {
            selectedPokemon1 = pokemonName;
            document.getElementById('pokemon1').value = selectedPokemon1;
            element.classList.add('selected');
        } else if (!selectedPokemon2 && pokemonName !== selectedPokemon1) {
            selectedPokemon2 = pokemonName;
            document.getElementById('pokemon2').value = selectedPokemon2;
            element.classList.add('selected');
        }
    }

    const allCards = document.querySelectorAll('.pokemon-card');
    allCards.forEach(card => {
        if (card !== element && card.classList.contains('selected') &&
            (card.dataset.pokemon !== selectedPokemon1 && card.dataset.pokemon !== selectedPokemon2)) {
            card.classList.remove('selected');
        }
    });
}
