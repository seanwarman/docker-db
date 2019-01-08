<?php
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$dbname = 'seantest';
$db = new mysqli($host, $user, $pass, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} else {
    echo "Connected to MySQL successfully! <br />";
}

$sql = "SELECT * FROM fake";

if(!$result = $db->query($sql)) {
  die('There was an error :( [' . $db->error . ']');
}

// while($row = $result->fetch_assoc()) {
//   echo $row['charone'], ' ', $row['number'], ' ', $row['date'], ' ', $row['text'] . '<br />';
// }

$table = $result->fetch_all();

$table = json_encode($table);
?>