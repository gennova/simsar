<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Vbarangyys extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		//$this->load->library('datatable');
		$this->load->library('grocery_CRUD');
		$this->rbac->check_module_access();
		$this->load->model('admin/Admin_model', 'admin');
	}
		

	public function index()
	{		
		$crud = new grocery_CRUD();
		//$crud->set_theme('tablestrap');
		$crud->set_table('vbarangyys');
		$unit = $this->session->userdata('admin_unit');
		$crud->where('unit',$unit);
		$crud->set_primary_key('idbarang');
		//$crud->unset_operations();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		
		/**Menampilkan Kolom pada Grid View*/
		$crud->columns('kdbarang','namabarang','namajenis','namalokasi','thnmasuk','harga','namakondisi','kdsumberdana');	
		
		/**Merubah Label Judul Field di tabel*/		;
		$crud->display_as('kdbarang','Kode Barang');
		$crud->display_as('namabarang','Nama Barang');
		$crud->display_as('namajenis','Jenis');
		$crud->display_as('namalokasi','Lokasi');
		$crud->display_as('thnmasuk','Tahun');
		$crud->display_as('harga','Harga');
		$crud->display_as('namakondisi','Kondisi');
		$crud->display_as('kdsumberdana','Sumber Dana');
		
		$output = $crud->render();
		$this->_example_output($output);        
	}
	
	function _example_output($output = null){ 
		$this->load->view('admin/view/vbarangyys',$output);
	}
		
	}

	?>