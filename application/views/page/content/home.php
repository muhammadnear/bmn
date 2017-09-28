	<script src="<?php echo base_url()?>assets/bxslider/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->
    <link href="<?php echo base_url()?>assets/bxslider/jquery.bxslider.css" rel="stylesheet" />

	<ul class="bxslider">
        <?php 
        	foreach ($sliders as $key) 
        	{
        		echo "<li><img style='width: 100%;' src='".base_url()."assets/media/sliders/".$key->path."' /></li>";
        	}
        ?>
    </ul>

<script type="text/javascript">
    $(document).ready(function(){
      $('.bxslider').bxSlider();
      window.setInterval(function(){
		  $('.bx-next').click();
		}, 4000);
    });
</script>