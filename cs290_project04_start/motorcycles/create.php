<?php
include '../config/db.php';

$category_id = $_POST['category_id'];
$manufacturer_id = $_POST['manufacturer_id'];
$model = $_POST['model'];
$year = $_POST['year'];
$cc = $_POST['engine_cc'];
$hp = $_POST['engine_hp'];

$db = new mysqli(
  $database_hostname,
  $database_username,
  $database_password,
  $database_db_name,
  $database_port
);
if ($db->connect_error) {
  die("Error: Could not connect to database. " . $db->connect_error);
}

$sql_insert_motorcycle = "INSERT INTO motorcycles(model, year, engine_cc, engine_hp, category_id, manufacturer_id) VALUES('$model', $year, $cc, $hp, $category_id, $manufacturer_id);";
$new_motorcycle = $db->query($sql_insert_motorcycle);

$new_motorcycle_id = $db->$insert_id;
	header('Location: /motorcycles/show.php?motorcycle_id=$new_motorcycle_id');

mysqli_close($db);
?>
