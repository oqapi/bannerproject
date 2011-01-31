<h1>Client banners List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Banner</th>
      <th>Client text</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($client_banners as $client_banner): ?>
    <tr>
      <td><a href="<?php echo url_for('clientbanner/show?id='.$client_banner->getId()) ?>"><?php echo $client_banner->getId() ?></a></td>
      <td><?php echo $client_banner->getBannerId() ?></td>
      <td><?php echo $client_banner->getClientText() ?></td>
      <td><?php echo $client_banner->getCreatedAt() ?></td>
      <td><?php echo $client_banner->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('clientbanner/new') ?>">New</a>
