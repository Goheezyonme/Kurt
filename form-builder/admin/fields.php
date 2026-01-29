<?php
require '../core/db.php';
$formId = $_GET['form_id'];

$fields = $db->query("
SELECT * FROM form_fields WHERE form_id=$formId
")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<body class="container">
    <h3>Campos</h3>

    <form method="post" action="field_save.php">
        <input type="hidden" name="form_id" value="<?= $formId ?>">
        <input name="label" placeholder="Label">
        <input name="name" placeholder="Name">
        <select name="type">
            <option>text</option>
            <option>email</option>
            <option>number</option>
            <option>textarea</option>
            <option>select</option>
        </select>
        <input name="options" placeholder="a,b,c">
        <input type="checkbox" name="required" value="1"> Req
        <button>+</button>
    </form>

    <ul>
        <?php foreach ($fields as $f): ?>
            <li><?= $f['label'] ?> (<?= $f['type'] ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>

</html>