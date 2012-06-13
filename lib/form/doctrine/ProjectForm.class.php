<?php

/**
 * Project form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Joeri de Bruin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProjectForm extends BaseProjectForm
{
  public function configure()
  {

	$this->setWidget('header', new sfWidgetFormInputFileEditable(
      		array(
        		'label'       => 'Example Banner',
        		'file_src'    => '/uploads/headers/'.$this->getObject()->getHeader(),
        		'is_image' => true,
      		)
    	));

	$this->validatorSchema['header'] = new sfValidatorBoolean();

	$this->validatorSchema['header_delete'] = new sfValidatorPass();
	$this->setValidator('header', new sfValidatorFile(array(
		'required'        => false,
		'mime_types' => 'web_images',
		'path' => sfConfig::get('sf_upload_dir').'/headers'))
	);



	  if ($this->getObject()->getId() == "" ) {
              $this->setDefault('url', 'This url will be generated automatically');
	  } else {
              $this->getObject()->setUrl("http://www.bannerproject.eu/project/showclient/id/" . $this->getObject()->getId());
              $this->setDefault('url', "http://www.bannerproject.eu/project/showclient/id/" . $this->getObject()->getId());
	  }
	  unset($this['created_at'], $this['updated_at']);
  }


}
