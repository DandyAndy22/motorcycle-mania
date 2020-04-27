<?php include '../header.php'; ?>
    <h2>Indian</h2>
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
          <td><a href="/motorcycles/show.php?motorcycle_id=1"><img src="/assets/images/motorcycle_1_thumb.jpg" alt="2019 Indian FTR 1200 S" class="thumbnail"></a></td>
          <td>2019</td>
          <td><a href="/manufacturers/1.php">Indian</a></td>
          <td><a href="/motorcycles/show.php?motorcycle_id=1">FTR 1200 S</a></td>
          <td><a href="/categories/show.php?id=1">Naked</a></td>
          <td>1203cc, 120hp</td>
        </tr>
      </tbody>
    </table>
<?php include '../footer.php'; ?>
