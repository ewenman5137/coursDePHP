<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../packexo/style.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["color"])) {
                $color = $_POST["color"];
                setcookie("user_color", $color, time() + 86400, "/");
                header("Refresh:0");
            }
        }

        $backgroundColor = "";
        if (isset($_COOKIE['user_color'])) {
            $backgroundColor = $_COOKIE['user_color'];
        } elseif (isset($_POST["color"])) {
            $backgroundColor = $_POST["color"];
        }
    ?>

<body <?php if (!empty($backgroundColor)) echo 'style="background-color: ' . $backgroundColor . ';"'; ?>>
    <header>
        <a href="javascript:history.back()">retour</a>
        <h1>Bienvenue sur les exercices de php</h1>
        <a href="">actualiser</a>
    </header>
    
    <h1>Connexion</h1>
    <form action="" method="post">
        <input type="color" name="color" placeholder="Votre couleur :"> 
        <div id="bouton_de_connection">
            <button type="submit">Connection</button>
        </div>
    </form>
</body>
</html>
