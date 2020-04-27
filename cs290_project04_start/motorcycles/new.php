<?php include '../header.php'; ?>
<?php
include '../config/db.php';

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

$sql_categories = "SELECT id, name FROM categories ORDER BY name;";
$categories = $db->query($sql_categories);

//
// TODO: Obtain the rows of manufacturers
//
?>
    <h2>Add a New Motorcycle</h2>
    <div id="motorcycle_form_container">
      <form action="/motorcycles/create.php" method="POST">
        <label for="category_id">Category</label>
        <select name="category_id">
          <option value="">Select...</option>
          <?php
            while ($category = $categories->fetch_assoc()) {
              $category_id = $category['id'];
              $category_name = $category['name'];
          ?>
            <option value="<?= $category_id ?>"><?= $category_name ?></option>
          <?php } ?>
        </select>
        <br>
        <label for="manufacturer_id">Manufacturer</label>
        <select name="manufacturer_id">
          <option value="">Select...</option>
          <!-- TODO: Generate the option tags -->
          <option value="1">TODO</option>
          <option value="1">TODO</option>
          <option value="1">TODO</option>
          <option value="1">TODO</option>
          <option value="1">TODO</option>
        </select>
        <br>
        <label for="model">Model</label>
        <input type="text" name="model">
        <br>
        <label for="year">Year</label>
        <input type="text" name="year">
        <br>
        <label for="engine_cc">Motor cc</label>
        <input type="text" name="engine_cc">
        <br>
        <label for="engine_hp">Motor hp</label>
        <input type="text" name="engine_hp">
        <br>
        <label for="image">Image</label>
        <input type="file" name="image">
        <br>
        <input type="submit" value="Save">
      </form>
    </div>
<?php mysqli_close($db); ?>
<?php include '../footer.php'; ?>
