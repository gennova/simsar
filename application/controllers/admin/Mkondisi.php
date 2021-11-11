<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Mkondisi extends MY_Controller {

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
		//$crud->set_theme('tablestrap');
		$crud->set_table('tblkondisi');
		$crud->set_subject('Kondisi Barang');
		
		/**Merubah Label Judul Field di tabel*/
        $crud->display_as('idkondisi','ID_Kondisi');
		$crud->display_as('namakondisi','Nama Kondisi');

		$output = $crud->render();
 
		$this->_example_output($output);        
	}
 
	function _example_output($output = null){ 
		$this->load->view('admin/master/vkondisi',$output);
	}
		
	}

	?>