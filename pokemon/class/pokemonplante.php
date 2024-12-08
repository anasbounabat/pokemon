<?php
require_once "Pokemon.php";

class PokemonPlante extends Pokemon
{
    public function __construct($name, $type, $hp, $attack, $defense, $image)
    {
        parent::__construct($name, $type, $hp, $attack, $defense, $image);
    }

    public function utiliserFouetLianes($cible)
    {
        $damage = $this->get_attack();
        if ($cible->get_type() === 'Eau') {
            $damage *= 1.5; 
            echo "<p>{$this->get_name()} utilise Fouet-Lianes sur {$cible->get_name()} et inflige {$damage} dégâts (bonus contre Pokémon Eau)!</p>";
        } else {
            echo "<p>{$this->get_name()} utilise Fouet-Lianes sur {$cible->get_name()} et inflige {$damage} dégâts.</p>";
        }
        
        $cible->recevoirDegats($damage);
    }
}
?>
