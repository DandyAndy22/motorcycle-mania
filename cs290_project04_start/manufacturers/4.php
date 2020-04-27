<?php include '../header.php'; ?>
    <h2>Victory</h2>
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
        <tr>
          <td><a href="/motorcycles/show.php?motorcycle_id=5"><img src="/assets/images/motorcycle_5_thumb.jpg" alt="2014 Victory Judge" class="thumbnail"></a></td>
          <td>2014</td>
          <td><a href="/manufacturers/4.php">Victory</a></td>
          <td><a href="/motorcycles/show.php?motorcycle_id=5">Judge</a></td>
          <td><a href="/categories/show.php?id=3">Cruiser</a></td>
          <td>1731cc, 85hp</td>
        </tr>
      </tbody>
    </table>
<?php include '../footer.php'; ?>
