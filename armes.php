<?php

interface InterfaceArme{
     public function afficher():void;
     public function attaquer():int;
}

class Epee implements InterfaceArme{
    private int $durabilite;
    private string $type;
    private int $puissance;

    function __construct(int $durabilite, int $puissance, string $type){
        $this->durabilite = $durabilite;
        $this->puissance = $puissance;
        $this->type = $type;
    }

    public function afficher():void{
        echo "<p> Je suis un(e) ".$this->type ."</p>";
    }

    public function attaquer():int{
        $jetDurabilite = rand(1,100);
        $jetPuissance = rand(1,$this->puissance);
        if ($jetDurabilite <= 10){
            $this->diminuerDurabilite();
        }
        echo "<p>Il inflige ".$jetPuissance ." points de dégats.</p>";
        return $jetPuissance;
    }

     function diminuerDurabilite():self{
        $this->durabilite -=1;
        if ($this->durabilite <= 0){
            echo "<p>L'épée se brise</p>";
        }
        return $this;
    }
}

class Arc implements InterfaceArme{
    private int $munition;
    private string $type;
    private int $puissance;

    function __construct(int $munition, int $puissance, string $type){
        $this->munition = $munition;
        $this->puissance = $puissance;
        $this->type = $type;
    }

    public function afficher():void{
        echo "<p> Je suis un(e) ".$this->type ."</p>";
    }

    public function attaquer():int{
        if ($this->munition > 0){
            $this->munition -= 1;
            $jetPuissance = rand(1,$this->puissance);
            return $jetPuissance;
        }else{
            echo "<p>Plus de flèche</p>";
            return 0;
        }   
    }
}

class ProjectileMagique implements InterfaceArme{
    private string $type;

    function __construct(string $type){
        $this->type = $type;
    }

    public function afficher():void{
        echo "<p> Je suis un(e) ".$this->type ."</p>";
    }

    public function attaquer():int{
        $jetPuissance = rand(1,100);
        echo "<p>Il inflige ".$jetPuissance." points de dégats.</p>";
        return $jetPuissance;
    }
}