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
            if($_POST["email"]=="root@gmail.com" && $_POST["mot_de_passe"]=="rootpassword"){
                echo "Nous savons tout de vous votre email : ".$_POST["email"]."</br>";
                echo "Et même votre mot de passe : ".$_POST["mot_de_passe"];      
            }
            else {
                $erreur = "Échec de la connexion";
            }
        }
    ?>
    <h1>Connexion</h1>
    <?php if (isset($erreur)) echo "<p>$erreur</p>"; ?>
    <form action="" method="post">
        <input type="text" name="email" placeholder="Email :">
        <input type="password" name="mot_de_passe" placeholder="Mot de passe :">
        <div id="bouton_de_connection">
            <button type="submit">Connection</button>
        </div>
    </form>
</body>
</html>