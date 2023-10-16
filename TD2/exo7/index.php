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
    $valeur_aleatoire = rand(1, 100);
    if(isset($_POST["randomValue"])){
        $valeur_aleatoire=$_POST["randomValue"];
    }
    else{
        $valeur_aleatoire = rand(1, 100);        
    }
    ?>
    <h2>Choissir un nombre :</h2>
    <form action="" method="POST">
        chiffre : <input type="number" name="nombre">
        <input type="text" name="randomValue" value="<?php echo $valeur_aleatoire;?>">
        <input type="submit" value="Essayer">
    </form>
    <?php
    var_dump($_POST);
    echo $valeur_aleatoire;
    $essai = $_POST['nombre'];
    if ($essai == $valeur_aleatoire) {
        echo "Bravo, vous avez trouvé le juste prix !";
    } elseif ($essai < $valeur_aleatoire) {
        echo "Trop petit !";
    } else {
        echo "Trop grand !";
    }
?>
</body>
</html>