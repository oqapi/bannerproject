<?php

/**
 * banner form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bannerForm extends BasebannerForm
{

  public function getFonts()
  {

        $fonts = array();
	if ($handle = opendir('/var/www/bannerproject.eu/sf_sandbox/fonts')) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				$fonts[$file] = "$file";
			}
		}
	        closedir($handle);
	}

	return $fonts;
  }
  
  public function configure()
  {
    #$this->useFields(array('project_id','image_url' ,'image_text','text_font'));
    unset($this['created_at'], $this['updated_at']);
    # Configure upload widget
    $this->setWidget('image_url', new sfWidgetFormInputFileEditable(
      array(
        'label'       => 'Banner',
        'file_src'    => '/uploads/banner/'.$this->getObject()->getImageUrl(),
        'is_image' => true,
      )
    ));
    $this->setWidget('text_font', new sfWidgetFormSelect(
	    array(
              'label' => 'Font',
	      'choices' => $this->getFonts(),
     )
    ));
    $this->validatorSchema['image_url_delete'] = new sfValidatorPass(); 
    $this->setValidator('image_url', new sfValidatorFile(array(
      'required'        => false,  
      'mime_types' => 'web_images',
      'path' => sfConfig::get('sf_upload_dir').'/banner'))
    );

  if ( $_GET['projectId'] != "" ) {
      $this->setDefault('project_id', $_GET['projectId']);
  }

  }

 protected function doSave ( $con = null )
  {
    $object = parent::doSave($con);
    
    if ($image = $this->getValue('image_url')) {
      $this->processImage($image, 'image_url');
    }
    if ($this->getValue('image_url_delete')) {
      $this->removeImage();
    };
    
    return $object;
  }

  protected function processImage ( sfValidatedFile $file, $object_field){
    if (!$file->isSaved()) {
      return;
    }
    $object = $this->getObject();

    $filename = basename($file->getSavedName());
    $filepath = sfConfig::get('sf_upload_dir').'/banner/'.$filename;
                
    #get support for layered GIF images
    #first get rid of old files 
    $filename = basename($this->getObject()->getImageUrl());

    if ($filename !== '') {
      $mask = sfConfig::get('sf_upload_dir').sprintf('/banner/frames/*%s',$filename);
      array_map( "unlink", glob( $mask ) );
      #and get rid of old bannerpositions
      $bannerPositions = Doctrine_Core::getTable('BannerPosition')->getBannerPositionsFromBanner($this->getObject()->getId());
      foreach ($bannerPositions as $bannerPosition) {
        $bannerPosition->delete();
      }
    }
    #see if there are layers
    #require(sfConfig::get('sf_root_dir').'/custom/GifSplit.class.php');
    #$sg = new GifSplit($filepath, 'BMP', sfConfig::get('sf_upload_dir').'/banner/frames/');
    include_once ( sfConfig::get('sf_root_dir').'/custom/GIFDecoder.class.php' );
    $gifDecoder = new GIFDecoder ( fread ( fopen ( $filepath, "rb" ), filesize ( $filepath ) ) );
    $image = new Imagick($filepath);
    $image = $image->coalesceImages(); // the trick!

#    $frames = $gifDecoder -> GIFGetFrames ( );
    $delays = $gifDecoder -> GIFGetDelays ( );
    $i = 0;
    #if (count($frames) > 1) {
      #save frames
      #foreach ( $gifDecoder -> GIFGetFrames ( ) as $frame ) {
      foreach ($image as $frame) {
        $delay = $delays[$i];
        #fwrite ( fopen ( sfConfig::get('sf_upload_dir').sprintf('/banner/frames/%03d%s',$i,$filename) , "wb" ), $frame );
        #$im = imagecreatefromstring($frame);
        #$black = imagecolorallocate($im, 0, 0, 0);

        // Make the background transparent
        #imagecolortransparent($im, $black);

        #imagegif($im, sfConfig::get('sf_upload_dir').sprintf('/banner/frames/%03d%s',$i,$filename) );
        $frame->writeImage(sfConfig::get('sf_upload_dir').sprintf('/banner/frames/%03d%s',$i,$filename));
        #copy(sfConfig::get('sf_upload_dir').'/banner/frames/'.$i.'.gif', sfConfig::get('sf_upload_dir').sprintf('/banner/frames/%03d%s',$i,$filename));
        $bannerPosition = new BannerPosition();
        $bannerPosition->setPositionIndex($i);
        $bannerPosition->setDelay($delay);
        $bannerPosition->setShowLabel(0);
        $bannerPosition->setBannerId($this->getObject()->getId());
        $bannerPosition->save();
        $i++;
      }
    #} else {
    #  #create 1 banner_position record
    #  fwrite ( fopen ( sfConfig::get('sf_upload_dir').sprintf('/banner/frames/%03d%s',$i,$filename) , "wb" ),$filepath );
    #  $bannerPosition = new BannerPosition();
    #  $bannerPosition->setBannerId($this->getObject()->getId());
    #  $bannerPosition->save();
    #}
 
  }
  
  protected function removeImage(){ 
    #and get rid of old bannerpositions
    $bannerPositions = Doctrine_Core::getTable('BannerPosition')->getBannerPositionsFromBanner($this->getObject()->getId());
    foreach ($bannerPositions as $bannerPosition) {
      $bannerPosition->delete();
    }
    #get rid of frames (if they exist)
    $filename = basename($this->getObject()->getImageUrl());
    if ($filename !== '') {
      $mask = sfConfig::get('sf_upload_dir').sprintf('/banner/frames/*%s',$filename);
      array_map( "unlink", glob( $mask ) );
    }
  }

  protected function recreateFrames(){
	  $filename = basename($file->getSavedName());

	     $filepath = sfConfig::get('sf_upload_dir').'/banner/'.$filename;
	    $image = new Imagick($filepath);

	     $image = $image->coalesceImages(); // the trick!
  }
 
}
