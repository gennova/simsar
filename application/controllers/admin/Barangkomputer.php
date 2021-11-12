<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Barangkomputer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->rbac->check_module_access();
		$this->load->model('admin/Admin_model', 'admin');
	}
	
	public function index()
	{
		$unit = $this->session->userdata('admin_unit');
		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
		//$where = "tblbarang.unit=$unit AND idjenis in ('46','47','131','237')";
		//$crud->where($where);
		$crud->where('tblbarang.unit',$unit);
		//$crud->where('idjenis IN('46')');
		//$crud->where('profileId IN('.implode(",",$ids).')',null,false);
		$crud->where('idjenis IN('.implode(",",['46','47','131','237']).')',null,false);
		//$crud->where('idjenis','47');
		//$crud->or_where('idjenis','131');
		//$crud->or_where('idjenis','237');

		$crud->set_table('tblbarang');
		$crud->set_subject('Data Spesifikasi Komputer');

		$crud->set_clone();

		/**Menampilkan Kolom pada Grid View*/
		$crud->columns('kdbarang','namabarang','motherboard','processor','tipedisk','sizedisk','tiperam','sizeram','namaos');	
		
		// ================================ Form tabs
		
		/**Merubah Label Judul Field di tabel*/		
		$crud->display_as('kdbarang','Kode Barang');
		$crud->display_as('namabarang','Nama Barang');
		$crud->display_as('motherboard','Motherboard');
		$crud->display_as('processor','Processor');
		$crud->display_as('tipedisk','Jenis HD');
		$crud->display_as('sizedisk','Size HD (GB)');
		$crud->display_as('tiperam','Jenis RAM');
		$crud->display_as('sizeram','Size RAM (GB)');
		$crud->display_as('namaos','Operating System');
		
		$crud->set_relation('motherboard','tblmotherboard','motherboard');
		$crud->set_relation('processor','tblprocessor','processor');
		$crud->set_relation('namaos','tblos','namaos');
		
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_read();
		$crud->edit_fields('kdbarang','motherboard','processor','tipedisk','sizedisk','tiperam','sizeram','namaos');		

		$crud->field_type('kdbarang', 'readonly');
		$crud->order_by('kdbarang','asc');		
			$output = $crud->render();
			$this->_example_output($output);        
	}
			
	function _example_output($output = null){
		$this->load->view('admin/master/vbarangkomputer',$output);    
	}
		
	}

	?>