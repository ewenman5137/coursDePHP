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
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = new mysqli("localhost", "root", "", "base_de_donnee_bioclipse");

            $_SESSION["email"] = $_POST["email"];
            $_SESSION["mot_de_passe"] = $_POST["mot_de_passe"];
            
            $sql = "SELECT * FROM Compte WHERE adresse_email_compte = '".$_SESSION["email"]."' AND mot_de_passe_compte = '".$_SESSION["mot_de_passe"]."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['email'] = $row['adresse_email_compte'];
                $_SESSION['mot_de_passe'] = $row['mot_de_passe'];
                header("Location: /SAE3/accueil.php");        
                exit();
            } else {
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