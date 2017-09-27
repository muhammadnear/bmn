	<script src="<?php echo base_url()?>assets/plugin/coolclock/coolclock.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/plugin/coolclock/moreskins.js" type="text/javascript"></script>
<?php
	//if(!defined("INDEX")) die("---");
?>	
		
	<ul class="nav nav-tabs">
		<li class="active"><a href="#konten1" data-toggle="tab">Terbaru</a></li>
		<li><a href="#konten2" data-toggle="tab">Popular</a></li>
		<li><a href="#konten3" data-toggle="tab">Komentar</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade in active" id="konten1">
			<ul>
				<?php	
					$artikel = mysql_query("select * from artikel order by id_artikel desc limit 5");
					while($data=mysql_fetch_array($artikel)){
						echo "<li><img src='gambar/artikel/$data[gambar]'><a href='?tampil=artikel_detail&id=$data[id_artikel]'>$data[judul]</a></li>";
					}
				?>
			</ul>
		</div>
		<div class="tab-pane fade" id="konten2">
			<ul>
				<?php	
					$artikel = mysql_query("select * from artikel order by hits desc limit 5");
					while($data=mysql_fetch_array($artikel)){
						echo "<li><img src='gambar/artikel/$data[gambar]'><a href='?tampil=artikel_detail&id=$data[id_artikel]'>$data[judul]</a></li>";
					}
				?>
			</ul>
		</div>
		<div class="tab-pane fade" id="konten3">
			<ul>
				<?php	
					$komentar = mysql_query("select * from komentar order by id_komentar desc limit 5");
					while($data=mysql_fetch_array($komentar)){
						echo "<li><b>$data[nama]: </b> <a href='?tampil=artikel_detail&id=$data[id_artikel]'>$data[komentar]</a></li>";
					}
				?>
			</ul>
		</div>
	</div>
	
	<video src="<?php echo base_url()?>assets/media/videos/imigrasi.mp4" width="100%" controls></video>
	
