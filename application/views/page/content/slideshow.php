<div id="mycarousel" class="carousel slide">
	
<?php
	if(!defined("INDEX")) die("---");	
?>
	<ol class="carousel-indicators">
	<?php
		$artikel = mysql_query("select * from artikel order by id_artikel desc limit 4");
		$no=0;
		while($data=mysql_fetch_array($artikel)){
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
		$artikel = mysql_query("select * from artikel order by id_artikel desc limit 4");
		$no=0;
		while($data=mysql_fetch_array($artikel)){
			$isi = substr($data['isi'],0,300);
			$isi = substr($data['isi'],0,strrpos($isi," "));
	?>
		<div class="item
		<?php if($no == 0) echo ' active'; ?>
		">
			<img src="gambar/artikel/<?php echo $data['gambar']; ?>" width="100%">	
		</div>
	<?php
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