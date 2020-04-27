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

$sql_insert_motorcycle = "INSERT INTO motorcycles(model, year, engine_cc, engine_hp, category_id, manufacturer_id)
  VALUES('$model', $year, $cc, $hp, $category_id, $manufacturer_id);";
// TODO: execute the query

$new_motorcycle_id = $db->insert_id;
// TODO: Use the `header` function to send a redirect to the URL that displays
//       the motorcycle details with id $new_motorcycle_id.
?>
