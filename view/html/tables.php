<view class="simple">
  <table>
    <thead>
      <th>Name</th>
      <th>address</th>
      <th>facebook</th>
      <th>website</th>
      <th>actions</th>
    </thead>
    <tbody>
      <?php
      foreach($centers as $center){
        ?>
        <tr>
          <td><?php $center['name'] ?></td>
          <td><?php $center['name'] ?></td>
          <td><?php $center['name'] ?></td>
          <td><?php $center['name'] ?></td>
          <td><?php $center['name'] ?></td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</view>