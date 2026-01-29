<?php
require '../core/db.php';

$id = (int) $_GET['id'];
$formId = (int) $_GET['form_id'];

$db->prepare("DELETE FROM form_fields WHERE id = ?")
    ->execute([$id]);

header("Location: fields.php?form_id=" . $formId);
exit;
