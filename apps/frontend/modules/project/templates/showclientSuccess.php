<?php header('P3P: CP="NOI ADM DEV COM NAV OUR STP"'); ?>

<h1>Make sure visitors know where to find you</h1>

<div class="banner group">
<img src="/uploads/headers/<?php echo $project->getHeader(); ?>" alt="" />
</div> <!-- /.banner -->


<div class="benefits">

	<h2>Drive more people to your stand by creating <br /> customised banners for <b>FREE</b></h2>

	<ul>
		<li>Navigate traffic to your stand</li>
		<li>Promote your brand</li>
		<li>Generate business leads</li>
	</ul>

</div> <!-- /.benefits -->

<div class="actionbox group">

	<div class="halfl">
		<h3>Do it in 2 easy steps:</h3>

		<ol>
			<li>Add your company&#39;s stand number in the box.</li>
			<li>Copy paste the code or download the image.</li>
		</ol>
	</div>

	<div class="halfr">

<form method="post" action="/client/create" id="bannergenerator">


<fieldset>
      
<input type="hidden" value="<?php echo $project->getId() ?>" id="client_project_id" name="client[project_id]" />


  <label for="client_client_text">Your stand number</label>
  <input type="text" id="client_client_text" name="client[client_text]"><input type="hidden" id="client_id" name="client[id]">

</fieldset>

          <input type="submit" value="Generate your banners">
<?php echo $form['_csrf_token']; ?> 
</form>



		<p>...and go to the final step.</p>
	</div>

</div>
