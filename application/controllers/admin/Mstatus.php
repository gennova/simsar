<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Mstatus extends MY_Controller {

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
		$crud->set_table('tblstatus');
		$crud->set_subject('Status Barang');
		
		/**Merubah Label Judul Field di tabel*/
        $crud->display_as('idstatus','ID_Status');
		$crud->display_as('namastatus','Nama Status');

		$output = $crud->render();
 
		$this->_example_output($output);        
	}
 
	function _example_output($output = null){ 
		$this->load->view('admin/master/vstatus',$output);
	}
		
	}

	?>