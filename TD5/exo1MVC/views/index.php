
<?php
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