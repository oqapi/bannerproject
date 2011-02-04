<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $project->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $project->getName() ?></td>
    </tr>
    <tr>
      <th>Url:</th>
      <td><?php echo $project->getUrl() ?></td>
    </tr>
    <tr>
      <th>Header:</th>
      <td><?php echo $project->getHeader() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $project->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $project->getUpdatedAt() ?></td>
    </tr>
    <?php foreach ($project->getProjectBanners() as $projectBanner) { ?>
       <tr>
	   <td>
		<a href="<?php echo url_for('banner/edit?id='.$projectBanner->getId()) ?>">Edit this banner</a>
           </td>
           <td>
		<img src="<?php echo "/uploads/banner/".$projectBanner->getImageUrl(); ?>" style="border:none">
	   </td>
       </tr>
    <?php } ?>
  </tbody>
</table>

<hr />

<?php $clientForm = new ClientForm(); ?>

<a href="<?php echo url_for('project/edit?id='.$project->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('project/index') ?>">List</a>


