<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $client_banner->getId() ?></td>
    </tr>
    <tr>
      <th>Banner:</th>
      <td><?php echo $client_banner->getBannerId() ?></td>
    </tr>
    <tr>
      <th>Client text:</th>
      <td><?php echo $client_banner->getClientText() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $client_banner->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $client_banner->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('clientbanner/edit?id='.$client_banner->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('clientbanner/index') ?>">List</a>
