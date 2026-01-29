<?php
require '../core/db.php';

$formId = (int) $_POST['form_id'];

$data = [
    $_POST['label'],
    $_POST['name'],
    $_POST['type'],
    $_POST['required'] ?? 0,
    $_POST['options'] ?: null,
    $_POST['min_length'] ?: null,
    $_POST['max_length'] ?: null,
    $_POST['pattern'] ?: null,
    $_POST['sort_order'] ?? 0
];

if (!empty($_POST['id'])) {
    // UPDATE
    $stmt = $db->prepare("
        UPDATE form_fields SET
            label = ?,
            name = ?,
            type = ?,
            required = ?,
            options = ?,
            min_length = ?,
            max_length = ?,
            pattern = ?,
            sort_order = ?
        WHERE id = ?
    ");
    $stmt->execute(array_merge($data, [$_POST['id']]));
} else {
    // INSERT
    $stmt = $db->prepare("
        INSERT INTO form_fields
        (form_id, label, name, type, required, options, min_length, max_length, pattern, sort_order)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute(array_merge([$formId], $data));
}

header("Location: fields.php?form_id=" . $formId);
exit;
