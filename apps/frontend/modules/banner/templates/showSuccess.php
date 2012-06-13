<ul class="topmenu"><li><a href="http://www.bannerproject.eu">Home</a></li>  <li><a href="/project">Projects</a></li> <li><a href="/banner">Banners</a></li><li><a href="/help.html">Help</a></li>  </ul>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $banner->getId() ?></td>
    </tr>
    <tr class="even">
      <th>Project:</th>
      <td><?php echo $banner->getProjectId() ?></td>
    </tr>
    <tr>
      <th>Image url:</th>
      <td><?php echo $banner->getImageUrl() ?></td>
    </tr>
    <tr class="even">
      <th>Image text:</th>
      <td><?php echo $banner->getImageText() ?></td>
    </tr>
    <tr>
      <th>Text font:</th>
      <td><?php echo $banner->getTextFont() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a class="adminbutton" href="<?php echo url_for('banner/edit?id='.$banner->getId()) ?>">Edit</a>
&nbsp;
<a class="adminbutton" href="<?php echo url_for('banner/index') ?>">List</a>
