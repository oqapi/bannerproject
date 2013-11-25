<?php

function is_ani($filename) {
    if(!($fh = @fopen($filename, 'rb')))
        return false;
    $count = 0;
    //an animated gif contains multiple "frames", with each frame having a
    //header made up of:
    // * a static 4-byte sequence (\x00\x21\xF9\x04)
    // * 4 variable bytes
    // * a static 2-byte sequence (\x00\x2C)

    // We read through the file til we reach the end of the file, or we've found
    // at least 2 frame headers
    while(!feof($fh) && $count < 2) {
        $chunk = fread($fh, 1024 * 100); //read 100kb at a time
        $count += preg_match_all('#\x00\x21\xF9\x04.{4}\x00\x2C#s', $chunk, $matches);
    }

    fclose($fh);
    if ($count > 1){
        return 'a';
    } else {
        return 's';
    };
}

?>
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
<li class="or"><a href="/help#howto" target="_blank">How can I use this code?</a></li>
</ul>
</div>

<div class="halfr">


<textarea>
<a href="<?php list($width, $height, $type, $attr) = getimagesize(sfConfig::get('sf_root_dir').'/web'.$clientBanner->getUrl($client->sha1ClientText())); echo $clientBanner->getBannerUrl(); echo $clientBanner->getBannerKind().'_'. $width.'X'.$height.'_'.$client->getClientText();?>" target="_blank"><img src="http://<?php echo $_SERVER['HTTP_HOST'].$clientBanner->getUrl($client->sha1ClientText()); ?>" style="border:none"></a>
</textarea>

<button name="submit" type="submit" name="Button" onClick="window.location.href='<?php echo "http://".$_SERVER['HTTP_HOST']."/client/downloadbanner/id/".$client->getId()."/bannerid/".$clientBanner->getId(); ?>';">Download banner</button>

</div>
</div>

</div>

<?php } ?>
