<?php

/**
 * BannerPosition form base class.
 *
 * @method BannerPosition getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Joeri de Bruin
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBannerPositionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'banner_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => false)),
      'position_index' => new sfWidgetFormInputText(),
      'x_start'        => new sfWidgetFormInputText(),
      'y_start'        => new sfWidgetFormInputText(),
      'x_end'          => new sfWidgetFormInputText(),
      'y_end'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'banner_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'))),
      'position_index' => new sfValidatorString(array('max_length' => 22, 'required' => false)),
      'x_start'        => new sfValidatorInteger(array('required' => false)),
      'y_start'        => new sfValidatorInteger(array('required' => false)),
      'x_end'          => new sfValidatorInteger(array('required' => false)),
      'y_end'          => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('banner_position[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BannerPosition';
  }

}
