<ul class="topmenu"><li><a href="http://www.bannerproject.eu">Home</a></li>  <li><a href="/project">Projects</a></li> <li><a href="/banner">Banners</a></li><li><a href="/help.html">Help</a></li>  </ul>

<h1>Projects List</h1>

<table class="width95">
  <thead>
    <tr>
      <th>Name</th>
      <th>Url</th>
      <th>Example Banner</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; foreach ($projects as $project): ?>
    <tr class="<?php if ($i&1)  { ?>even<?php } ?>">
      <td class="project"><a href="<?php echo url_for('project/show?id='.$project->getId()) ?>"><?php echo $project->getName() ?></a></td>
      <td class="project"><?php echo $project->getUrl() ?></td>
      <td class="project"><img src="/uploads/headers/<?php echo $project->getHeader() ?>" style="width: 200px;" ></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="adminbutton" href="<?php echo url_for('project/new') ?>">Add new project</a>

