<?php

/**
 * bannerposition actions.
 *
 * @package    sf_sandbox
 * @subpackage bannerposition
 * @author     Joeri de Bruin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bannerpositionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->banner_positions = Doctrine_Core::getTable('BannerPosition')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->banner_position = Doctrine_Core::getTable('BannerPosition')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->banner_position);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BannerPositionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BannerPositionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($banner_position = Doctrine_Core::getTable('BannerPosition')->find(array($request->getParameter('id'))), sprintf('Object banner_position does not exist (%s).', $request->getParameter('id')));
    $this->form = new BannerPositionForm($banner_position);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($banner_position = Doctrine_Core::getTable('BannerPosition')->find(array($request->getParameter('id'))), sprintf('Object banner_position does not exist (%s).', $request->getParameter('id')));
    $this->form = new BannerPositionForm($banner_position);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($banner_position = Doctrine_Core::getTable('BannerPosition')->find(array($request->getParameter('id'))), sprintf('Object banner_position does not exist (%s).', $request->getParameter('id')));
    $banner_position->delete();

    $this->redirect('bannerposition/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $banner_position = $form->save();

  #    $this->redirect('bannerposition/edit?id='.$banner_position->getId());
    }
  }
}
