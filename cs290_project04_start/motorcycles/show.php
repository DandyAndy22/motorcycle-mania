<?php include '../header.php';
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

$motorcycle_id = $_GET['motorcycle_id'];
$sql_motorcycle = "SELECT motorcycles.id AS id, model, year, engine_cc, engine_hp,
  manufacturers.id AS manufacturer_id, manufacturers.name AS manufacturer_name,
  categories.id AS category_id, categories.name AS category_name
  FROM motorcycles, manufacturers, categories
  WHERE motorcycles.manufacturer_id = manufacturers.id
  AND motorcycles.category_id = categories.id
  AND motorcycles.id = " . $motorcycle_id . " LIMIT 1;";
$motorcycle = $db->query($sql_motorcycle)->fetch_assoc();

$motorcycle_model = $motorcycle['model'];
$motorcycle_year = $motorcycle['year'];
$motorcycle_cc = $motorcycle['engine_cc'];
$motorcycle_hp = $motorcycle['engine_hp'];
$manufacturer_id = $motorcycle['manufacturer_id'];
$manufacturer_name = $motorcycle['manufacturer_name'];
$category_id = $motorcycle['category_id'];
$category_name = $motorcycle['category_name'];

mysqli_close($db);
?>
<div id="motorcycle">
  <h3><a href="/motorcycles/<?= $motorcycle_id ?>.php"><?= $motorcycle_year ?> <?= $manufacturer_name ?> <?= $motorcycle_model ?></a></h3>
  <a href="/motorcycles/<?= $motorcycle_id ?>.php"><img src="/assets/images/motorcycle_<?= $motorcycle_id ?>.jpg" alt="<?= $motorcycle_year ?> <?= $manufacturer_name ?> <?= $motorcycle_model ?>"></a>
  <h4>Manufacturer: <a href="/manufacturers/<?= $manufacturer_id ?>.php"><?= $manufacturer_name ?></a></h4>
  <h4>Category: <a href="/categories/show.php?id=<?= $category_id ?>"><?= $category_name ?></a></h4>
  <p><?= $motorcycle_cc ?>cc, <?= $motorcycle_hp ?>hp</p>
</div>
<?php include '../footer.php'; ?>
