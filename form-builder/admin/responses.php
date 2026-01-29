<?php
require '../core/db.php';
$formId = $_GET['form_id'];

$res = $db->query("
SELECT * FROM form_responses WHERE form_id=$formId
")->fetchAll(PDO::FETCH_ASSOC);
?>
<ul>
    <?php foreach ($res as $r): ?>
        <li>
            <?= $r['created_at'] ?>
            <a href="response_view.php?id=<?= $r['id'] ?>">Ver</a>
        </li>
    <?php endforeach; ?>
</ul>