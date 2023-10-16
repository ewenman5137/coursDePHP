<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../packexo/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1</title>
</head>
<body>
    <header>
        <a href="javascript:history.back()">retour</a>
        <h1><a href="http://localhost/php/coursPHP/accueil.php">Bienvenue sur les exercices de php</a></h1>
        <a href="">actualiser</a>
    </header>
    <?php
    echo "Boucle for :<br/>";
    for($i=4;$i<12;$i++){
        echo $i."<br/>";
    }
    echo "Boucle while :<br/>";
    $i=4;
    while($i<=12){
        echo $i."<br/>";
        $i++;
    }
    ?>
</body>
</html>