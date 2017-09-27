<?php
	$isi = $single_article->isi;
?>
	<ul class="breadcrumb">
		<li>Home</li>
		<li class="active">Artikel detail</li>
	</ul>
	
	<div class="artikel">
		<h2 class="judul"><?php echo $single_article->judul; ?></h2>
		<p>			
			<?php if(!empty($single_article->gambar)) ?> <img src="<?php echo base_url()?>assets/media/articles/<?php echo $single_article->gambar; ?>" class="thumbnail" width="100%">
				
			<?php echo $isi; ?> 
		</p>
	</div>

	<h3><?php echo sizeof($komentar); ?> Komentar </h3>
	<hr>
<?php
	foreach ($komentar as $key) 
	{		
?>
	<div class="komentar">
		<h5><b><?php echo $key->nama; ?> - <?php echo $key->tgl_indonesia; ?></b></h5> 
		<p><?php echo $key->komentar; ?></p>
	</div>
	<hr>
<?php
	}
?>

<h3>Isi Komentar</h3>
<?php
	if(!empty($sukses))
	{
		echo "<center><p class='bg-success' style='padding:15px;'>$sukses</p></center>";
	}
?>
<form method="post" action="<?php echo base_url()?>index.php/page/submit_komentar" id="formkomentar" class="form-horizontal well">
	<input type="hidden" name="id" value="<?php echo $single_article->id_artikel; ?>">
	<div class="form-group">
		<label for="nama" class="control-label col-md-2">Nama</label>
		<div class="col-md-10">
			<input type="text" name="nama" id="nama" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="control-label col-md-2">Email</label>
		<div class="col-md-10">
			<input type="text" name="email" id="email" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="komentar" class="control-label col-md-2">Komentar</label>
		<div class="col-md-10">
			<textarea name="komentar" id="komentar" rows="8" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
			<input type="submit" value="Kirim Pesan" class="btn btn-primary">
		</div>
	</div>
</form>