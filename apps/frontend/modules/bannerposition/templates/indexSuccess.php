<h1>Banner positions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Banner</th>
      <th>Position index</th>
      <th>Delay</th>
      <th>Show label</th>
      <th>X position</th>
      <th>Y position</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($banner_positions as $banner_position): ?>
    <tr>
      <td><a href="<?php echo url_for('bannerposition/show?id='.$banner_position->getId()) ?>"><?php echo $banner_position->getId() ?></a></td>
      <td><?php echo $banner_position->getBannerId() ?></td>
      <td><?php echo $banner_position->getPositionIndex() ?></td>
      <td><?php echo $banner_position->getDelay() ?></td>
      <td><?php echo $banner_position->getShowLabel() ?></td>
      <td><?php echo $banner_position->getXPosition() ?></td>
      <td><?php echo $banner_position->getYPosition() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('bannerposition/new') ?>">New</a>
