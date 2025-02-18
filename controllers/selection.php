<?php
include "../models/armes.php";
include "../models/personnages.php"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $perso = $_POST["perso"];
    $epee = new Epee(5,5,"Epee de bois"); 
    $arc = new Arc(5,5,"Arc en bois"); 
    $magie = new ProjectileMagique("Projectiles lambda"); 

    switch ($perso) {
        case "Guerrier":
            $personnage = new Guerrier($nom, $epee, "Guerrier");
            break;
        case "Voleur":
            $personnage = new Voleur($nom, $arc, "Voleur");
            break;
        case "Magicien":
            $personnage = new Magicien($nom, $magie, "Magicien");
            break;
        default:
            die("Type de personnage inconnu.");
    }


    session_start();
    $_SESSION["personnage"] = serialize($personnage);
    if (isset($_SESSION["personnage"])) {
        header("Location: ../jeu.php"); 
    }
    exit;
}
