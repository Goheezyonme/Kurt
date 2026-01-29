<?php
$db = new PDO('sqlite:db/forms.db');

$db->exec("INSERT INTO forms (name) VALUES ('Formulario de Registro')");

$formId = $db->lastInsertId();

$fields = [
    ['Nombre completo', 'full_name', 'text', 1, null, 3, 100, null, 1],
    ['Email', 'email', 'email', 1, null, null, null, '^[^@\s]+@[^@\s]+\.[^@\s]+$', 2],
    ['Edad', 'age', 'number', 0, null, null, null, null, 3],
    ['Estado', 'status', 'select', 1, 'Activo,Inactivo', null, null, null, 4],
    ['Comentario', 'comment', 'textarea', 0, null, null, 200, null, 5]
];

$stmt = $db->prepare("
INSERT INTO form_fields 
(form_id, label, name, type, required, options, min_length, max_length, pattern, sort_order)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

foreach ($fields as $f) {
    $stmt->execute(array_merge([$formId], $f));
}

echo "✅ Datos de ejemplo insertados";
