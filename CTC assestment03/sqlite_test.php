<?php

// open or create db
$db = new SQLite3('mydatabase.db');

// create table with new 'form' column
$db->exec("
    CREATE TABLE IF NOT EXISTS mytable (
        id INTEGER PRIMARY KEY AUTOINCREMENT,   --id 
        name TEXT NOT NULL,                     --name of the form to be displaeyed
        form TEXT,                              --link to the processing page of the token
        valid INTEGER,                          --binary
        formname TEXT not NULL                  --actual name of the form to be redirected after the processing of the token
    );
");

// check if table is empty
$result = $db->query("SELECT COUNT(*) AS count FROM mytable");
$row = $result->fetchArray(SQLITE3_ASSOC);

if ($row['count'] == 0) {

    // PHQ-9
    $stmt = $db->prepare("INSERT INTO mytable (name, form, valid, formname) VALUES (:name, :form, :valid, :formname)");
    $stmt->bindValue(':name', 'PHQ-9', SQLITE3_TEXT);
    $stmt->bindValue(':form', 'http://localhost/CTC%20assestment03/linkProcess.php?token=', SQLITE3_TEXT);//must be sent to specific webpage in the same server with a token of aleatory value tpo be contrasted with database
    $stmt->bindValue(':valid', 1, SQLITE3_INTEGER);
    $stmt->bindValue(':formname', 'PHQ-9.php', SQLITE3_TEXT);

    $stmt->execute();

    // GAD-7
    $stmt = $db->prepare("INSERT INTO mytable (name, form, valid, formname) VALUES (:name, :form, :valid, :formname)");
    $stmt->bindValue(':name', 'GAD-7', SQLITE3_TEXT);
    $stmt->bindValue(':form', 'http://localhost/CTC%20assestment03/linkProcess.php?token=', SQLITE3_TEXT);//must be sent to specific webpage in the same server with a token of aleatory value tpo be contrasted with database
    $stmt->bindValue(':valid', 1, SQLITE3_INTEGER);
    $stmt->bindValue(':formname', 'PHQ-9.php', SQLITE3_TEXT);
    $stmt->execute();

    echo "Table was empty. Records added.";
} else {
    echo "Table already contains data.";
}

// create table for tokens
$db->exec("
    CREATE TABLE IF NOT EXISTS tokens (
        token TEXT PRIMARY KEY,
        payload TEXT NOT NULL,       -- JSON con los datos
        created_at INTEGER NOT NULL, -- timestamp UNIX
        expires_at INTEGER,          -- timestamp UNIX o NULL
        used INTEGER DEFAULT 0       -- 0 = no usado, 1 = usado
    );
");


// check if table is empty
$result = $db->query("SELECT COUNT(*) AS count FROM tokens");
$row = $result->fetchArray(SQLITE3_ASSOC);

if ($row['count'] == 0) {

    echo "Table was empty. Records added.";
} else {
    echo "Table already contains data.";
}



?>