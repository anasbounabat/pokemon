<?php
class Pokemon
{
    protected $name;
    protected $type;
    protected $points_de_vie;
    protected $points_de_vie_max; 
    protected $attack;
    protected $defense;
    protected $image;

    public function __construct($name, $type, $hp, $attack, $defense, $image)
    {
        $this->name = $name;
        $this->type = $type;
        $this->points_de_vie = $hp;
        $this->points_de_vie_max = $hp;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->image = $image;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_type()
    {
        return $this->type;
    }

    public function get_attack()
    {
        return $this->attack; 
    }

    public function get_points_de_vie()
    {
        return $this->points_de_vie;
    }

    public function estKO()
    {
        return $this->points_de_vie <= 0;
    }

    public function recevoirDegats($degats)
    {
        $this->points_de_vie -= $degats;
        if ($this->points_de_vie < 0) {
            $this->points_de_vie = 0; 
        }
    }

    public function get_image()
    {
        return $this->image;
    }

    public function soigner()
    {
        echo "{$this->name} se soigne et retrouve {$this->points_de_vie_max} PV.<br>";
        $this->points_de_vie = $this->points_de_vie_max; 
    }
}
?>
