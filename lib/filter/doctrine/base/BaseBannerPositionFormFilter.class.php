<?php

/**
 * BannerPosition filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Joeri de Bruin
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBannerPositionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'banner_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'position_index' => new sfWidgetFormFilterInput(),
      'x_position'     => new sfWidgetFormFilterInput(),
      'y_position'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'banner_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Project'), 'column' => 'id')),
      'position_index' => new sfValidatorPass(array('required' => false)),
      'x_position'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y_position'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('banner_position_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BannerPosition';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'banner_id'      => 'ForeignKey',
      'position_index' => 'Text',
      'x_position'     => 'Number',
      'y_position'     => 'Number',
    );
  }
}
