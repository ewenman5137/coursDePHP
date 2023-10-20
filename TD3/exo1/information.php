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
    echo "Nous savons tout de vous votre email : ".$_POST["email"]."</br>";
    echo "Et même votre mot de passe : ".$_POST["mot_de_passe"];
    ?>
</body>
</html>