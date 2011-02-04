<?php

/**
 * client actions.
 *
 * @package    sf_sandbox
 * @subpackage client
 * @author     Joeri de Bruin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->clients = Doctrine_Core::getTable('Client')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->client = Doctrine_Core::getTable('Client')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->client);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClientForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ClientForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($client = Doctrine_Core::getTable('Client')->find(array($request->getParameter('id'))), sprintf('Object client does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientForm($client);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($client = Doctrine_Core::getTable('Client')->find(array($request->getParameter('id'))), sprintf('Object client does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientForm($client);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($client = Doctrine_Core::getTable('Client')->find(array($request->getParameter('id'))), sprintf('Object client does not exist (%s).', $request->getParameter('id')));
    $client->delete();

    $this->redirect('client/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $client = $form->save();

      $this->redirect('client/show?id='.$client->getId());
    }
  }

  public function executeDownloadbanner(sfWebRequest $request){
    $this->forward404Unless($client = Doctrine_Core::getTable('Client')->find(array($request->getParameter('id'))), sprintf('Object client does not exist (%s).', $request->getParameter('id')));
    $this->setLayout(false);
    $bannerId = $request->getParameter('bannerid');
    $filepath = $client->getBannerPath($bannerId);
    $this->forward404Unless(file_exists($filepath));
    $response = $this->getResponse();
    $response->setHttpHeader('Content-Disposition','attachment; filename="banner.gif');
    $response->setHttpHeader('filename:banner.gif',true);
    $response->setContentType('image');
    $response->sendHttpHeaders();
    $response->setContent(readfile($filepath));

    return sfView::NONE;
  }
           
}
