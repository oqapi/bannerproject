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
  public function configure()
  {
    # Configure upload widget
    parent::configure();

    $this->setWidget('image_url', new sfWidgetFormInputFileEditable(
      array(
        'label'       => 'Banner',
        'file_src'    => '/uploads/'.$this->getObject()->getImageUrl(),
      )
    ));

    $this->setValidator('image_url', new sfValidatorFile(array('path' => 'uploads/')));
  }
}