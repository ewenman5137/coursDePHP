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
        for($i=0;$i<100;$i++){
            $sortie = "";
            if($i%3==0){
                $sortie.="Fizz";
            }
            if($i%5==0){
                $sortie.="Buzz";
            }
            echo $sortie."<br/>";
        }
        
    ?>
</body>
</html>