<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Subkategori extends MY_Controller {

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
		$crud->set_table('tblsubkategori');
		$crud->set_subject('Sub Kategori');
		
		/**Merubah Label Judul Field di tabel*/
		$crud->display_as('kdkategori','Kode Kategori');
        $crud->display_as('kdsubkategori','Kode SubKategori');
		$crud->display_as('namasubkategori','Nama Sub Kategori');
		$crud->display_as('ket','Keterangan');

		$crud->set_relation('kdkategori','tblkategori','namakategori');
		$crud->columns('kdkategori','kdsubkategori','namasubkategori','ket');
		
		//$crud->callback_add_field('kdsubkategori', function () {
		//	return '<input type="text" maxlength="2" value="" name ="kdprefixsub" placeholder="Masukkan Dua Digit Kode Prefix">';
		//});
		
		//$crud->callback_add_field('namasubkategori', function () {
		//	return '<input type="text" maxlength="50" value="" name="namasubkategori" placeholder="Nama Kategori">';
		//});
	
		/**Data tidak boleh sama dengan yang sudah ada*/
		$crud->required_fields(array('kdkategori','kdsubkategori'));	
		//$crud->unique_fields(array('kdsubkategori'));		
		
		$output = $crud->render();
 
		$this->_example_output($output);        
	}
 
	function _example_output($output = null){ 
		$this->load->view('admin/master/vsubkategori',$output);
	}
		
	}

	?>