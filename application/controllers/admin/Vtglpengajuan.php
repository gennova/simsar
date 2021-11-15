<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Vtglpengajuan extends MY_Controller {

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
		$unit = $this->session->userdata('admin_unit');
		$crud = new grocery_CRUD();
		//$crud->set_theme('tablestrap');
		$crud->set_table('vtglpengajuan');
		$crud->where('unit',$unit);
		$crud->set_primary_key('tglpengajuan');
		$crud->unset_operations();
		
		$crud->display_as('tglpengajuan','Tanggal Pengajuan');
		
		$crud->change_field_type('tglpengajuan',date('Y-m-d'));
		
		$crud->add_action('Print', '', '','fa fa-print',array($this,'cetak'));
		$crud->add_action('Lihat', '', '','fa fa-search',array($this,'laporan'));	
			
		
		
		//$crud->where('kdlokasi','R-021');
		$output = $crud->render();
		$this->_example_output($output);        
	}
	
	function _example_output($output = null){ 
		$this->load->view('admin/view/vtglpengajuan',$output);
	}
	
	public function laporan($primary_key, $row)
	{
	    return site_url('admin/laporan/cetaktglpengajuan').'?id='.$row->tglpengajuan;
	}
	
	public function cetak($primary_key, $row)
	{
	    return site_url('admin/laporan/convertpdftglpengajuan').'?id='.$row->tglpengajuan;
	}
	

	}

	?>