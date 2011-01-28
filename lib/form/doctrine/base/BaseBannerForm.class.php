<?php

/**
 * Banner form base class.
 *
 * @method Banner getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Joeri de Bruin
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBannerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'project_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => false)),
      'image_url'  => new sfWidgetFormInputText(),
      'image_text' => new sfWidgetFormInputText(),
      'x_start'    => new sfWidgetFormInputText(),
      'y_start'    => new sfWidgetFormInputText(),
      'x_end'      => new sfWidgetFormInputText(),
      'y_end'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'project_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'))),
      'image_url'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image_text' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'x_start'    => new sfValidatorInteger(array('required' => false)),
      'y_start'    => new sfValidatorInteger(array('required' => false)),
      'x_end'      => new sfValidatorInteger(array('required' => false)),
      'y_end'      => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('banner[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banner';
  }

}
