<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Vlokasi extends MY_Controller {

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
		$crud->set_table('vlokasi');
		$crud->set_primary_key('kdlokasi');
		$crud->unset_operations();
		
		$crud->display_as('kdlokasi','Kode Lokasi');
		$crud->display_as('namalokasi','Nama Lokasi');
		
		$crud->add_action('Print', '', '','fa fa-print',array($this,'cetak'));
		$crud->add_action('Lihat', '', '','fa fa-search',array($this,'laporan'));
		
		$output = $crud->render();
		$this->_example_output($output);        
	}
	
	function _example_output($output = null){ 
		$this->load->view('admin/view/vlokasi',$output);
	}
	
	public function laporan($primary_key, $row)
	{
	    return site_url('admin/laporan/cetak').'?id='.$row->kdlokasi;
	}
	
	public function cetak($primary_key, $row)
	{
	    return site_url('admin/laporan/convertpdf').'?id='.$row->kdlokasi;
	}
		
	}

	?>