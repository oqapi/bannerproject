<h1>Clients List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Project</th>
      <th>Client text</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($clients as $client): ?>
    <tr>
      <td><a href="<?php echo url_for('client/show?id='.$client->getId()) ?>"><?php echo $client->getId() ?></a></td>
      <td><?php echo $client->getProjectId() ?></td>
      <td><?php echo $client->getClientText() ?></td>
      <td><?php echo $client->getCreatedAt() ?></td>
      <td><?php echo $client->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('client/new') ?>">New</a>
