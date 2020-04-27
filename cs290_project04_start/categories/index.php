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
$sql = "SELECT * FROM categories ORDER BY name;";
$categories = $db->query($sql);
?>
<?php include '../header.php'; ?>
<h2>Categories</h2>
<ul id="categories">
<?php while($category = $categories->fetch_assoc()) { ?>
  <li><h3><a href="/categories/show.php?id=<?= $category["id"] ?>"><?= $category['name'] ?></a></h3></li>
<?php } ?>
</ul>
<?php include '../footer.php'; ?>
