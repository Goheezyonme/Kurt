<?php
// ------------------
// DB CONNECTION
// ------------------
$dbPath = __DIR__ . '/db/forms.db';
if (!is_dir(__DIR__ . '/db')) {
    mkdir(__DIR__ . '/db', 0777, true);
}

$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ------------------
// CREATE TABLES IF NOT EXIST
// ------------------
$db->exec("
CREATE TABLE IF NOT EXISTS forms (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS form_fields (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    form_id INTEGER NOT NULL,
    label TEXT NOT NULL,
    name TEXT NOT NULL,
    type TEXT NOT NULL,
    required INTEGER DEFAULT 0,
    options TEXT,
    min_length INTEGER,
    max_length INTEGER,
    pattern TEXT,
    sort_order INTEGER DEFAULT 0,
    FOREIGN KEY (form_id) REFERENCES forms(id)
);
");

// ------------------
// SEED DATA IF EMPTY
// ------------------
$formCount = $db->query("SELECT COUNT(*) FROM forms")->fetchColumn();

if ($formCount == 0) {

    // Insert form
    $db->exec("INSERT INTO forms (name) VALUES ('Formulario de Registro')");
    $formId = $db->lastInsertId();

    // Insert fields
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
}

// ------------------
// LOAD FORM FIELDS
// ------------------
$formId = 1;
$stmt = $db->prepare("SELECT * FROM form_fields WHERE form_id = ? ORDER BY sort_order");
$stmt->execute([$formId]);
$fields = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ------------------
// VALIDATION FUNCTION
// ------------------
function validateForm(array $fields, array $data): array
{
    $errors = [];

    foreach ($fields as $f) {
        $name = $f['name'];
        $value = trim($data[$name] ?? '');

        if ($f['required'] && $value === '') {
            $errors[$name] = 'Campo obligatorio';
            continue;
        }

        if ($value && $f['min_length'] && strlen($value) < $f['min_length']) {
            $errors[$name] = "Mínimo {$f['min_length']} caracteres";
        }

        if ($value && $f['max_length'] && strlen($value) > $f['max_length']) {
            $errors[$name] = "Máximo {$f['max_length']} caracteres";
        }

        if ($value && $f['pattern'] && !preg_match("/{$f['pattern']}/", $value)) {
            $errors[$name] = 'Formato inválido';
        }
    }

    return $errors;
}

// ------------------
// HANDLE POST
// ------------------
$errors = [];
$values = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $values = $_POST;
    $errors = validateForm($fields, $_POST);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulario dinámico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">

                <h4 class="mb-3">Formulario dinámico</h4>

                <?php if ($_POST && empty($errors)): ?>
                    <div class="alert alert-success">
                        Formulario válido ✔
                    </div>
                <?php endif; ?>

                <form method="post" novalidate>

                    <?php foreach ($fields as $f):
                        $name = $f['name'];
                        $error = $errors[$name] ?? null;
                        ?>
                        <div class="mb-3">
                            <label class="form-label">
                                <?= htmlspecialchars($f['label']) ?>
                                <?= $f['required'] ? '<span class="text-danger">*</span>' : '' ?>
                            </label>

                            <?php if ($f['type'] === 'select'): ?>
                                <select name="<?= $name ?>" class="form-select <?= $error ? 'is-invalid' : '' ?>">
                                    <option value="">Seleccione</option>
                                    <?php foreach (explode(',', $f['options']) as $opt): ?>
                                        <option value="<?= $opt ?>" <?= ($values[$name] ?? '') === $opt ? 'selected' : '' ?>>
                                            <?= $opt ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                            <?php elseif ($f['type'] === 'textarea'): ?>
                                <textarea name="<?= $name ?>"
                                    class="form-control <?= $error ? 'is-invalid' : '' ?>"><?= htmlspecialchars($values[$name] ?? '') ?></textarea>

                            <?php else: ?>
                                <input type="<?= $f['type'] ?>" name="<?= $name ?>"
                                    value="<?= htmlspecialchars($values[$name] ?? '') ?>"
                                    class="form-control <?= $error ? 'is-invalid' : '' ?>">
                            <?php endif; ?>

                            <?php if ($error): ?>
                                <div class="invalid-feedback"><?= $error ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                    <button class="btn btn-primary">Enviar</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>