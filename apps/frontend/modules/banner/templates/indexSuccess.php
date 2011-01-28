<h1>Banners List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Project</th>
      <th>Image url</th>
      <th>Image text</th>
      <th>Text font</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($banners as $banner): ?>
    <tr>
      <td><a href="<?php echo url_for('banner/show?id='.$banner->getId()) ?>"><?php echo $banner->getId() ?></a></td>
      <td><?php echo $banner->getProjectId() ?></td>
      <td><?php echo $banner->getImageUrl() ?></td>
      <td><?php echo $banner->getImageText() ?></td>
      <td><?php echo $banner->getTextFont() ?></td>
      <td><?php echo $banner->getCreatedAt() ?></td>
      <td><?php echo $banner->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('banner/new') ?>">New</a>
