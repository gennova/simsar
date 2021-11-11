<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Kategori extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->rbac->check_module_access();
	}
	
	public function index()
	{
		$crud = new grocery_CRUD();
		//$crud->set_theme('tablestrap');
		$crud->set_table('tblkategori');
		$crud->set_subject('Kategori Barang');
		
		/**Merubah Label Judul Field di tabel*/
        $crud->display_as('kdkategori','Kode Kategori');
		$crud->display_as('namakategori','Nama Kategori');
		
		
		$crud->unique_fields(array('kdkategori'));
		$crud->required_fields(array('kdkategori','namakategori'));		
		
		$output = $crud->render();
		$this->_example_output($output);        
	}
 
	function _example_output($output = null){
		$this->load->view('admin/master/vkategori',$output);	
	}
		
	}

	?>