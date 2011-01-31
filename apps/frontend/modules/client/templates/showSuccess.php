<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $client->getId() ?></td>
    </tr>
    <tr>
      <th>Project:</th>
      <td><?php echo $client->getProjectId() ?></td>
    </tr>
    <tr>
      <th>Client text:</th>
      <td><?php echo $client->getClientText() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $client->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $client->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('client/edit?id='.$client->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('client/index') ?>">List</a>
