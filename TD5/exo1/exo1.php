<?php

$host = "localhost";
$dbname = "films";
$user = "root";
$password = "";

$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);

$departements_query = $bdd->query("SELECT departement_id,departement_code,departement_nom FROM departement");
$departements = $departements_query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Identifiant du département</th>
            <th>Code du département</th>
            <th>Nom du département</th>
        </tr>
        <?php foreach ($departements as $departement) { ?>
            <tr>
                <td><?php echo $departement["departement_id"]; ?></td>
                <td><?php echo $departement["departement_code"]; ?></td>
                <td><?php echo $departement["departement_nom"]; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
