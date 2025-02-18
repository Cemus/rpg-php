<?php
include "./personnages.php";

class Ennemis {
    private string $type;
    private int $hp;
    private int $atk;

    public function __construct(string $type, int $hp, int $atk) {
        $this->type = $type;
        $this->hp = $hp;
        $this->atk = $atk;
    }

    function attaquer(Personnage $cible):void{
        echo "<p>".$this->type." attaque !</p>";
        $degats = $cible->getHp() - rand(1,$this->atk);
        $cible->setHp($degats);
    }
}

class Rat extends Ennemis{
    public function __construct() {
        parent::__construct("Rat", 20, 5); 
    }

    function getImage():string{
        return "https://preview.redd.it/i-was-told-to-post-this-here-my-first-pixel-animation-v0-foc4vu4ob1da1.gif?format=png8&s=57a2c1f1411d43669429acab748fb3265c5237e1";
    }
}

class Slime extends Ennemis{
    public function __construct() {
        parent::__construct("Slime", 25, 2); 
    }

    function getImage():string{
        return "https://static.wikia.nocookie.net/f880989a-6b60-4eaf-afdf-c1d8cf96530d";
    }
}