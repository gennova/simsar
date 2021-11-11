<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Vbaranglokasi extends MY_Controller {

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
		$crud->set_table('vbaranglokasi');
		$crud->set_primary_key('idjenis');
		$crud->unset_operations();
		
		//$crud->where('kdlokasi','R-021');
		$output = $crud->render();
		$this->_example_output($output);        
	}
	
	function _example_output($output = null){ 
		$this->load->view('admin/view/vbaranglokasi',$output);
	}
	
	}

	?>