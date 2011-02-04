<?php

/**
 * Banner filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Joeri de Bruin
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBannerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'project_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'image_url'       => new sfWidgetFormFilterInput(),
      'image_text'      => new sfWidgetFormFilterInput(),
      'banner_url'      => new sfWidgetFormFilterInput(),
      'text_font'       => new sfWidgetFormFilterInput(),
      'text_color'      => new sfWidgetFormFilterInput(),
      'font_size'       => new sfWidgetFormFilterInput(),
      'additional_info' => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'project_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Project'), 'column' => 'id')),
      'image_url'       => new sfValidatorPass(array('required' => false)),
      'image_text'      => new sfValidatorPass(array('required' => false)),
      'banner_url'      => new sfValidatorPass(array('required' => false)),
      'text_font'       => new sfValidatorPass(array('required' => false)),
      'text_color'      => new sfValidatorPass(array('required' => false)),
      'font_size'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'additional_info' => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('banner_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banner';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'project_id'      => 'ForeignKey',
      'image_url'       => 'Text',
      'image_text'      => 'Text',
      'banner_url'      => 'Text',
      'text_font'       => 'Text',
      'text_color'      => 'Text',
      'font_size'       => 'Number',
      'additional_info' => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
