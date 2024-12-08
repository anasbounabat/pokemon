<?php
require_once "class/PokemonFeu.php";
require_once "class/PokemonEau.php";
require_once "class/PokemonPlante.php";
require_once "class/Combat.php";

$pokemons = [
    "Dracofeu" => new PokemonEau("Dracofeu", "Eau", 120, 35, 20, "https://th.bing.com/th/id/OIP.XPM40ghFaI3Y2TZtFxeXuwHaHO?w=173&h=180&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Reptincel" => new PokemonFeu("Reptincel", "Feu", 100, 30, 10, "https://th.bing.com/th?id=OIP.PbCKllAh7lvchru4qqOd_wHaHa&w=250&h=250&c=8&rs=1&qlt=90&o=6&dpr=1.1&pid=3.1&rm=2"),
    "Feunard" => new PokemonFeu("Feunard", "Feu", 90, 20, 22, "https://th.bing.com/th?id=OIP.euylJHnoXnyOHeiU8WAqYAHaHI&w=254&h=245&c=8&rs=1&qlt=90&o=6&dpr=1.1&pid=3.1&rm=2"),
    "Goupix" => new PokemonFeu("Goupix", "Feu", 100, 25, 15, "https://th.bing.com/th/id/OIP.4GkG_S8IUTwU900hr6zCGwHaGj?w=211&h=187&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Carabaffe" => new PokemonEau("Carabaffe", "Eau", 90, 20, 12, "https://th.bing.com/th/id/OIP.pXUYq6hgvvFhis1leZIWMgAAAA?w=171&h=180&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Akwakwak" => new PokemonEau("Akwakwak", "Eau", 90, 20, 22, "https://th.bing.com/th/id/OIP.zrOc9isg3J_iVJ7olXwGhAAAAA?w=167&h=173&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Mustébouée" => new PokemonEau("Mustébouée", "Eau", 80, 25, 18,"https://th.bing.com/th/id/OIP.EnOscheysdN-brp-IpHPnAAAAA?w=140&h=180&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Tartard" => new PokemonEau("Tartard", "Eau", 110, 20, 15, "https://th.bing.com/th/id/OIP.GNOZbvgbnDMZOO9nrkVs_wHaFA?w=202&h=136&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Paras" => new PokemonPlante("Paras", "Plante", 90, 20, 22, "https://th.bing.com/th/id/OIP.m33-kpmPK_e8dGnKoMYREgHaG8?w=206&h=186&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Empiflor" => new PokemonPlante("Empiflor", "Plante", 90, 20, 18, "https://th.bing.com/th/id/OIP.iNfN-9eQIOEd22HXWvjk9AHaGR?w=200&h=180&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Saquedeneu" => new PokemonPlante("Saquedeneu", "Plante", 90, 20, 22, "https://th.bing.com/th/id/OIP.SGb9G4s5uU_18RuWMvPviAHaHa?pid=ImgDet&w=206&h=206&c=7&dpr=1,1"),
    "Chétiflor" => new PokemonPlante("Chétiflor", "Plante", 90, 20, 12, "https://th.bing.com/th/id/OIP.yVEdztJyFxvucW710wB-sAHaIq?w=200&h=234&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
];

$combatResult = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pokemon1'], $_POST['pokemon2'])) {
        $pokemon1 = $_POST['pokemon1'];
        $pokemon2 = $_POST['pokemon2'];

        if ($pokemon1 && $pokemon2 && $pokemon1 !== $pokemon2) {
            $combat = new Combat($pokemons[$pokemon1], $pokemons[$pokemon2]);
            ob_start();
            $combat->demarrerCombat();
            $combatResult = ob_get_clean();
        } else {
            $combatResult = "Erreur : Veuillez choisir deux Pokémon valides et différents.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jeu Pokémon - Combat</title>
    <link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar">
    <div class="navbar-logo">
        <a href="">Pokemon</a>
    </div>
    <div class="navbar-links">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#contact">Contact</a>
    </div>
</nav>
<div class="image">
    <img src="https://media.discordapp.net/attachments/1162307514193424434/1315064157850304572/une_image_promotionnelle_pour_un_combat_de_pokemon_1v1_une_images_design_clair.jpg?ex=6756b52f&is=675563af&hm=c03b5b924c867b2de33fb7206a39b0d4ec8b6627b0f8bded2e20c5242fa686bd&=&format=webp&width=1172&height=662" alt="" srcset="">
</div>
<section>
    <form method="POST">
        <input type="hidden" name="pokemon1" id="pokemon1">
        <input type="hidden" name="pokemon2" id="pokemon2">
        <h2>Choisissez vos Pokémon pour le Combat !</h2>
        <div class="pokemon-images">
            <?php foreach ($pokemons as $nom => $pokemon): ?>
                <div class="pokemon-card" onclick="selectPokemon('<?php echo $nom; ?>', this)" data-pokemon="<?php echo $nom; ?>">
    <img src="<?php echo $pokemon->get_image(); ?>" alt="<?php echo $pokemon->get_name(); ?>">
    <h5><strong><?php echo $nom; ?> (<?php echo $pokemon->get_type(); ?>)</strong></h5>
    <p>PV : <?php echo $pokemon->get_points_de_vie(); ?></p>
    <p>Puissance d'attaque : <?php echo $pokemon->get_attack(); ?></p>
</div>

            <?php endforeach; ?>
        </div>
        <div>
        <div style="text-align: center; margin-top: 30px;">
    <button type="submit" class="combat-button">Lancer le Combat !</button>
</div>


        </div>
    </form>
</section>

<section class="header-section">
  <h2>Résultat du Combat</h2>
</section>

<section class="resultat-section">
  <div class="resultat">
    <?php echo nl2br($combatResult) ?: "<p>Aucun combat encore effectué.</p>"; ?>
  </div>
</section>
<footer>
<div class="footer">
<div class="row">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-youtube"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
</div>

<div class="row">
<ul>
<li><a href="#">Contact us</a></li>
<li><a href="#">Our Services</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Terms & Conditions</a></li>
<li><a href="#">Career</a></li>
</ul>
</div>

<div class="row">
Pokémon Battle Arena - Tous droits réservés
</div>
</div>
</footer>
<script src="./select.js"></script>
</body>
</html>
