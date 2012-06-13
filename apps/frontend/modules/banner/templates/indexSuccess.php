<ul class="topmenu"><li><a href="http://www.bannerproject.eu">Home</a></li>  <li><a href="/project">Projects</a></li> <li><a href="/banner">Banners</a></li><li><a href="/help.html">Help</a></li>  </ul>

<h1>Banners List</h1>

<table class="width95">
  <thead>
    <tr>
      <th>Number</th>
      <th>Project</th>
      <th>Image url</th>
      <th>Text font</th>
      <th>Font size</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($banners as $banner): ?>
    <tr class="<?php if ($i&1) { echo "even"; } ?>">
      <td class="project"><a href="<?php echo url_for('banner/edit?id='.$banner->getId()) ?>"><?php echo $i + 1; ?></a></td>
      <td class="project"><?php echo $banner->getProjectName() ?></td>
      <td class="project"><img style="width: 50px;" src="/uploads/banner/<?php echo $banner->getImageUrl() ?>" /></td>
      <td class="project"><?php echo $banner->getTextFont() ?></td>
      <td class="project"><?php echo $banner->getFontSize() ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="adminbutton" href="<?php echo url_for('banner/new') ?>">New</a>
