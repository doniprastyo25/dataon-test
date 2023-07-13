<?php

$databaseFile = 'questionOne/konfeksi.sqlite3';

$database = new SQLite3($databaseFile);

if (!$database) {
    die("Connection failed: " . $database->lastErrorMsg());
}

$tableJenisKain = "CREATE TABLE IF NOT EXISTS jenis_kain(
    id INTEGER PRIMARY KEY,
    nama_jenis TEXT,
    nama_kain TEXT
)";
$tableKualitasKain = "CREATE TABLE IF NOT EXISTS kualitas_kain(
    id INTEGER PRIMARY KEY,
    nama_kualitas TEXT
)";
$kainDanKualitas = "CREATE TABLE IF NOT EXISTS kain_dan_kualitas(
    id INTEGER PRIMARY KEY,
    id_kain INTEGER,
    id_kualitas INTEGER,
    harga TEXT
)";
$result = $database->exec($tableJenisKain);
$resultTwo = $database->exec($tableKualitasKain);
$resultThree = $database->exec($kainDanKualitas);
if (!$result && !$resultTwo){
    die("Table creation failed". $database->lastErrorMsg());
}

$dataKain = [
    ['STB','sutra'],
    ['NTB','katun'],
];
$dataKualitasKain = [
    ['Sangat Bagus'],
    ['Bagus'],
    ['Cukup Bagus']
];
$dataKainDanKualitas = [
    [1, 1, "Rp 10000000"],
    [1, 2, "Rp 9000000"],
    [1, 3, "Rp 8000000"],
    [2, 1, "Rp 10000000"],
    [2, 2, "Rp 10000000"],
    [2, 3, "Rp 10000000"]
];

$insertjeniskain = "INSERT INTO jenis_kain (nama_jenis, nama_kain) VALUES (?, ?)";
$insertKualitasKain = "INSERT INTO kualitas_kain (nama_kualitas) VALUES (?)";
$insertKainDanKualitas = "INSERT INTO kain_dan_kualitas(id_kain, id_kualitas, harga) VALUES (?, ?, ?)";
$statementjeniskain = $database->prepare($insertjeniskain);
$statementkualitaskain = $database->prepare($insertKualitasKain);
$statementKainDanKualitas = $database->prepare($insertKainDanKualitas);

foreach ($dataKain as $row) {
    $statementjeniskain->bindValue(1, $row[0], SQLITE3_TEXT);
    $statementjeniskain->bindValue(2, $row[1], SQLITE3_TEXT);
    $result = $statementjeniskain->execute();
    if (!$result) {
        die("Insert failed: " . $database->lastErrorMsg());
    }
}

foreach ($dataKualitasKain as $row) {
    $statementkualitaskain->bindValue(1,$row[0], SQLITE3_TEXT);
    $result = $statementkualitaskain->execute();
    if (!$result) {
        die("Insert failed: " . $database->lastErrorMsg());
    }
}

foreach ($dataKainDanKualitas as $row) {
    $statementKainDanKualitas->bindValue(1, $row[0]. SQLITE3_INTEGER);
    $statementKainDanKualitas->bindValue(2, $row[1]. SQLITE3_INTEGER);
    $statementKainDanKualitas->bindValue(3, $row[2]. SQLITE3_TEXT);
    $result = $statementKainDanKualitas->execute();
    if (!$result) {
        die("Insert failed: " . $database->lastErrorMsg());
    }
}

$database->close();