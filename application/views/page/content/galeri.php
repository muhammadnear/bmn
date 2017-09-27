	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugin/fancybox/jquery.fancybox.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/plugin/fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.fancybox').fancybox();
		});
	</script>

	<ul class="breadcrumb">
		<li>Home</li>
		<li class="active">Galeri foto</li>
	</ul>
	
	<div class="galeri">
		<div class="row">
<?php	
	$no = 1;
	foreach ($gallery as $key) 
	{
?>
		<div class="col-md-3">
			<a class="fancybox" href="<?php echo base_url()?>assets/media/galeries/<?php echo $key->gambar; ?>" title="<?php echo $key->judul; ?>">
				<img src="<?php echo base_url()?>assets/media/galeries/<?php echo $key->gambar; ?>" width="100%" class="thumbnail" >
				<p align="center"> <?php echo $key->judul; ?></p>
			</a>
		</div>
<?php
		if($no==4) echo"</div><div class='row'>";
		$no++;
	}
?>
		</div>
	</div>