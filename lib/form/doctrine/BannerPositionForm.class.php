<?php

/**
 * BannerPosition form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Joeri de Bruin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BannerPositionForm extends BaseBannerPositionForm
{
  public function configure()
  {
	  unset($this['position_index']);

	  $this->setWidget('banner_id', new sfWidgetFormInputHidden());
	  
	  $this->setWidget('show_label', new sfWidgetFormSelect(
			array(
				'label' => 'Show Label',
				'choices' => array(0 => 'No', 1 => 'Yes'),
			)
		));

  }

 protected function doSave ( $con = null )
  {
    $object = parent::doSave($con);

    //create test image/frame
    $banner = Doctrine_Core::getTable('Banner')->find(array($this->getObject()->getBannerId()));
    $client = Doctrine_Core::getTable('client')->getClientByClientText($banner->getImageText());
    if (count($client) != 1){
      //create new
      $client = new Client();
      $client->setProjectId($banner->getProjectId());
      $client->setClientText($banner->getImageText());
    }
    $client->save();

    return $object;
  }

}
