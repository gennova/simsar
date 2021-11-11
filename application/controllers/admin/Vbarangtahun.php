<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Vbarangtahun extends MY_Controller {

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
		$crud->set_table('vbarangtahun');
		$crud->set_primary_key('tahun');
		$crud->unset_operations();
		
		/**Merubah Label Judul Field di tabel*/		;
		$crud->display_as('tahun','Tahun Perolehan');
		
		$crud->add_action('Print', '', '','fa fa-print',array($this,'cetak'));
		$crud->add_action('Lihat', '', '','fa fa-search',array($this,'laporan'));
		
		$output = $crud->render();
		$this->_example_output($output);        
	}
	
	function _example_output($output = null){ 
		$this->load->view('admin/view/vbarangtahun',$output);
	}
	
	public function laporan($primary_key, $row)
	{
	    return site_url('admin/laporan/cetakperolehan').'?id='.$row->tahun;
	}
	
	public function cetak($primary_key, $row)
	{
	    return site_url('admin/laporan/convertpdfperolehan').'?id='.$row->tahun;
	}	
		
	}

	?>