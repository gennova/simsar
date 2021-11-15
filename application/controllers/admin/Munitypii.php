<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Munitypii extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		//$this->load->library('datatable');
		$this->load->library('grocery_CRUD');
		$this->rbac->check_module_access();
	}
		

	public function index()
	{		
		$crud = new grocery_CRUD();
		//$crud->set_theme('bootstrap');
		$crud->set_table('unitypii');
		$crud->set_subject('Unit Sekolah / Cabang YPII');
		
		/**Menampilkan Kolom pada Grid View*/
		$crud->columns('unitcode','unitname','kota','sarpras','pimpinan');	
		/**Merubah Label Judul Field di tabel*/
        $crud->display_as('id','ID_Unit');
		$crud->display_as('unitcode','Kode Unit');
		$crud->display_as('unitname','Nama Unit');
		$crud->display_as('address','Alamat');
		$crud->display_as('kota','Kota');
		$crud->display_as('website','Website');
		$crud->display_as('email','Email');
		$crud->display_as('phone','Telepon');
		$crud->display_as('sarpras','Petugas Sarpras');
		$crud->display_as('pimpinan','Penanggung Jawab');

		$output = $crud->render();
 
		$this->_example_output($output);        
	}

	function _example_output($output = null){ 
		$this->load->view('admin/master/vunitypii',$output);
	}
		
	}

	?>