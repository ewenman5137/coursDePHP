<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../packexo/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <header>
        <a href="javascript:history.back()">retour</a>
        <h1>Bienvenue sur les exercices de php</h1>
        <a href="">actualiser</a>
    </header>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // ouvre la session si elle n'est pas déjà ouverte
    }
    echo "Nous savons tout de vous votre email : ".$_SESSION["email"]."</br>";
    echo "Et même votre mot de passe : ".$_SESSION["mot_de_passe"];
    ?>
</body>
</html>