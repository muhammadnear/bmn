<?php
	$isi = $halaman[0]->isi;
?>
<ul class="breadcrumb">
	<li>Home</li>
	<li class="active"><?php echo $halaman[0]->judul; ?></li>
</ul>

	<div class="halaman">
		<h2 class="judul"><?php echo $halaman[0]->judul; ?></h2>
		<p>							
			<?php echo $isi; ?> 
		</p>
	</div>