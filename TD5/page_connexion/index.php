<?php
session_start(); // Déplacer session_start() au début

/*function affiche_correspondant($email, $password) {
    $conn = new mysqli("localhost", "root", "", "base_de_donnee_php");
    if ($conn->connect_error) {
        die("Erreur de connexion: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM COMPTE WHERE email=? AND mot_de_passe=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Erreur de préparation: " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $password); 
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header('Location: connexion.php');
        exit;
    } else {
        echo 'Email ou mot de passe invalide.';
    }

    $stmt->close();
    $conn->close();
}*/

function affiche_comptes(){
    $conn = new mysqli("localhost", "root", "", "base_de_donnee_php");
    $sql = "SELECT * FROM COMPTE";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Erreur de préparation: " . $conn->error);
    }
    $stmt->execute();
    $comptes = $stmt->get_result();
    return $comptes;
}
function inscrit_compte($nom,$prenom,$email, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $conn = new mysqli("localhost", "root", "", "base_de_donnee_php");
    if ($conn->connect_error) {
        die("Erreur de connexion: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO COMPTE(nom,prenom,email,mot_de_passe) VALUES(?,?,?,?);";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Erreur de préparation: " . $conn->error);
    }
    $stmt->bind_param("ssss",$nom,$prenom, $email, $password); 
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])){
        echo'Hello';
        inscrit_compte($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['password']);
        
    }?>

    <form method="post">
        <input type="text" name="nom" placeholder="Nom ">
        <input type="text" name="prenom" placeholder="Prenom">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" value="Se connecter">
    </form>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Mot de passe</th>
        </tr>
        <?php
        $comptes = affiche_comptes();
        foreach($comptes as $compte) {?>
        <tr>
        <td><?php echo $compte['nom'];?></td>
        <td><?php echo $compte['prenom'];?></td>
        <td><?php echo $compte['email'];?></td>
        <td><?php echo $compte['mot_de_passe'];?></td>
        </tr>
        <?php }?>
    </table>
    
</body>
</html>
