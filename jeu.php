<?php
session_start();

include "./models/personnages.php";
include "./models/armes.php";

if (isset($_SESSION['personnage'])) {
    $personnage = unserialize($_SESSION['personnage']);
}

?>

<?php include "./layout/meta.php" ?>

<header><h1>Combats RPG</h1></header>


<div class="battlefield">
    <div>
        <img src="https://preview.redd.it/i-was-told-to-post-this-here-my-first-pixel-animation-v0-foc4vu4ob1da1.gif?format=png8&s=57a2c1f1411d43669429acab748fb3265c5237e1" alt="Rat">
        <div class="healthbar"></div>
    </div>

    <div>
        <img src="https://preview.redd.it/i-was-told-to-post-this-here-my-first-pixel-animation-v0-foc4vu4ob1da1.gif?format=png8&s=57a2c1f1411d43669429acab748fb3265c5237e1" alt="Rat">
        <div class="healthbar"></div>
    </div>
</div>

<div>
    <h3>Rapport :</h3>
    <p>Vous voyez deux rats !</p>
    <?php
    if (isset($_POST['attaquer'])) {
        $personnage->attaquer(); 
        $_SESSION['personnage'] = serialize($personnage); 
    }
    ?>
</div>



<form action="" method="post">
    <button type="submit" name="attaquer1">Attaquer le rat 1</button>
    <button type="submit" name="attaquer2">Attaquer le rat 2</button>

</form>

<?php include "./layout/footer.php"; ?>

</body>
</html>
