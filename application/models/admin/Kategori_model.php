<?php
	class Kategori_model extends CI_Model{

		public function add_kategori($data){
			$this->db->insert('tblkategori', $data);
			return true;
		}

		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_kategori(){
			$wh =array();
			$SQL ='SELECT * FROM tblkategori';
			$wh[] = "";
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}


		//---------------------------------------------------
		// Get user detial by ID
		public function get_kategori_by_id($id){
			$query = $this->db->get_where('tblkategori', array('idkategori' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Edit user Record
		public function edit_kategori($data, $id){
			$this->db->where('idkategori', $id);
			$this->db->update('tblkategori', $data);
			return true;
		}

	}

?>