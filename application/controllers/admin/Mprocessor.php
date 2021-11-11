<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Mprocessor extends MY_Controller {

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
		$crud->set_table('tblprocessor');
		$crud->set_subject('Spek Processor');
		
		/**Merubah Label Judul Field di tabel*/
        $crud->display_as('idprocessor','ID');
		$crud->display_as('processor','Jenis Processor');
		
		$crud->required_fields('processor');
		$crud->unique_fields(array('processor'));
		
		$output = $crud->render();
 
		$this->_example_output($output);        
	}
 
	
	function _example_output($output = null){ 
		$this->load->view('admin/master/vprocessor',$output);
	}
		
	}

	?>