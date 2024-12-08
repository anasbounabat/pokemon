<?php
require_once "Pokemon.php";

class PokemonFeu extends Pokemon
{
    public function __construct($name, $type, $hp, $attack, $defense, $image)
    {
        parent::__construct($name, $type, $hp, $attack, $defense, $image);
    }

    public function utiliserLanceFlammes($adversaire)
    {
        if ($adversaire->getType() === 'Plante') {
            $degats = $this->attack * 1.7; 
            echo "<p>{$this->name} utilise Lance-Flammes sur {$adversaire->getName()} et inflige {$degats} dégâts (bonus contre Pokémon Plante)!</p>";
        } else {
            $degats = $this->attack;
            echo "<p>{$this->name} utilise Lance-Flammes sur {$adversaire->getName()} et inflige {$degats} dégâts.</p>";
        }

        $adversaire->recevoirDegats($degats);
    }
}
?>