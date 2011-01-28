<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $banner->getId() ?></td>
    </tr>
    <tr>
      <th>Project:</th>
      <td><?php echo $banner->getProjectId() ?></td>
    </tr>
    <tr>
      <th>Image url:</th>
      <td><?php echo $banner->getImageUrl() ?></td>
    </tr>
    <tr>
      <th>Image text:</th>
      <td><?php echo $banner->getImageText() ?></td>
    </tr>
    <tr>
      <th>Text font:</th>
      <td><?php echo $banner->getTextFont() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $banner->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $banner->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('banner/edit?id='.$banner->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('banner/index') ?>">List</a>
