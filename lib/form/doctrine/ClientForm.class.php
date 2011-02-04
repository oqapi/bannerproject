<?php

/**
 * Client form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Joeri de Bruin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClientForm extends BaseClientForm
{
  public function configure()
  {
	$arr = array(
		"client_text"		=> "Your stand number",
		"project_id"	=> " ",
	);
	$this->widgetSchema->setLabels($arr);
	unset($this['created_at'], $this['updated_at']);
  }
}
