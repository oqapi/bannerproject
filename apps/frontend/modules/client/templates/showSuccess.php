<h1>Step 2: Let clients know where you are exhibiting</h1>

<div class="placementtips group">

<h2>Place your customised event banners on your:</h2>

<ul>
<li>Webpages</li>

<li>Social media platforms</li>

</ul>


<ul>
<li>Newsletters</li>

<li>Email signature</li>
</ul>


</div> <!-- /.placementtips -->

<div class="bannerdownload group">
<img src="Banners project 1/japan-468x60.gif" alt="" />
<div class="group">
<div class="halfl">
<ul>
<li>Copy & Paste the code to your own website</li>
<li class="or">Or</li>
<li>Click the download button to save the image.</li>
</ul>
</div>

 <?php foreach ($client->getClientBanners() as $clientBanner) { ?>
   <img src="<?php echo $clientBanner->getUrl($client->sha1ClientText()); ?>">

<div class="halfr">
<textarea>
<a href="http://www.registerbynet.com/reg.asp?showcode=<?php echo $client->getClientText(); ?>&source=107"
target="_blank"><img src="<?php echo $_SERVER['HTTP_HOST'].$clientBanner->getUrl($client->sha1ClientText()); ?>" style="border:none"></a>
</textarea>

<button name="submit" type="submit" name="Button" onClick="window.location.href='<?php echo "http://".$_SERVER['HTTP_HOST'].$clientBanner->getUrl($client->sha1ClientText()); ?>';">Download banner</button>
</div>
 <?php } ?>
</div>

</div>


<!--<table>
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
-->
