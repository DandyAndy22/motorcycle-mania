<?php
require '../config/db.php';
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
$sql = "SELECT * FROM manufacturers ORDER BY name;";
$manufacturers = $db->query($sql);
?>
<?php include '../header.php'; ?>
<h2>Manufacturers</h2>
<ul id="categories">
<?php while($manufacturer = $manufacturers->fetch_assoc()) { ?>
  <li><h3><a href="/manufacturers/show.php?id=<?= $manufacturer["id"] ?>"><?= $manufacturer['name'] ?></a></h3></li>
<?php } ?>
</ul>
<?php include '../footer.php'; ?>
