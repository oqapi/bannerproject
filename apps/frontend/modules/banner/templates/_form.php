<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('banner/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
	<td colspan="2">
	  <?php if (!$form->getObject()->isNew()): ?>
          &nbsp;<a class="adminbutton" href="<?php echo url_for('project/show/?id='.$form->getObject()->getProjectId()) ?>">Back to project</a>
	  <?php endif; ?>
	  <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'banner/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
	  <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
  <table>
    <?php
    $bannerPositions = Doctrine_Core::getTable('BannerPosition')->getBannerPositionsFromBanner($form->getObject()->getId());
    foreach ($bannerPositions as $bannerPosition) { ?>
    <tr>
      <td>
        <?php echo link_to('edit','bannerposition/edit?id='.$bannerPosition->getId()); ?><img src="<?php echo $bannerPosition->showBannerPositionImage(); ?>">
      </td>
      <td>Show label: <?php if ($bannerPosition->getShowLabel() == 1) { echo 'Yes';} else { echo 'no';} ?></td>
    </tr>
    <?php } ?>
  </table>
</form>
