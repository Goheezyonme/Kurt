<?php
function validate(array $fields, array $data): array
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

