<?php
/*Object Oriented*/


$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '';
$mysql_database = 'db_gis_kependudukan';

$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$file = file_get_contents('single.sql');
$file = file_get_contents('multi_row.sql');
$msc=microtime(true);
$stmt = $conn->multi_query($file);
$msc=microtime(true)-$msc;
if ($stmt) {
    echo substr($msc,0,5)." Detik";
} else {
    echo "Error: ".$conn->error;
}

$conn->close();

//$con = mysqli_connect($mysql_host,$mysql_username,$mysql_password,$mysql_database);

//if ($con->connect_errno) {
//    echo "Failed to connect to MySQL: " . $con->connect_errno;
//    echo "<br/>Error: " . $con->connect_error;
//}
//
//$templine = '';
//$lines = file($filename);
//foreach ($lines as $line) {
//    if (substr($line, 0, 2) == '--' || $line == '')
//        continue;
//
//    $templine .= $line;
//    if (substr(trim($line), -1, 1) == ';') {
//        $msc=microtime(true);
//        mysqli_query($con,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_connect_error() . '<br /><br />');
//        $msc=microtime(true)-$msc;
//        echo substr($msc,0,5)." Detik<br>";
//        $templine = '';
//    }
//}
//echo "Tables imported successfully";
//mysqli_close($con);