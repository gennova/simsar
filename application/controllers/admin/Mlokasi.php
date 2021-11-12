<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Mlokasi extends MY_Controller {

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
		$crud->set_table('tbllokasi');
		$crud->where('unit',$unit);
		$crud->set_subject('Lokasi Ruangan');
		
		/**Merubah Label Judul Field di tabel*/
        $crud->display_as('kdlokasi','Kode Lokasi');
		$crud->display_as('namalokasi','Nama Lokasi');
		$crud->display_as('luasruangan','Luas Ruangan');
		
		$crud->required_fields('namalokasi','unit');
		$crud->field_type('kdlokasi','invisible');
		$crud->unique_fields(array('namalokasi'));
		$crud->callback_add_field('unit',array($this,'add_field_callback_1'));
		$crud->callback_before_insert(array($this,'generate_kdlokasi'));
		
		$output = $crud->render();
 
		$this->_example_output($output);        
	}
	function add_field_callback_1()
	{
		$d=$this->session->userdata('admin_unit');;
		return '<input type="text" maxlength="50" value="'.$d.'" name="unit" style="width:462px">';
	}
 	function generate_kdlokasi($post_array)
	{
		    // Mengenerate Kode Lokasi		
            $kode_terakhir = $this->admin->getMax('tbllokasi', 'kdlokasi');
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            //$data['kdbarang'] = 'B' . $number;
			$post_array['kdlokasi']= 'R-' . $number;
			//$post_array['kdlokasi'] = ($number);
			//$this->db->insert('tblbarang', $post_array);
   
			return $post_array;
	}
	
	function _example_output($output = null){ 
		$this->load->view('admin/master/vlokasi',$output);
	}
		
	}

	?>