<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=base_de_donnee_php', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

function create_task($nom, $description, $echeance) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO tasks (nom, description, echeance) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $description, $echeance]);
}

function get_tasks() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM tasks");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function update_task($id, $nom, $description, $echeance) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE tasks SET nom = ?, description = ?, echeance = ? WHERE id = ?");
    $stmt->execute([$nom, $description, $echeance, $id]);
}

function delete_task($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
}

function get_task_by_id($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
}

// Traitement des actions de mise à jour ou de création
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['id'])) {
        update_task($_POST['id'], $_POST['nom'], $_POST['description'], $_POST['echeance']);
        header('Location: index.php');
        exit;
    } else {
        create_task($_POST['nom'], $_POST['description'], $_POST['echeance']);
        header('Location: index.php');
        exit;
    }
}

if(isset($_GET['action']) && $_GET['action'] === 'supprimer' && isset($_GET['id'])) {
    delete_task($_GET['id']);
    header('Location: index.php');
    exit;
}?>