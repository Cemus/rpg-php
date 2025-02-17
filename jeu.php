<?php
session_start();
include "./personnages.php";

// Vérifie si les personnages existent déjà dans la session
if (!isset($_SESSION['mage'])) {
    $projectile = new ProjectileMagique("Projectile");
    $mage = new Magicien("Jean", $projectile, $type="Magicien");
    $_SESSION['mage'] = serialize($mage); 
} else {
    $mage = unserialize($_SESSION['mage']);
}

if (!isset($_SESSION['guerrier'])) {
  $epee = new Epee(5,10,"Epee");
  $guerrier = new Guerrier("Paul", $epee, $type="Guerrier");
  $_SESSION['guerrier'] = serialize($guerrier); 
} else {
  $guerrier = unserialize($_SESSION['guerrier']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>RPG - Jeu</title>
</head>
<body>
    <h1>Combats RPG</h1>



    <nav>
        <ul>
            <li><a href="index.php">Retour au menu</a></li> 
        </ul>
    </nav>

    <?php
    if (isset($_POST['mageAttaque'])) {
        $mage->attaquer(); 
        $_SESSION['mage'] = serialize($mage); 
    }
    if (isset($_POST['guerrierAttaque'])) {
        $guerrier->attaquer(); 
        $_SESSION['guerrier'] = serialize($guerrier); 
    }
    ?>

    <form action="" method="post">
            <button type="submit" name="mageAttaque">Mage attaque</button>
            <button type="submit" name="guerrierAttaque">Guerrier attaque</button>
        </form>


</body>
</html>
