<?php

/**
 * static actions.
 *
 * @package    sf_sandbox
 * @subpackage static
 * @author     Joeri de Bruin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staticActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

 /**
  * Executes help action
  *
  * @param sfRequest $request A request object
  */
  public function executeHelp(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

}
