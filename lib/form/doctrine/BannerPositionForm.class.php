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
