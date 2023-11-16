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
    return $stmt->fetch(PDO::FETCH_ASSOC);
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
}

if(isset($_GET['action']) && $_GET['action'] === 'modifier' && isset($_GET['id'])) {   
    $task = get_task_by_id($_GET['id']);
    ?>
    <form method="post">
        <div>
            <input type="text" name="nom" value="<?php echo htmlspecialchars($task['nom']); ?>" />
        </div>
        <div>
            <textarea name="description"><?php echo htmlspecialchars($task['description']); ?></textarea>
        </div>
        <div>
            <input type="date" name="echeance" value="<?php echo htmlspecialchars($task['echeance']); ?>">
        </div>
        <div>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
            <button type="submit">Modifier la tâche</button>
        </div>
    </form>
    <?php
} else {
    ?>
    <form method="post">
        <div>
            <input type="text" name="nom" placeholder="Nom de la tâche" />
        </div>
        <div>
            <textarea name="description" placeholder="Description de la tâche"></textarea>
        </div>
        <div>
            <input type="date" name="echeance">
        </div>
        <div>
            <button type="submit">Ajouter la tâche</button>
        </div>
    </form>
    <?php 
}

$tasks = get_tasks();
if(is_array($tasks) && count($tasks) > 0){
    echo "<table>";
    echo "<tr><th>Nom</th><th>Description</th><th>Écheance</th><th>Modifier</th><th>Supprimer</th></tr>";
    foreach($tasks as $task){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($task['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($task['description']) . "</td>";
        echo "<td>" . htmlspecialchars($task['echeance']) . "</td>";
        echo "<td><a href='?id=" . urlencode($task['id']) . "&action=modifier'>Modifier</a></td>";
        echo "<td><a href='?id=" . urlencode($task['id']) . "&action=supprimer' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette tâche ?\");'>Supprimer</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Aucune tâche à afficher.</p>";
}
?>