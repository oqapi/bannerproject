<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="bannergenerator" action="<?php echo url_for('client/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<fieldset>
      <?php echo $form ?>
</fieldset>

          <input type="submit" value="Generate your banners" />
  <?php foreach ($form->getObject()->getClientBanners() as $clientBanner) { ?>
  <img src="<?php echo $clientBanner->getUrl($form->getObject()->sha1ClientText()); ?>">
  <?php } ?>

</form>
