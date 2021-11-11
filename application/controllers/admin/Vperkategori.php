<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Vperkategori extends MY_Controller {

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
		$crud->set_table('vperkategori');
		$crud->set_primary_key('kdkategori');
		$crud->unset_operations();
		
		$crud->display_as('kdkategori','Kode Kategori');
		$crud->display_as('namakategori','Nama Kategori');
		
		$crud->add_action('Print', '', '','fa fa-print',array($this,'cetak'));
		$crud->add_action('Lihat', '', '','fa fa-search',array($this,'laporan'));
		
		$output = $crud->render();
		$this->_example_output($output);        
	}
	
	function _example_output($output = null){ 
		$this->load->view('admin/view/vperkategori',$output);
	}
	
	public function laporan($primary_key, $row)
	{
	    return site_url('admin/laporan/cetakperkategori').'?id='.$row->kdkategori;
	}
	
	public function cetak($primary_key, $row)
	{
	    return site_url('admin/laporan/convertpdfperkategori').'?id='.$row->kdkategori;
	}
		
	}

	?>