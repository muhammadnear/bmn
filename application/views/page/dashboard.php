<?php
//	session_start();
	
//	include("lib/koneksi.php");
//	include("lib/fungsi_tglindonesia.php");
//	define("INDEX",true);
?>

<html>
	<head>
		<title>Direktorat Imigrasi</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
		<link rel="shortcut icon" href="<?php echo base_url()?>assets/imigrasi/logo-imigrasi.png">
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-2.0.2.min.js"></script>
		<style type="text/css">
			#footer
			{
				background: -moz-linear-gradient(45deg, rgba(34,34,34,1) 0%, rgba(34,34,34,1) 1%, rgba(66,66,66,1) 50%, rgba(34,34,34,1) 100%); /* ff3.6+ */
				background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(34,34,34,1)), color-stop(1%, rgba(34,34,34,1)), color-stop(50%, rgba(66,66,66,1)), color-stop(100%, rgba(34,34,34,1))); /* safari4+,chrome */
				background: -webkit-linear-gradient(45deg, rgba(34,34,34,1) 0%, rgba(34,34,34,1) 1%, rgba(66,66,66,1) 50%, rgba(34,34,34,1) 100%); /* safari5.1+,chrome10+ */
				background: -o-linear-gradient(45deg, rgba(34,34,34,1) 0%, rgba(34,34,34,1) 1%, rgba(66,66,66,1) 50%, rgba(34,34,34,1) 100%); /* opera 11.10+ */
				background: -ms-linear-gradient(45deg, rgba(34,34,34,1) 0%, rgba(34,34,34,1) 1%, rgba(66,66,66,1) 50%, rgba(34,34,34,1) 100%); /* ie10+ */
				background: linear-gradient(45deg, rgba(34,34,34,1) 0%, rgba(34,34,34,1) 1%, rgba(66,66,66,1) 50%, rgba(34,34,34,1) 100%); /* w3c */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#222222', endColorstr='#222222',GradientType=1 ); /* ie6-9 */
			}
		</style>
	</head>
	<body>
		<header id="header" style="background-color: #00345c;"> 
				<div class="row">
					<div class="col-md-10" style="margin-left: 6%;"><img src="<?php echo base_url()?>assets/media/images/banner_2.png" width="100%"></div>
					<div class="col-md-3" style="color: white; font-size: 12px; position: absolute; right: 20px;">
						Jl. H. R. Rasuna Said Kav.X-6 Nomor 8 <br>
						Kuningan, Jakarta Selatan<br>
						Call Center : (021) 52920481<br>
						Telefax : -<br>
						SMS Center : -<br>
						Email : pengelolaanbmn.ditjenim@gmail.com
					</div>
				</div>
		</header>			
			
		<nav id="menu"> 	
			<div class="row">
				<div class="col-md-12">
					<div class="navbar navbar-inverse">
						<div class="header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
								<div class="icon-bar"></div>
								<div class="icon-bar"></div>
								<div class="icon-bar"></div>
							</button>
						</div>
						<div class="container">
							<div id="navbar" class="collapse navbar-collapse">
								<ul class="nav navbar-nav">
									<?php 
										foreach ($menu as $key => $value) 
										{ 
											if(empty($value->submenu))
											{ ?>
												<li <?php if($header_lighting == $value->id_menu) echo "class='active'"; ?> ><a href="<?php echo base_url()?>index.php/<?php echo $value->link ?>/<?php echo $value->id_menu ?>"> <?php echo $value->judul; ?> </a></li>
										<?php 
											}
											else
											{ ?>
												<li class="dropdown <?php if($header_lighting == $value->id_menu) echo 'active'; ?> "> 
													<a href="<?php echo base_url()?>index.php/<?php echo $value->link; ?>" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $value->judul; ?> <span class="caret"></span></a>
													<ul class="dropdown-menu">
											<?php
												foreach ($value->submenu as $key2 => $value2) 
												{ ?>
													<li><a href="<?php echo base_url()?>index.php/<?php echo $value2->link; ?>"> <?php echo $value2->judul; ?> </a></li>
												<?php
												} ?>
													</ul>
												</li>
										<?php
											}
										} ?> 
										
								</ul>
								<div class="navbar-nav pull-right">
									<form><input type="text" name="search" placeholder="Search..>"><img src=""></form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>			
			
		<content id="content">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class='box'>
							<?php 
								$kirim['artikel'] = $artikel_konten_1;

								if(!empty($gallery))
									$kirim['gallery'] = $gallery;
								if(!empty($halaman))
									$kirim['halaman'] = $halaman;
								if(!empty($single_article))
									$kirim['single_article'] = $single_article[0];
								if(!empty($komentar))
									$kirim['komentar'] = $komentar;

								$this->load->view($konten, $kirim); 
							?> 
						</div>
					</div>
					<div class="col-md-4"> 
						<script src="<?php echo base_url()?>assets/plugin/coolclock/coolclock.js" type="text/javascript"></script>
						<script src="<?php echo base_url()?>assets/plugin/coolclock/moreskins.js" type="text/javascript"></script>

						<ul class="nav nav-tabs">
							<li class="active"><a href="#konten1" data-toggle="tab">Terbaru</a></li>
							<li><a href="#konten2" data-toggle="tab">Popular</a></li>
							<li><a href="#konten3" data-toggle="tab">Komentar</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="konten1">
								<ul>
									<?php
										foreach ($artikel_konten_1 as $key => $value) 
										{ 
											echo "<li><img src='".base_url()."assets/media/articles/".$value->gambar."'><a href='".base_url()."index.php/page/index/artikel_detail'>".$value->judul."</a></li>";// &id=$data[id_artikel]
										}
									?>
								</ul>
							</div>
							<div class="tab-pane fade" id="konten2">
								<ul>
									<?php
										foreach ($artikel_konten_2 as $key => $value) 
										{
											echo "<li><img src='".base_url()."assets/media/articles/".$value->gambar."'><a href='".base_url()."index.php/page/index/artikel_detail'>".$value->judul."</a></li>";// &id=$data[id_artikel]
										}
									?>
								</ul>
							</div>
							<div class="tab-pane fade" id="konten3">
								<ul>
									<?php
										foreach ($artikel_konten_3 as $key => $value) 
										{
											echo "<li><b>".$value->nama.": </b> <a href='".base_url()."index.php/page/index/artikel_detail'>".$value->komentar."</a></li>"; //&id=$data[id_artikel]
										}
									?>
								</ul>
							</div>
						</div>
						
						<video src="<?php echo base_url()?>assets/media/videos/imigrasi.mp4" width="100%" controls></video>
						
					</div>	
				</div>
			</div>
		</content>
			
		<footer id="footer"> 
			<div class="container">
				<div class="row">
					<div class="col-md-12"> <p align="center" style="color: white;">Copyright &copy; Pengelolahan BMN dan Layanan Pengadaan </p> </div>
				</div>
			</div>
		</footer>
		
		
		<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
