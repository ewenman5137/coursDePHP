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
        <h1>Bienvenue sur l'exercice 6</h1>
        <a href="">actualiser</a>
    </header>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
        </tr>
        <?php
        $fruits = array(
            array('name'=>'pomme','price'=>1.00,'qte'=>100),
            array('name'=>'Banane','price'=>0.50,'qte'=>150),
            array('name'=>'Orange','price'=>1.20,'qte'=>75),
            array('name'=>'kiwi','price'=>0.80,'qte'=>120),
            array('name'=>'Fraise','price'=>2.00,'qte'=>50)
        );
        
        foreach($fruits as $fruit){
            echo "<tr>";
            echo "<td>" . $fruit['name'] . "</td>";
            echo "<td>" . $fruit['price'] . "</td>";
            echo "<td>" . $fruit['qte'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>