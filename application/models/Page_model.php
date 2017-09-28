<?php
	class Page_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		//CREATE
		function insert_kontak($data)
		{
			$this->db->insert("pesan",$data);
			return $this->db->insert_id();
		}
		function insert_komentar($data)
		{
			$this->db->insert("komentar",$data);
			return $this->db->insert_id();
		}
		//READ
		function get_menu()
		{
			$value = $this->db->get('menu')->result();
			return $value;
		}
		function get_slider()
		{
			$value = $this->db->get('slider')->result();
			return $value;
		}
		function get_submenu_byIdmenu($id_menu)
		{
			$this->db->where('id_menu',$id_menu);
			$value = $this->db->get('submenu')->result();
			return $value;
		}
		function get_halaman_byId($id)
		{
			$this->db->where('id_halaman',$id);
			$value = $this->db->get('halaman')->result();
			return $value;
		}
		function get_artikel_byId($id)
		{
			$this->db->where('id_artikel',$id);
			$value = $this->db->get('artikel')->result();
			return $value;
		}
		function get_komentar_byIdArtikel($id)
		{
			$this->db->where('id_artikel',$id);
			$value = $this->db->get('komentar')->result();
			return $value;
		}
		function get_all_article()
		{
			$value = $this->db->get('artikel')->result();
			return $value;
		}
		function get_article_byId()
		{
			$value = $this->db->query("select * from artikel order by id_artikel desc limit 5")->result();
			return $value;
		}
		function get_article_byHits()
		{
			$value = $this->db->query("select * from artikel order by hits desc limit 5")->result();
			return $value;
		}
		function get_article_comment()
		{
			$value = $this->db->query("select * from komentar order by id_komentar desc limit 5")->result();
			return $value;
		}
		function get_gallery()
		{
			$value = $this->db->query("select * from galeri order by id_galeri desc limit 12")->result();
			return $value;
		}
		//UPDATE
		function update_click_article($id)
		{
			$this->db->where('id_artikel', $id);
			$this->db->set('hits', 'hits+1', FALSE);
			$this->db->update('artikel');
		}
		function Update($data, $id)
		{
			$this->db->where('id_pk', $id);
			$this->db->update('table', $data);
		}
		//DELETE
		function Delete($id)
		{
			$this->db->where('id_pk',$id);
			$this->db->delete('table');
		}
		
		function Custom_Query()
		{
			$value = $this->db->query("SELECT * from `table` where 1")->result();
			return $value;
		}
	}
?>