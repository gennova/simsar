<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Pengajuan extends MY_Controller {

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
		//$crud->set_theme('tablestrap');
		$crud->set_table('tblpengajuan');
		$crud->where('unit',$unit);
		$crud->set_subject('Pengajuan Pembelian Barang');
		
		//$crud->set_clone();
		
		$crud->callback_before_insert(array($this,'generate_nopengajuan'));
		$crud->callback_before_update(array($this,'_total'));
		//$crud->callback_after_insert(array($this,'_total'));
		//$crud->callback_column('jmlharga', array($this,'_total')); // add total to display columns
		/**Merubah Label Judul Field di tabel*/
		
		$crud->columns('nopengajuan','tglpengajuan','norab','namaunit','namabarang','satuan','jmlbarang','hargasatuan','jmlharga');
		
        $crud->display_as('idpengajuan','ID Pengajuan');
		$crud->display_as('nopengajuan','No Pengajuan');
		$crud->display_as('tglpengajuan','Tanggal');
		$crud->display_as('norab','No RAB');
		$crud->display_as('namaunit','Unit');
		$crud->display_as('namabarang','Nama Barang');
		$crud->display_as('satuan','Satuan');
		$crud->display_as('jmlbarang','Jumlah');
		$crud->display_as('hargasatuan','Harga');
		$crud->display_as('jmlharga','Total');
		$crud->display_as('keterangan','Keterangan');
		
		//$crud->add_action('Lihat', '', '','fa fa-print',array($this,'laporan'));
		//$crud->add_action('Kirim Email', '', '','fa fa-envelope',array($this,'kirimemail'));		
		
		$crud->unset_read();
		//$crud->unset_clone();
		
		//$crud->unique_fields(array('nopengajuan'));
		//$crud->field_type('nopengajuan', 'readonly');
		$state = $crud->getState();
			if($state == "edit")
				{
					$crud->field_type('nopengajuan','readonly');
					$crud->field_type('jmlharga','readonly');
				}
				elseif($state == "add")
					{
						$crud->field_type('nopengajuan','hidden');
						$crud->field_type('jmlharga','hidden');
						 
					}
					elseif($state == "clone")
					{
						$crud->field_type('nopengajuan','hidden');
						$crud->field_type('jmlharga','hidden');
						 
					}
		
		$crud->add_fields('nopengajuan','tglpengajuan','norab','namaunit','namabarang','satuan','jmlbarang','hargasatuan','jmlharga','keterangan','unit');
		$crud->edit_fields('nopengajuan','tglpengajuan','norab','namaunit','namabarang','satuan','jmlbarang','hargasatuan','jmlharga','keterangan','unit');
		//$crud->change_field_type('nopinjam','hidden');
		$crud->callback_add_field('unit',array($this,'getUnit'));
		$output = $crud->render();
		$this->_example_output($output);        
	}
 
	function getUnit()
	{
		$d=$this->session->userdata('admin_unit');;
		return '<input type="text" maxlength="50" value="'.$d.'" name="unit" style="width:462px">';
	}
	function _example_output($output = null){
		$this->load->view('admin/transaksi/vpengajuan',$output);	
	}
	
	function generate_nopengajuan($post_array)
	{
		    // Mengenerate No Pengajuan Barang
			$ambilunit=$post_array['namaunit'];

            $kode_terakhir = $this->admin->getMax('tblpengajuan', 'nopengajuan');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);		
			$post_array['nopengajuan'] = ('PB' . '-' . $ambilunit . '-' . $number);
			$post_array['jmlharga']=$post_array['jmlbarang']*$post_array['hargasatuan'];
			return $post_array;
	}
	
	public function _total($post_array, $primary_key) {
			$post_array['jmlharga']=$post_array['jmlbarang']*$post_array['hargasatuan'];
			return $post_array;
	}
	
	public function laporan($primary_key, $row)
	{
	    return site_url('admin/laporan/cetakpengajuan').'?id='.$row->nopengajuan;
	}
	
	public function kirimemail()
	{
	    return site_url('admin/email/');
	}
		
	}

	?>