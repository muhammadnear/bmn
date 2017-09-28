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
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-2.0.2.min.js"></script>		
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
		<link rel="shortcut icon" href="<?php echo base_url()?>assets/imigrasi/logo-imigrasi.png">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css">


		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/page_slider/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/page_slider/css/jquery.jscrollpane.css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Coustard:900' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css' />


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

			body {background:#ecebe8 url(<?php echo base_url()?>assets/media/images/pattern.png) repeat;}
		</style>
	</head>
	<body>
		<header id="header" style="background-color: #00345c;"> 
				<div class="row">
					<div class="col-md-10" style="margin-left: 6%;"><img src="<?php echo base_url()?>assets/media/images/banner_2.png" width="90%"></div>
					<div class="col-md-3" style="color: white; font-size: 12px; position: absolute; right: -40px;">
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
								<div class="col-sm-3 col-md-3 pull-right">
									<form class="navbar-form" role="search">
										<div class="input-group">
											<input class="form-control" type="text" name="search" placeholder="Search..." />
											<div class="input-group-btn" >
												<button style="height: 34px;" class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</form>
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
								if(!empty($sliders))
									$kirim['sliders'] = $sliders;

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
											echo "<li><img src='".base_url()."assets/media/articles/".$value->gambar."'><a href='".base_url()."index.php/page/tampil/artikel_detail?id=$value->id_artikel>'>".$value->judul."</a></li>";// &id=$data[id_artikel]
										}
									?>
								</ul>
							</div>
							<div class="tab-pane fade" id="konten2">
								<ul>
									<?php
										foreach ($artikel_konten_2 as $key => $value) 
										{
											echo "<li><img src='".base_url()."assets/media/articles/".$value->gambar."'><a href='".base_url()."index.php/page/tampil/artikel_detail?id=$value->id_artikel'>".$value->judul."</a></li>";// &id=$data[id_artikel]
										}
									?>
								</ul>
							</div>
							<div class="tab-pane fade" id="konten3">
								<ul>
									<?php
										foreach ($artikel_konten_3 as $key => $value) 
										{
											echo "<li><b>".$value->nama.": </b> <a href='".base_url()."index.php/page/tampil/artikel_detail?id=$value->id_artikel'>".$value->komentar."</a></li>"; //&id=$data[id_artikel]
										}
									?>
								</ul>
							</div>
						</div>
						
						<video src="<?php echo base_url()?>assets/media/videos/imigrasi.mp4" width="100%" controls></video>
						
					</div>

				</div>
				<?php if($konten == "page/content/home") { ?>
				<div class="row">
					<div id="ca-container" class="ca-container">
		                <div class="ca-wrapper">
		                	<?php	
								foreach ($semua_artikel as $data) 
								{
									$isi_1 = substr($data->isi,0,100);
									$isi_1 = substr($data->isi,0,strrpos($isi_1," "));

									$isi = substr($data->isi,0,500);
									$isi = substr($data->isi,0,strrpos($isi," "));

							?>
		                    <div class="ca-item">
		                        <div class="ca-item-main">
		                            <div class="ca-icon" <?php if($data->gambar!="") { ?> style="background-image:url(<?php echo base_url()?>assets/media/articles/<?php echo $data->gambar; ?>);" <?php } ?>></div>
		                            <h3><?php echo $data->judul; ?></h3>
		                            <h4>
		                                <span class="ca-quote">&ldquo;</span>
		                                <span><?php echo $isi_1; ?> ...</span>
		                            </h4>
		                                <a href="#" class="ca-more">selengkapnya...</a>
		                        </div>
		                        <div class="ca-content-wrapper">
		                            <div class="ca-content">
		                                <h6><?php echo $data->judul; ?></h6>
		                                <a href="#" class="ca-close">tutup</a>
		                                <div class="ca-content-text">
		                                    <?php echo $isi; ?>
		                                </div>
		                                <ul>
		                                    <li><a href="<?php echo base_url()?>index.php/page/tampil/artikel_detail?id=<?php echo $data->id_artikel;?>">Buka di Laman Utama</a></li>
		                                </ul>
		                            </div>
		                        </div>
		                    </div>
		                    <?php } ?>
		                </div>
		            </div>
				</div>
				<?php } ?>
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
		<script type="text/javascript" src="<?php echo base_url()?>assets/page_slider/js/jquery.easing.1.3.js"></script>
        <!-- the jScrollPane script -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/page_slider/js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/page_slider/js/jquery.contentcarousel.js"></script>
        <script type="text/javascript">
            $('#ca-container').contentcarousel();
        </script>
	</body>
</html>
