<?php
require '../core/db.php';
require '../core/validator.php';

$formId = 2;

$fields = $db->query("
    SELECT * FROM form_fields 
    WHERE form_id = $formId 
    ORDER BY sort_order
")->fetchAll(PDO::FETCH_ASSOC);

$errors = [];
$values = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $values = $_POST;
    $errors = validate($fields, $_POST);

    if (!$errors) {
        $db->prepare("INSERT INTO form_responses (form_id) VALUES (?)")
            ->execute([$formId]);
        $rid = $db->lastInsertId();

        $stmt = $db->prepare("
            INSERT INTO form_response_values
            (response_id, field_name, field_value)
            VALUES (?, ?, ?)
        ");

        foreach ($fields as $f) {
            $stmt->execute([$rid, $f['name'], $_POST[$f['name']] ?? null]);
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <h3>Formulario</h3>

    <?php if ($_POST && !$errors): ?>
        <div class="alert alert-success">Formulario enviado ✔</div>
    <?php endif; ?>

    <form method="post">
        <?php foreach ($fields as $f): ?>
            <div class="mb-3">
                <label class="form-label"><?= $f['label'] ?></label>

                <?php if ($f['type'] == 'select'): ?>
                    <select name="<?= $f['name'] ?>" class="form-select">
                        <option value="">Seleccione</option>
                        <?php foreach (explode(',', $f['options']) as $o): ?>
                            <option <?= ($values[$f['name']] ?? '') == $o ? 'selected' : '' ?>><?= $o ?></option>
                        <?php endforeach; ?>
                    </select>

                <?php elseif ($f['type'] == 'textarea'): ?>
                    <textarea name="<?= $f['name'] ?>" class="form-control"><?= $values[$f['name']] ?? '' ?></textarea>

                <?php else: ?>
                    <input type="<?= $f['type'] ?>" name="<?= $f['name'] ?>" class="form-control"
                        value="<?= $values[$f['name']] ?? '' ?>">
                <?php endif; ?>

                <?php if (isset($errors[$f['name']])): ?>
                    <div class="text-danger"><?= $errors[$f['name']] ?></div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <button class="btn btn-primary">Enviar</button>
    </form>
</body>

</html>