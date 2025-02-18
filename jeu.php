<?php
session_start();
include "./models/personnages.php";

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

<?php include "./layout/meta.php" ?>
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
