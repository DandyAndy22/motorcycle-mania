<?php include '../header.php'; ?>
    <h2>Add a New Motorcycle</h2>
    <div id="motorcycle_form_container">
      <form action="motorcycles/create.php" method="GET">
        <label for="category_id">Category</label>
        <select name="category_id">
          <option value="">Select...</option>
          <option value="3">Cruiser</option>
          <option value="2">Dual-Sport</option>
          <option value="1">Naked</option>
          <option value="4">Sport</option>
        </select>
        <br>
        <label for="manufacturer_id">Manufacturer</label>
        <select name="manufacturer_id">
          <option value="">Select...</option>
          <option value="5">BMW</option>
          <option value="2">Honda</option>
          <option value="1">Indian</option>
          <option value="3">Triumph</option>
          <option value="4">Victory</option>
        </select>
        <br>
        <label for="model">Model</label>
        <input type="text">
        <br>
        <label for="year">Year</label>
        <input type="text" name="yeah">
        <br>
        <label for="motor_cc">Motor cc</label>
        <input type="text" name="motor_cc">
        <br>
        <label for="motor_hp">Motor hp</label>
        <input type="text" name="motor-hp">
        <br>
        <label for="image">Image</label>
        <input type="file" name="image">
        <br>
        <input type="submit" value="Save">
      </form>
    </div>
<?php include '../footer.php'; ?>
