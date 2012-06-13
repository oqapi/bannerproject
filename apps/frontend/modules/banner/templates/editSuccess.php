<ul class="topmenu"><li><a href="http://www.bannerproject.eu">Home</a></li>  <li><a href="/project">Projects</a></li> <li><a href="/banner">Banners</a></li><li><a href="/help.html">Help</a></li>  </ul>

<h1>Edit Banner</h1>

<?php include_partial('form', array('form' => $form)) ?>

<script type="text/javascript">
	var colorValue = $('#banner_text_color').val();
	$('#banner_text_color').css('color', '#' + colorValue);
	$('#banner_text_color').ColorPicker({
        	color: colorValue,
        	onShow: function (colpkr) {
                	$(colpkr).fadeIn(10);
                	return false;
        	},
        	onHide: function (colpkr) {
                	$(colpkr).fadeOut(500);
        	        return false;
        	},
        	onChange: function (hsb, hex, rgb) {
                	$('#banner_text_color').css('color', '#' + hex);
                	$('#banner_text_color').val(hex);	
        	}
	});

</script>

