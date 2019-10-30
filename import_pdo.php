<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_gis_kependudukan';

$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);

//$file = file_get_contents('single.sql');
$file = file_get_contents('multi_row.sql');

$stmt = $pdo->prepare($file);
$msc=microtime(true);
$stmt->execute();
$msc=microtime(true)-$msc;
echo substr($msc,0,5)." Detik";