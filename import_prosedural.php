<?php
/**
 * Created by IntelliJ IDEA.
 * User: Shinoda
 * Date: 30/10/2019
 * Time: 7:58
 */
/*Prosedural*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_gis_kependudukan";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//$file = file_get_contents('single.sql');
$file = file_get_contents('multi_row.sql');
$msc=microtime(true);
$stmt = mysqli_multi_query($conn, $file);
$msc=microtime(true)-$msc;
if ($stmt) {
    echo substr($msc,0,5)." Detik";
} else {
    echo "Error : ".mysqli_error($conn);
}

mysqli_close($conn);