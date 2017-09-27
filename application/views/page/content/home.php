	<div id="mycarousel" class="carousel slide">
		<ol class="carousel-indicators">
			
	<?php
		$no=0;
		foreach ($artikel as $key)
		{
	?>
		<li data-target="#mycarousel" data-slide-to="<?php echo $no; ?>"
			<?php if($no == 0) echo ' class="active"'; ?>
		> </li>
	<?php
			$no++;
		}	
	?> 
	</ol>
	
	<div class="carousel-inner">
	<?php
		//$artikel = mysql_query("select * from artikel order by id_artikel desc limit 4");
		$no=0;
		foreach($artikel as $key)
		{
			$isi = substr($key->isi,0,300);
			$isi = substr($key->isi,0,strrpos($isi," "));			
	
		echo "<div class='item";
		if($no == 0) echo " active";
		echo "'>";
		echo "<img src='".base_url()."assets/media/articles/".$key->gambar."' width='100%'>";
		echo "</div>";
			$no++;
		}
	?>
	</div>
	
	<a class="left carousel-control" href="#mycarousel"  data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a class="right carousel-control" href="#mycarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div>
<?php	
	foreach ($artikel as $data) 
	{
		$isi = substr($data->isi,0,500);
		$isi = substr($data->isi,0,strrpos($isi," "));

?>
	<div class="artikel">
		<h3 class="judul"><?php echo $data->judul; ?></h3>
		<div class="row">
			<div class="col-md-4">
			<?php if($data->gambar!="") ?> <img src="<?php echo base_url()?>assets/media/articles/<?php echo $data->gambar; ?>" class="thumbnail" width="100%" height="150px">
			</div>
			<div class="col-md-8">
				<?php echo $isi; ?> ... 
				<a href="<?php echo base_url()?>index.php/page/tampil/artikel_detail?id=<?php echo $data->id_artikel; ?>" class="btn btn-primary btn-xs">Selengkapnya</a>
			</div>
		</div>
	</div>
<?php }
?>