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

$category_id = $_GET['id'];

$sql_category = "SELECT * FROM categories WHERE id = " . $category_id . ";";
$category = $db->query($sql_category)->fetch_assoc();
$category_id = $category['id'];
$category_name = $category['name'];

$sql_motorcycles = "SELECT motorcycles.id AS id, model, year, engine_cc, engine_hp, manufacturer_id, manufacturers.id AS manufacturer_id, manufacturers.name AS manufacturer_name FROM motorcycles, manufacturers WHERE category_id = " . $category_id . " AND manufacturer_id = manufacturers.id;";
$motorcycles = $db->query($sql_motorcycles);
$num_rows = mysqli_num_rows($motorcycles);
?>
<?php include '../header.php'; ?>
    <h2><?= $category_name ?> Motorcycles</h2>
    <?php if ($num_rows == 0) { ?>
      <h3>No motorcycles in this category.</h3>
    <?php } else { ?>
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
        <?php
        while($motorcycle = $motorcycles->fetch_assoc()) {
          $id = $motorcycle['id'];
          $model = $motorcycle['model'];
          $year = $motorcycle['year'];
          $cc = $motorcycle['engine_cc'];
          $hp = $motorcycle['engine_hp'];
          $manufacturer_id = $motorcycle['manufacturer_id'];
          $manufacturer_name = $motorcycle['manufacturer_name'];
        ?>
          <tr>
            <td><a href="/motorcycles/show.php?motorcycle_id=<?= $id ?>"><img src="/assets/images/motorcycle_<?= $id ?>_thumb.jpg" alt="<?= $model ?>" class="thumbnail"></a></td>
            <td><?= $year ?></td>
            <td><a href="/manufacturers/<?= $manufacturer_id ?>.php"><?= $manufacturer_name ?></a></td>
            <td><a href="/motorcycles/show.php?motorcycle_id=<?= $id ?>"><?= $model ?></a></td>
            <td><a href="/categories/show.php?id=<?= $category_id ?>"><?= $category_name ?></a></td>
            <td><?= $cc ?>cc, <?= $hp ?>hp</td>
          </tr>
        <?php } // end while ?>
        </tbody>
      </table>
    <?php } // end else clause ?>
<?php include '../footer.php'; ?>
