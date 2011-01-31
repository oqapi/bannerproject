<?php

/**
 * clientbanner actions.
 *
 * @package    sf_sandbox
 * @subpackage clientbanner
 * @author     Joeri de Bruin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientbannerActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->client_banners = Doctrine_Core::getTable('ClientBanner')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->client_banner = Doctrine_Core::getTable('ClientBanner')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->client_banner);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClientBannerForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ClientBannerForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($client_banner = Doctrine_Core::getTable('ClientBanner')->find(array($request->getParameter('id'))), sprintf('Object client_banner does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientBannerForm($client_banner);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($client_banner = Doctrine_Core::getTable('ClientBanner')->find(array($request->getParameter('id'))), sprintf('Object client_banner does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientBannerForm($client_banner);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($client_banner = Doctrine_Core::getTable('ClientBanner')->find(array($request->getParameter('id'))), sprintf('Object client_banner does not exist (%s).', $request->getParameter('id')));
    $client_banner->delete();

    $this->redirect('clientbanner/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $client_banner = $form->save();

  #    $this->redirect('clientbanner/edit?id='.$client_banner->getId());
    }
  }
}
