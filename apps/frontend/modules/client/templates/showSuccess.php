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

<?php foreach ($client->getClientBanners() as $clientBanner) { ?>
<div class="bannerdownload group">

<?php if ( $clientBanner->getAdditionalInfo() != "" ) { ?>
    <h3><?php echo $clientBanner->getAdditionalInfo(); ?></h3>
<?php } ?>

<img src="<?php echo $clientBanner->getUrl($client->sha1ClientText()); ?>">
<div class="group">
<div class="halfl">
<ul>
<li>Copy & Paste the code to your own website</li>
<li class="or">Or</li>
<li>Click download banner to save the image.</li>
</ul>
</div>

<div class="halfr">


<textarea>
<a href="<?php echo $clientBanner->getBannerUrl(); ?>"
target="_blank"><img src="<?php echo $_SERVER['HTTP_HOST'].$clientBanner->getUrl($client->sha1ClientText()); ?>" style="border:none"></a>
</textarea>

<button name="submit" type="submit" name="Button" onClick="window.location.href='<?php echo "http://".$_SERVER['HTTP_HOST']."/client/downloadbanner/id/".$client->getId()."/bannerid/".$clientBanner->getId(); ?>';">Download banner</button>

</div>
</div>

</div>

<?php } ?>
