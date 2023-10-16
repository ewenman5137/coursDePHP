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
    function factorielle($valeur){
        $resultat=1;
        for($i=$valeur;$i>1;$i--){
            $resultat = $resultat * $i;
        }
        if($resultat==0){
            $resultat=1;
        }
        return $resultat;
    }
    
    echo $_GET["factorielle"]."! = ".factorielle($_GET["factorielle"]);
    ?>
</body>
</html>