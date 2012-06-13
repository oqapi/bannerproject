<?php

/**
 * Project
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Joeri de Bruin
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Project extends BaseProject
{

  public function getProjectBanners() {
    $banners = Doctrine_Core::getTable('Banner')->getBannersFromProject($this->getId());
    return $banners;
  }

  public function createUrl() {
	  $url = "http://www.bannerproject.eu/project/showclient/id/" . $this->getId();
	  return $url;
  }

}
