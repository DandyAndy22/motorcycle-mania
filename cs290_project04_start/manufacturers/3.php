<?php include '../header.php'; ?>
    <h2>Triumph</h2>
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
          <td><a href="/motorcycles/show.php?motorcycle_id=4"><img src="/assets/images/motorcycle_4_thumb.jpg" alt="2019 Triumph Thruxton" class="thumbnail"></a></td>
          <td>2019</td>
          <td><a href="/manufacturers/3.php">Triumph</a></td>
          <td><a href="/motorcycles/show.php?motorcycle_id=4">Thruxton</a></td>
          <td><a href="/categories/show.php?id=1">Naked</a></td>
          <td>1200cc, 97hp</td>
        </tr>
      </tbody>
    </table>
<?php include '../footer.php'; ?>
