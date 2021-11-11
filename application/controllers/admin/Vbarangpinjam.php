<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Vbarangpinjam extends MY_Controller {

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
		$crud->set_table('tblpeminjaman');
		$unit = $this->session->userdata('admin_unit');
		$crud->where('tblpeminjaman.unit',$unit);
		$crud->set_subject('Peminjaman Barang');
		
		$crud->where('tglkembali');
		$crud->set_clone();
		
		//$crud->unset_operations();
		$crud->unset_add();
		//$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();		
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
		
		$crud->set_relation('kdbarang','tblbarang','{kdbarang} - {namabarang}');	
		
		//$crud->unique_fields(array('nopinjam'));
		$crud->required_fields(array('tglpinjam','kdbarang','unit','nmpeminjam','unitpeminjam','acara'));		
		$crud->add_fields('tglpinjam','kdbarang','unit','nmpeminjam','unitpeminjam','acara','tglkembali','keterangan');
		$crud->edit_fields('tglpinjam','kdbarang','nmpeminjam','unitpeminjam','acara','tglkembali','keterangan');
		//$crud->change_field_type('nopinjam','hidden');
		
		$output = $crud->render();
		$this->_example_output($output);        
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