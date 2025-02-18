
<?php
include "./models/armes.php";

?>

<?php include "./layout/meta.php"; ?>

<header>    
    <h1>Selectionnez un personnage :</h1>
</header>

<div class="container">
    <figure>
        <button>
            <img src="https://www.pinclipart.com/picdir/big/353-3539998_fighter-sprite-avatar-transparent-final-fantasy-1-warrior.png" alt="Guerrier">
        </button>
        <figcaption>Guerrier</figcaption>
    </figure>

    <figure>
        <button>
            <img src="https://cdn.thingiverse.com/assets/1f/c6/48/96/ea/featured_preview_thief.png" alt="Voleur">
        </button>
        <figcaption>Voleur</figcaption>
    </figure>
    
    <figure>
        <button>
            <img src="https://www.vhv.rs/dpng/d/551-5510243_8-bit-black-mage-final-fantasy-hd-png.png" alt="Mage">
        </button>
        <figcaption>Mage</figcaption>
    </figure>
</div>

<form method="POST" action="./controllers/selection.php">
    <label for="perso">Choisissez un personnage :</label>
    <select name="perso" id="perso">
        <option value="Guerrier">Guerrier</option>
        <option value="Voleur">Voleur</option>
        <option value="Magicien">Magicien</option>
    </select>

    <label for="nom">Nom du personnage :</label>
    <input type="text" name="nom" id="nom" required>

    <button type="submit">Créer</button>
</form>

<?php include "./layout/footer.php"; ?>