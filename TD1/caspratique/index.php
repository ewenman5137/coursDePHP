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
        <h1>Bienvenue sur l'exercice 8</h1>
        <a href="">actualiser</a>
    </header>
    <table>
        <tr>
            <th>Nom</th>
            <th>Temps</th>
        </tr>
        <?php
        $jeu = array(
            array('name'=>'Minecraft','temps'=>4000),
            array('name'=>'Rocket league','temps'=>2000),
            array('name'=>'Mario kart','temps'=>600),
            array('name'=>'Fortnite','temps'=>450)
        );
        
        foreach($jeu as $jeu){
            echo "<tr>";
            echo "<td>" . $jeu['name'] . "</td>";
            echo "<td>" . $jeu['temps'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>