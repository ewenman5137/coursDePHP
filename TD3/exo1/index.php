<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../packexo/style.css">
    <link rel="stylesheet" href="style.css">
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {            
        echo "Nous savons tout de vous votre email : ".$_POST["email"]."</br>";  
        echo "Nous savons tout de vous votre nom : ".$_POST["nom"]."</br>";  
        echo "Nous savons tout de vous votre sujet : ".$_POST["sujet"]."</br>";  
        echo "Nous savons tout de vous votre message : ".$_POST["message"]."</br>";    
        }
        else {
            $erreur = "Échec de la connexion";
        }
    ?>
    <h1>Connexion</h1>
    <?php if (isset($erreur)) echo "<p>$erreur</p>"; ?>
    <form action="" method="post">
        <input type="text" name="email" placeholder="Email :">
        <input type="text" name="nom" placeholder="Nom :">
        <input type="text" name="sujet" placeholder="Sujet :">
        <input type="text" name="message" placeholder="Message :">
        <div id="bouton_de_connection">
            <button type="submit">Connection</button>
        </div>
    </form>
</body>
</html>