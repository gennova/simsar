<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Peminjaman extends MY_Controller {

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
		$unit = $this->session->userdata('admin_unit');
		$crud = new grocery_CRUD();
		//$crud->set_theme('tablestrap');
		$crud->set_table('tblpeminjaman');
		$crud->where('unitid',$unit);
		$crud->set_subject('Peminjaman Barang');
		
		//$crud->set_clone();
		
		//$crud->callback_before_insert(array($this,'generate_nopinjam'));		
		/**Merubah Label Judul Field di tabel*/
		
		$crud->columns('tglpinjam','kdbarang','nmpeminjam','unitpeminjam','acara','tglkembali');
		
        $crud->display_as('nopinjam','No Peminjaman');
		$crud->display_as('tglpinjam','Tgl PInjam');
		$crud->display_as('kdbarang','Kode Barang');
		$crud->display_as('unit','Pemilik Barang');
		$crud->display_as('nmpeminjam','PIC Peminjam');
		$crud->display_as('unitpeminjam','Unit peminjam');
		$crud->display_as('acara','Untuk Acara');
		$crud->display_as('tglkembali','Tgl Kembali');
		$crud->display_as('keterangan','Keterangan');	
		//remove array if without clause statement
		$crud->set_relation('kdbarang','tblbarang','{kdbarang} - {namabarang}',array('unit'=> $unit));	
		$crud->unset_clone();
		//$crud->unique_fields(array('nopinjam'));
		
		$crud->required_fields(array('tglpinjam','kdbarang','unit','nmpeminjam','unitpeminjam','acara','unitid'));		
		$crud->add_fields('tglpinjam','kdbarang','unit','nmpeminjam','unitpeminjam','acara','tglkembali','keterangan','unitid');
		$crud->edit_fields('tglpinjam','kdbarang','nmpeminjam','unitpeminjam','acara','tglkembali','keterangan','unitid');
		//$crud->change_field_type('nopinjam','hidden');
		$crud->callback_add_field('unitid',array($this,'add_field_callback_1'));
		$output = $crud->render();
		$this->_example_output($output);        
	}
 
	function add_field_callback_1()
	{
		$d=$this->session->userdata('admin_unit');;
		return '<input type="text" maxlength="50" value="'.$d.'" name="unitid" style="width:462px">';
	}
	function _example_output($output = null){
		$this->load->view('admin/transaksi/vpeminjaman',$output);	
	}
	
	function generate_nopinjam($post_array)
	{
		    // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('tblpeminjaman', 'id');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $post_array['nopinjam'] = ('P' . $number);
			
			return $post_array;
	}
		
	}

	?>