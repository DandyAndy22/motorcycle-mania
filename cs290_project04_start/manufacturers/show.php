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
$manufacturer_id = $_GET['id'];

$sql_manufacturer = "SELECT * FROM manufacturers WHERE id = " . $manufacturer_id . ";";
$manufacturer = $db->query($sql_manufacturer)->fetch_assoc();
$manufacturer_id = $manufacturer['id'];
$manufacturer_name = $manufacturer['name'];

$sql_motorcycles = "SELECT motorcycles.id AS id, model, year, engine_cc, engine_hp, category_id, categories.id AS category_id, categories.name AS category_name FROM motorcycles, categories WHERE manufacturer_id = " . $manufacturer_id . " AND category_id = categories.id;";
$motorcycles = $db->query($sql_motorcycles);
$num_rows = mysqli_num_rows($motorcycles);
?>
<?php include '../header.php'; ?>
    <h2><?= $manufacturer_name ?> Motorcycles</h2>
    <?php if ($num_rows == 0) { ?>
      <h3>No motorcycles in this manufacturer.</h3>
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
          $category_id = $motorcycle['category_id'];
          $category_name = $motorcycle['category_name'];
        ?>
          <tr>
            <td><a href="/motorcycles/show.php?motorcycle_id=<?= $id ?>"><img src="/assets/images/motorcycle_<?= $id ?>_thumb.jpg" alt="<?= $model ?>" class="thumbnail"></a></td>
            <td><?= $year ?></td>
            <td><a href="/manufacturers/show.php?id=<?= $manufacturer_id ?>"><?= $manufacturer_name ?></a></td>
            <td><a href="/motorcycles/show.php?motorcycle_id=<?= $id ?>"><?= $model ?></a></td>
            <td><a href="/categories/show.php?id=<?= $category_id ?>"><?= $category_name ?></a></td>
            <td><?= $cc ?>cc, <?= $hp ?>hp</td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    <?php } ?>
<?php include '../footer.php'; ?>

