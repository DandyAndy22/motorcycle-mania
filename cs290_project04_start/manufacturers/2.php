<?php include '../header.php'; ?>
    <h2>Honda</h2>
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
          <td><a href="/motorcycles/show.php?motorcycle_id=2"><img src="/assets/images/motorcycle_2_thumb.jpg" alt="2017 Honda CB 1100" class="thumbnail"></a></td>
          <td>2017</td>
          <td><a href="/manufacturers/2.php">Honda</a></td>
          <td><a href="/motorcycles/show.php?motorcycle_id=2">CB 1100</a></td>
          <td><a href="/categories/show.php?id=1">Naked</a></td>
          <td>1140cc, 89hp</td>
        </tr>
        <tr>
          <td><a href="/motorcycles/show.php?motorcycle_id=3"><img src="/assets/images/motorcycle_3_thumb.jpg" alt="2019 Honda Africa Twin" class="thumbnail"></a></td>
          <td>2019</td>
          <td><a href="/manufacturers/2.php">Honda</a></td>
          <td><a href="/motorcycles/show.php?motorcycle_id=3">Africa Twin</a></td>
          <td><a href="/categories/show.php?id=2">Dual-Sport</a></td>
          <td>998cc, 94hp</td>
        </tr>
      </tbody>
    </table>
<?php include '../footer.php'; ?>
