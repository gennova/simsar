<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Barangmeubel extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->rbac->check_module_access();
		$this->load->model('admin/Admin_model', 'admin');
	}
	
	public function index()
	{
		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
		$crud->set_table('tblbarang');
		$crud->set_subject('Data Barang');
		
		$crud->where('tblbarang.kdkategori','A');
		//$crud->set_clone();
		
		//$crud->unset_operations();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		
		/**Menampilkan Kolom pada Grid View*/
		$crud->columns('kdbarang','namabarang','idjenis','namaunit','kdlokasi','tglmasuk','idkondisi','kdsumberdana');	
		
		// ================================ Form tabs
		
		/**Merubah Label Judul Field di tabel*/		
		$crud->display_as('idjenis','Jenis Barang');
		$crud->display_as('namaunit','Unit');
		$crud->display_as('kdlokasi','Lokasi');
		$crud->display_as('kdbarang','Kode Barang');
		$crud->display_as('namabarang','Nama Barang');
		$crud->display_as('harga','Harga');
		$crud->display_as('tglmasuk','Tgl Masuk');
		$crud->display_as('invoice','No. Invoice');
		$crud->display_as('idkondisi','Kondisi');
		$crud->display_as('kdsumberdana','Sumber Dana');
		$crud->display_as('tipe','Tipe');
		$crud->display_as('serialnumber','Serial Number');
		
		$crud->set_relation('kdkategori','tblkategori','namakategori');					
		$crud->set_relation('kdsubkategori','tblsubkategori','namasubkategori');
		$crud->set_relation('idjenis','tbljenis','namajenis');
		$crud->set_relation('kdsumberdana','tblsumberdana','nmsumberdana');
		$crud->set_relation('kdlokasi','tbllokasi','namalokasi');
		$crud->set_relation('idkondisi','tblkondisi','namakondisi');
	
		$output = $crud->render(); 
		$this->_example_output($output);        
	}
 
	

			
	function _example_output($output = null){
		$this->load->view('admin/master/vbarangmeubel',$output);    
	}
		
	}

	?>