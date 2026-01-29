<?php
require '../core/db.php';

if ($_POST) {
    $db->prepare("INSERT INTO forms (name) VALUES (?)")
        ->execute([$_POST['name']]);
}

$forms = $db->query("SELECT * FROM forms")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<body class="container mt-4">
    <h3>Formularios</h3>

    <form method="post">
        <input name="name" placeholder="Nombre" required>
        <button>Crear</button>
    </form>

    <ul>
        <?php foreach ($forms as $f): ?>
            <li>
                <?= $f['name'] ?>
                <a href="fields.php?form_id=<?= $f['id'] ?>">Campos</a>
                <a href="responses.php?form_id=<?= $f['id'] ?>">Respuestas</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>