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
        <h1><a href="http://localhost/php/coursPHP/accueil.php">Bienvenue sur les exercices de php</a></h1>
        <a href="">actualiser</a>
    </header>
    <?php
    $resul = "";
    for($i = strlen($_GET["chaine"]) - 1; $i >= 0; $i--){
        $resul .= $_GET["chaine"][$i];
    }
    echo $resul;
    ?>
</body>
</html>