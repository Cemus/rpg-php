<?php

include "./armes.php";


abstract class Personnage{
    private string $nom;
    private InterfaceArme $arme;
    private string $type;

    function __construct(string $nom, InterfaceArme $arme, string $type){
        $this->nom = $nom;
        $this->type = $type;
        $this->arme = $arme;
    }

    abstract function afficher():void;

    function attaquer():void{
        echo "<p>J'attaque</p>";
       $this->arme->attaquer();
    }

    function getNom():string{
        return $this->nom;
    }

    function getArme():InterfaceArme{
        return $this->arme;
    }

    function getType():string{
        return $this->type;
    }

    function setNom(string $newNom):self{
        $this->nom = $newNom;
        return $this;
    }

    function setArme(InterfaceArme $newArme):self{
        $this->arme = $newArme;
        return $this;
    }

    function setType(string $newType):self{
        $this->type = $newType;
        return $this;
    }
}

class Guerrier extends Personnage{
    public function afficher():void{
        echo "<p>Je suis un guerrier</p>";
    }
}

class Magicien extends Personnage{
    private int $maxMana = 10;
    private int $mana = 10;

    public function afficher():void{
        echo "
        <img src = 'https://ih1.redbubble.net/image.4674612568.0346/bg,f8f8f8-flat,750x,075,f-pad,750x1000,f8f8f8.u2.jpg' alt='Mage'
        </br>
        <p>Maaaage</p>";
    }

    public function attaquer():void{
        $nom = $this->getNom();
        echo "<p>".$nom." attaque !</p>";
        $this->mana -= 1;
        $arme = $this->getArme();
        $arme->attaquer();
        if ($this->mana <= 0){
            echo "<p>UGH, je tombe inconscient";
        }
    }
}

class Voleur extends Personnage{
    public function afficher():void{
        echo "<p>Je suis un voleur</p>";
    }
}