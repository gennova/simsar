<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Jenis extends MY_Controller {

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
		$crud->set_table('tbljenis');
		$crud->set_subject('Jenis Barang');
		
		/**Merubah Label Judul Field di tabel*/
        $crud->display_as('kdkategori','Kategori Induk');
		$crud->display_as('kdsubkategori','Sub Kategori');
		$crud->display_as('namajenis','Jenis Barang');
		
		$crud->set_relation('kdkategori','tblkategori','namakategori');		
		$crud->set_relation('kdsubkategori','tblsubkategori','namasubkategori');
		
		$crud->unique_fields(array('namajenis'));
		$crud->required_fields('namajenis');
		
		$this->load->library('gc_dependent_select');
		
		
		$fields = array(

			// field pertama:
			'kdkategori' => array( // nama dropdown pertama
			'table_name' => 'tblkategori', // tabelkategori
			'title' => 'namakategori', // nama kategori
			'relate' => null // dropdown pertama tidak punya relasi
			),
			
			// field kedua
			'kdsubkategori' => array( // nama dropdown kedua
			'table_name' => 'tblsubkategori', // tabel sub kategori
			'title' => 'namasubkategori', // judul subkategori
			'id_field' => 'kdsubkategori', // primary key tabel subkategori
			'relate' => 'kdkategori', // relasi ke tabel kategori:
			'data-placeholder' => 'Pilih sub kategori' //placeholder:
			),
			);

			$config = array(
			'main_table' => 'tbljenis',
			'main_table_primary' => 'idjenis',
			'url' => base_url() . 'admin/' . strtolower(__CLASS__) . '/' . strtolower(__FUNCTION__) . '/',
			);

			$categories = new gc_dependent_select($crud, $fields, $config);
			
			$js = $categories->get_js();
			$output = $crud->render();
			$output->output.= $js;
 
			$this->_example_output($output);        
	}
 
	function _example_output($output = null){
		$this->load->view('admin/master/vjenis',$output);	
	}
		
	}

	?>