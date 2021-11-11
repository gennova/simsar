<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function insert_batch($data) {
		$this->db->insert_batch('tblbarang', $data);
		
		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('kdbarang', $kode);
		$data = $this->db->get('tblbarang');

		return $data->num_rows();
	}


}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */