<h1>Projects List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Url</th>
      <th>Header</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($projects as $project): ?>
    <tr>
      <td><a href="<?php echo url_for('project/show?id='.$project->getId()) ?>"><?php echo $project->getId() ?></a></td>
      <td><?php echo $project->getId() ?></td>
      <td><?php echo $project->getName() ?></td>
      <td><?php echo $project->getUrl() ?></td>
      <td><?php echo $project->getHeader() ?></td>
      <td><?php echo $project->getCreatedAt() ?></td>
      <td><?php echo $project->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('project/new') ?>">New</a>

