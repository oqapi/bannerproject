<ul class="topmenu"><li><a href="http://www.bannerproject.eu">Home</a></li>  <li><a href="/project">Projects</a></li> <li><a href="/banner">Banners</a></li><li><a href="/help.html">Help</a></li>  </ul>

<table class="width95">
  <tbody>
    <tr>
      <th>Id:</th>
      <td class="project"><?php echo $project->getId() ?></td>
    </tr>
    <tr class="even">
      <th>Name:</th>
      <td class="project"><?php echo $project->getName() ?></td>
    </tr>
    <tr>
      <th>Url:</th>
      <td class="project"><?php echo $project->getUrl() ?></td>
    </tr>
    <tr class="even">
      <th>Project Example Banner:</th>
      <td class="project"><?php echo $project->getHeader() ?></td>
    </tr>
    <?php $i = 0; foreach ($project->getProjectBanners() as $projectBanner) { ?>
    <tr class="<?php if ($i&1)  { ?>even<?php } ?>">
	   <td>
		<a href="<?php echo url_for('banner/edit?id='.$projectBanner->getId()) ?>">Edit this banner</a>
           </td>
           <td>
		<img src="<?php echo "/uploads/banner/".$projectBanner->getImageUrl(); ?>" style="border:none">
	   </td>
       </tr>
    <?php $i++; } ?>
  </tbody>
</table>

<hr />

<a class="adminbutton" href="<?php echo url_for('project/edit?id='.$project->getId()) ?>">Edit project</a>
&nbsp;
<a class="adminbutton" href="<?php echo url_for('project/index') ?>">Back to projects</a>
&nbsp;
<a class="adminbutton" href="/banner/new?projectId=<?php echo $project->getId(); ?>")">Add banner for this project</a>


