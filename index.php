<?php
session_start();
include "./personnages.php";

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

if (isset($_POST['mageAttaque'])) {
    $mage->attaquer(); 
    $_SESSION['mage'] = serialize($mage); 
}

if (isset($_POST['guerrierAttaque'])) {
  $guerrier->attaquer(); 
  $_SESSION['guerrier'] = serialize($guerrier); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RPG</title>
</head>
<body>
    <form action="" method="post">
        <input name="mageAttaque" type="submit" value="Mage attaque" />
    </form>

    <form action="" method="post">
        <input name="guerrierAttaque" type="submit" value="Guerrier attaque" />
    </form>


</body>
</html>
