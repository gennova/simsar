<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Msumberdana extends MY_Controller {

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
		$crud->set_table('tblsumberdana');
		$crud->set_subject('Sumber Dana');
		
		/**Merubah Label Judul Field di tabel*/
        $crud->display_as('kdsumberdana','Kode Sumber Dana');
		$crud->display_as('nmsumberdana','Nama Sumber Dana');
		
		
		$crud->unique_fields(array('kdsumberdana'));
		$crud->required_fields(array('kdsumberdana','nmsumberdana'));		
		
		$output = $crud->render();
		$this->_example_output($output);        
	}
 
	function _example_output($output = null){
		$this->load->view('admin/master/vsumberdana',$output);	
	}
		
	}

	?>