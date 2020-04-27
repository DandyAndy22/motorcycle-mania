<?php include 'header.php'; ?>
<?php
require 'config/db.php';

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

$featured_motorcycle_id = rand(1, 5);
$sql_featured_motorcycle = "SELECT motorcycles.id AS id, model, year, engine_cc, engine_hp,
  manufacturers.id AS manufacturer_id, manufacturers.name AS manufacturer_name,
  categories.id AS category_id, categories.name AS category_name
  FROM motorcycles, manufacturers, categories
  WHERE motorcycles.manufacturer_id = manufacturers.id
  AND motorcycles.category_id = categories.id
  AND motorcycles.id = " . $featured_motorcycle_id . " LIMIT 1;";
$featured_motorcycle = $db->query($sql_featured_motorcycle)->fetch_assoc();

$featured_motorcycle_model = $featured_motorcycle['model'];
$featured_motorcycle_year = $featured_motorcycle['year'];
$featured_motorcycle_cc = $featured_motorcycle['engine_cc'];
$featured_motorcycle_hp = $featured_motorcycle['engine_hp'];
$featured_motorcycle_manufacturer_id = $featured_motorcycle['manufacturer_id'];
$featured_motorcycle_manufacturer_name = $featured_motorcycle['manufacturer_name'];
$featured_motorcycle_category_id = $featured_motorcycle['category_id'];
$featured_motorcycle_category_name = $featured_motorcycle['category_name'];

$sql_motorcycles = "SELECT motorcycles.id AS id, model, year, engine_cc, engine_hp,
  manufacturers.id AS manufacturer_id, manufacturers.name AS manufacturer_name,
  categories.id AS category_id, categories.name AS category_name
  FROM motorcycles, manufacturers, categories
  WHERE motorcycles.manufacturer_id = manufacturers.id
  AND motorcycles.category_id = categories.id;";
$motorcycles = $db->query($sql_motorcycles);

?>
    <div id="featured">
      <h2>Featured Bike</h2>
      <div id="motorcycle">
        <h3><a href="/motorcycles/show.php?motorcycle_id=<?= $featured_motorcycle_id ?>"><?= $featured_motorcycle_year ?> <?= $featured_motorcycle_manufacturer_name ?> <?= $featured_motorcycle_model ?></a></h3>
        <a href="/motorcycles/show.php?motorcycle_id=<?= $featured_motorcycle_id ?>"><img src="/assets/images/motorcycle_<?= $featured_motorcycle_id ?>.jpg" alt="<?= $featured_motorcycle_year ?> <?= $featured_motorcycle_manufacturer_name ?> <?= $featured_motorcycle_model ?>"></a>
        <h4>Manufacturer: <a href="/manufacturers/<?= $featured_motorcycle_manufacturer_id ?>.php"><?= $featured_motorcycle_manufacturer_name ?></a></h4>
        <h4>Category: <a href="/categories/show.php?id=<?= $featured_motorcycle_category_id ?>"><?= $featured_motorcycle_category_name ?></a></h4>
        <p><?= $featured_motorcycle_cc ?>cc, <?= $featured_motorcycle_hp ?>hp</p>
      </div>
    </div>
    <table id="motorcycles">
      <thead>
        <tr>
          <th><!-- thumbnail --></th>
          <th>Year</th>
          <th>Manufacturer</th>
          <th>Model</th>
          <th>Category</th>
          <th>Engine</th>
        </tr>
      </thead>
      <tbody>
<?php while ($motorcycle = $motorcycles->fetch_assoc()) {
  $id = $motorcycle['id'];
  $model = $motorcycle['model'];
  $year = $motorcycle['year'];
  $cc = $motorcycle['engine_cc'];
  $hp = $motorcycle['engine_hp'];
  $manufacturer_id = $motorcycle['manufacturer_id'];
  $manufacturer_name = $motorcycle['manufacturer_name'];
  $category_id = $motorcycle['category_id'];
  $category_name = $motorcycle['category_name'];
?>
        <tr>
          <td><a href="/motorcycles/show.php?motorcycle_id=<?= $id ?>"><img src="/assets/images/motorcycle_<?= $id ?>_thumb.jpg" alt="<?= $year ?> <?= $manufacturer_name ?> <?= $model ?>" class="thumbnail"></a></td>
          <td><?= $year ?></td>
          <td><a href="/manufacturers/<?= $manufacturer_id ?>.php"><?= $manufacturer_name ?></a></td>
          <td><a href="/motorcycles/show.php?motorcycle_id=<?= $id ?>"><?= $model ?></a></td>
          <td><a href="/categories/show.php?id=<?= $category_id ?>"><?= $category_name ?></a></td>
          <td><?= $cc ?>cc, <?= $hp ?>hp</td>
        </tr>
<?php } ?>
      </tbody>
    </table>
<?php mysqli_close($db); ?>
<?php include 'footer.php'; ?>
