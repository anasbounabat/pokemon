<?php
require_once "Pokemon.php";

class PokemonEau extends Pokemon
{
    public function __construct($name, $type, $hp, $attack, $defense, $image)
    {
        parent::__construct($name, $type, $hp, $attack, $defense, $image);
    }

    public function utiliserHydrocanon($cible)
    {
        if ($cible->getType() === 'Feu') {
            $damage = $this->attack * 1.1; 
            echo "<p>{$this->name} utilise Hydrocanon sur {$cible->getName()} et inflige {$damage} dégâts (bonus contre Pokémon Feu)!</p>";
        } else {
            $damage = $this->attack;
            echo "<p>{$this->name} utilise Hydrocanon sur {$cible->getName()} et inflige {$damage} dégâts.</p>";
        }
        
        $cible->recevoirDegats($damage);
    }
}
?>
