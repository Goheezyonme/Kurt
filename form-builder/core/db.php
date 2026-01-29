<?php
$dbDir = __DIR__ . '/../db';
if (!is_dir($dbDir)) {
    mkdir($dbDir, 0777, true);
}

$db = new PDO('sqlite:' . $dbDir . '/forms.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
