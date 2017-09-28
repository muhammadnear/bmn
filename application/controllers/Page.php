<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		$this->load->model('Page_model');
	}

	function tgl_indonesia($tgl){
		$tanggal = substr($tgl,8,2);
		$nama_bulan = array("Januari", "Februari", "Maret", "April", "Mei", 
                "Juni", "Juli", "Agustus", "September", 
                "Oktober", "November", "Desember");
		$bulan = $nama_bulan[substr($tgl,5,2) - 1];
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function header_lighting($id)
	{
		$menu = $this->Page_model->get_menu();
		//echo var_dump($id);
		foreach ($menu as $key) 
		{
			$idmn = explode('=', $key->link);
			
			if(!empty($idmn[1]))
			{
				$temp = explode('/', $idmn[1]);
				if($id == $temp[0])
					return $key->id_menu;
			}
			$submenu = $this->Page_model->get_submenu_byIdmenu($key->id_menu);
			foreach ($submenu as $key2) 
			{
				$idmn = explode('=', $key2->link);
				if(!empty($idmn[1]))
				if($id == $idmn[1])
					return $key->id_menu;
			}
		}
	}

	function cmp($a, $b)
	{
	    return strcmp($a->urutan, $b->urutan);
	}

	public function index()
	{
		$this->tampil();
	}

	public function tampil($tampil = 'home', $id_menu = 53)/*diambil dari default id home di database*/
	{
		/*$kirim['nama_files'] = array();*/
		$flag = 0;
		if ($handle = opendir('./application/views/page/content')) {
		    while (false !== ($entry = readdir($handle))) {
		        if ($entry != "." && $entry != "..") {
		           $temp = explode('.', $entry);
		           if($temp[0] == $tampil)
		           	$flag = 1;
		        }
		    }
		    closedir($handle);
		}
		
		$kirim['konten'] = "page/content/".$tampil;
		if($flag == 0)
			$kirim['konten'] = "page/content/not_found";

		$menu = $this->Page_model->get_menu();
		
		usort($menu, array($this,"cmp"));
		
		$kirim['menu'] = $menu;
		$kirim['header_lighting'] = $id_menu;

		foreach ($menu as $key => $value) 
		{
			$submenu = $this->Page_model->get_submenu_byIdmenu($value->id_menu);
			usort($submenu, array($this,"cmp"));
			$kirim['menu'][$key]->submenu = $submenu;
		}
	
		$kirim['artikel_konten_1'] = $this->Page_model->get_article_byId();
		$kirim['artikel_konten_2'] = $this->Page_model->get_article_byHits();
		$kirim['artikel_konten_3'] = $this->Page_model->get_article_comment();
		$kirim['semua_artikel'] = $this->Page_model->get_all_article();
		$kirim['sliders'] = $this->Page_model->get_slider();

		if($tampil == 'galeri')
			$kirim['gallery'] = $this->Page_model->get_gallery();
		
		if($tampil == 'halaman')
		{
			$kirim['halaman'] = $this->Page_model->get_halaman_byId($this->input->get('id'));
			$kirim['header_lighting'] = $this->header_lighting($this->input->get('id'));
		}

		if($tampil == 'artikel_detail')
		{
			$this->Page_model->update_click_article($this->input->get('id'));
			$kirim['single_article'] = $this->Page_model->get_artikel_byId($this->input->get('id'));
			if(empty($kirim['single_article']))
				$kirim['konten'] = "not_found";
			//echo var_dump($kirim['single_article']);
			$komentar = $this->Page_model->get_komentar_byIdArtikel($this->input->get('id'));
			foreach ($komentar as $key => $value) 
			{
				$komentar[$key]->tgl_indonesia = $this->tgl_indonesia($value->tanggal);
			}
			$kirim['komentar'] = $komentar;
		}
		
		//echo var_dump($kirim['menu']);
		$this->load->view('page/dashboard',$kirim);
	}

	public function submit_kontak()
	{
		$data = array(
			'nama'	=> $_POST['nama'],
			'email'	=> $_POST['email'],
			'pesan'	=> $_POST['pesan'],
			'tanggal' => date('Y-m-d')
		);
		
		/*$subjek	= "Pesan dari pengunjung website";
		$dari	= "pemilik.website@gmail.com";
		$tgl	= date('Ymd');
		
		mail($email,$subjek,$pesan,$dari);*/

		if($this->Page_model->insert_kontak($data))
			$kirim['sukses'] = "Pesan berhasil tersimpan.";

		$kirim['konten'] = "page/content/kontak";

		$menu = $this->Page_model->get_menu();
		
		usort($menu, array($this,"cmp"));
		
		$kirim['menu'] = $menu;
		
		foreach ($menu as $key => $value) 
		{
			$submenu = $this->Page_model->get_submenu_byIdmenu($value->id_menu);
			usort($submenu, array($this,"cmp"));
			$kirim['menu'][$key]->submenu = $submenu;
		}
	
		$kirim['artikel_konten_1'] = $this->Page_model->get_article_byId();
		$kirim['artikel_konten_2'] = $this->Page_model->get_article_byHits();
		$kirim['artikel_konten_3'] = $this->Page_model->get_article_comment();
		$this->load->view('page/dashboard',$kirim);
	}

	public function edit()
	{
		
	}

	public function submit_komentar()
	{
		$tgl	= date('Y-m-d');
		
		$data = array(
			'id_artikel'=> $_POST['id'],
			'nama'=>$_POST['nama'], 
			'email'=>$_POST['email'], 
			'komentar'=>$_POST['komentar'], 
			'tanggal'=>$tgl
		);
				
		if($this->Page_model->insert_komentar($data))
			$kirim['sukses'] = "Komentar Berhasil Disimpan.";
		
		$kirim['konten'] = "page/content/artikel_detail";

		$menu = $this->Page_model->get_menu();
		
		usort($menu, array($this,"cmp"));
		
		$kirim['menu'] = $menu;
		
		foreach ($menu as $key => $value) 
		{
			$submenu = $this->Page_model->get_submenu_byIdmenu($value->id_menu);
			usort($submenu, array($this,"cmp"));
			$kirim['menu'][$key]->submenu = $submenu;
		}
	
		$kirim['artikel_konten_1'] = $this->Page_model->get_article_byId();
		$kirim['artikel_konten_2'] = $this->Page_model->get_article_byHits();
		$kirim['artikel_konten_3'] = $this->Page_model->get_article_comment();

		$kirim['single_article'] = $this->Page_model->get_artikel_byId($_POST['id']);
		if(empty($kirim['single_article']))
			$kirim['konten'] = "not_found";
		//echo var_dump($kirim['single_article']);
		$komentar = $this->Page_model->get_komentar_byIdArtikel($_POST['id']);
		foreach ($komentar as $key => $value) 
		{
			$komentar[$key]->tgl_indonesia = $this->tgl_indonesia($value->tanggal);
		}
		$kirim['komentar'] = $komentar;
		$this->load->view('page/dashboard',$kirim);
	}

	public function trying()
	{
		$this->load->view('page/slider_page');
	}

	public function submit_delete()
	{
		
	}
}	
