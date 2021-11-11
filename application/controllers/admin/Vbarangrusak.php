<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Vbarangrusak extends MY_Controller {
	
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
		$crud->set_table('vbarangrusak');
		$crud->where('vbarangrusak.unit',$unit);
		$crud->set_primary_key('idbarang');
		//$crud->unset_operations();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		
		$crud->display_as('idbarang','ID_Barang');
		$crud->display_as('namajenis','Jenis Barang');
		$crud->display_as('kdbarang','Kode Barang');
		$crud->display_as('namabarang','Nama Barang');
		$crud->display_as('namalokasi','Lokasi');
		$crud->display_as('namakondisi','Kondisi');
		
		$crud->add_action('UPDATE','','','fa fa-edit',array($this,'panggilperbaikan'));
		
		$output = $crud->render();
		$this->_example_output($output);        
	}
	
	function panggilperbaikan($primary_key,$row)
	{
		return site_url('admin/barang/index/edit/').''.$row->idbarang;
	}
	
	function _example_output($output = null){ 
		$this->load->view('admin/view/vbarangrusak',$output);
	}
		
	}

	?>