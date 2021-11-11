<?php
	class Dashboard_model extends CI_Model{

		public function get_all_users(){
			return $this->db->count_all('ci_users');
		}
		public function get_active_users(){
			$this->db->where('is_active', 1);
			return $this->db->count_all_results('ci_users');
		}
		public function get_deactive_users(){
			$this->db->where('is_active', 0);
			return $this->db->count_all_results('ci_users');
		}
		public function get_all_barang($unit){
			$this->db->where('unit', $unit);
			return $this->db->count_all_results('tblbarang');
		}			
		public function get_all_meubel($unit){
			$this->db->where('unit', $unit);
			$this->db->where('kdkategori', 'A');
			return $this->db->count_all_results('tblbarang');
		}			
		public function get_all_elektronik($unit){
			$this->db->where('unit', $unit);
			$this->db->where('kdkategori', 'B');
			return $this->db->count_all_results('tblbarang');
		}				
		public function get_all_lain($unit){
			$this->db->where('unit', $unit);
			$this->db->where('kdkategori', 'C');
			return $this->db->count_all_results('tblbarang');
		}		
		public function get_all_alatmusik($unit){
			$this->db->where('unit', $unit);
			$this->db->where('kdkategori', 'D');
			return $this->db->count_all_results('tblbarang');
		}
		public function get_all_alatolahraga($unit){
			$this->db->where('unit', $unit);
			$this->db->where('kdkategori', 'E');
			return $this->db->count_all_results('tblbarang');
		}
		public function get_all_laboratorium($unit){
			$this->db->where('unit', $unit);
			$this->db->where('kdkategori', 'F');
			return $this->db->count_all_results('tblbarang');
		}
		public function get_all_teknopreneur($unit){
			$this->db->where('unit', $unit);
			$this->db->where('kdkategori', 'G');
			return $this->db->count_all_results('tblbarang');
		}		
		public function get_all_barangbos($unit){
			$this->db->where('unit', $unit);
			$this->db->where('kdsumberdana', 'BOS');
			return $this->db->count_all_results('tblbarang');
		}
		public function get_all_barangyys($unit){
			$this->db->where('unit', $unit);
			$this->db->where('kdsumberdana', 'YYS');
			return $this->db->count_all_results('tblbarang');
		}
		public function get_all_barangsum($unit){
			$this->db->where('unit', $unit);
			$this->db->where('kdsumberdana', 'SUM');
			return $this->db->count_all_results('tblbarang');
		}		
		public function get_all_barangpinjam($unit){
			$this->db->where('unit', $unit);
			$this->db->where('tglkembali');
			return $this->db->count_all_results('tblpeminjaman');
		}	
		public function get_all_barangrusak($unit){
			$this->db->where('unit', $unit);
			$this->db->where('idkondisi','2');
			return $this->db->count_all_results('tblbarang');
		}			
	}

?>
