<?php
require '../core/db.php';

$responseId = (int) $_GET['id'];

// Info general
$response = $db->query("
    SELECT r.id, r.created_at, f.name AS form_name
    FROM form_responses r
    JOIN forms f ON f.id = r.form_id
    WHERE r.id = $responseId
")->fetch(PDO::FETCH_ASSOC);

// Valores
$values = $db->query("
    SELECT field_name, field_value
    FROM form_response_values
    WHERE response_id = $responseId
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Respuesta <?= $responseId ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <h3><?= htmlspecialchars($response['form_name']) ?></h3>
    <p><strong>Fecha:</strong> <?= $response['created_at'] ?></p>

    <table class="table table-bordered">
        <tr>
            <th>Campo</th>
            <th>Valor</th>
        </tr>
        <?php foreach ($values as $v): ?>
            <tr>
                <td><?= htmlspecialchars($v['field_name']) ?></td>
                <td><?= nl2br(htmlspecialchars($v['field_value'])) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="responses.php?form_id=<?= $response['id'] ?>">← Volver</a>

</body>

</html>