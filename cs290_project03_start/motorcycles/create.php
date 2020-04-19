<?php include '../header.php'; ?>

<?php
$category = $_POST['category_id'];
$manufacturer = $_POST['manufacturer_id'];
$model = $_POST['model'];
$year = $_POST['year'];
$motor_cc = $_POST['motor_cc'];
$motor_hp = $_POST['motor_hp'];
?>
    <h2>Motorcycle Saved</h2>
    <p>The new motorcycle has been added to the list.</p>
    <h3>Category:</h3>
    <p><?= $category ?></p>
    <h3>Manufacturer:</h3>
    <p><?= $manufacturer ?></p>
    <h3>Model:</h3>
    <p><?= $model ?></p>
    <h3>Year:</h3>
    <p><?= $year ?></p>
    <h3>Motor cc:</h3>
    <p><?= $motor_cc ?></p>
    <h3>Motor hp:</h3>
    <p><?= $motor_hp ?></p>
    <h3>Image:</h3>
    <p>(save for later / try doing it as a bonus challenge)</p>
    </div>
<?php include '../footer.php'; ?>
