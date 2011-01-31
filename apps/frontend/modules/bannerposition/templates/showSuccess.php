<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $banner_position->getId() ?></td>
    </tr>
    <tr>
      <th>Banner:</th>
      <td><?php echo $banner_position->getBannerId() ?></td>
    </tr>
    <tr>
      <th>Position index:</th>
      <td><?php echo $banner_position->getPositionIndex() ?></td>
    </tr>
    <tr>
      <th>Delay:</th>
      <td><?php echo $banner_position->getDelay() ?></td>
    </tr>
    <tr>
      <th>Show label:</th>
      <td><?php echo $banner_position->getShowLabel() ?></td>
    </tr>
    <tr>
      <th>X position:</th>
      <td><?php echo $banner_position->getXPosition() ?></td>
    </tr>
    <tr>
      <th>Y position:</th>
      <td><?php echo $banner_position->getYPosition() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('bannerposition/edit?id='.$banner_position->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('bannerposition/index') ?>">List</a>
