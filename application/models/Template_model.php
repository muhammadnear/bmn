<?php
	class Template_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		//CREATE
		function Insert($data)
		{
			$this->db->insert("table",$data);
			return $this->db->insert_id();
		}
		//READ
		function Get()
		{
			$value = $this->db->get('table')->result();
			return $value;
		}
		//UPDATE
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