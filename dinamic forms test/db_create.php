<?php
$db = new PDO('sqlite:db/forms.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

echo "✅ Tablas creadas correctamente";
