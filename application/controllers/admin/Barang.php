<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Barang extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->rbac->check_module_access();
		$this->load->model('admin/Admin_model', 'admin');
		$this->load->model('admin/M_barang');
	}
	
	public function index()
	{
		$unit = $this->session->userdata('admin_unit');
		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
		$crud->set_table('tblbarang');
		$crud->where('tblbarang.unit',$unit);
		$crud->set_subject('Data Barang');

		$crud->set_clone();
		
		$crud->callback_before_insert(array($this,'generate_kdbarang'));
		//$crud->callback_before_insert(array($this,'generate_tahun'));
		$crud->callback_before_update(array($this,'ubah_tahun'));
		//$crud->callback_before_insert(array($this,'generate_tahun'));
		//$crud->callback_after_insert(array($this, 'nama_otomatis'));

		/**Menampilkan Kolom pada Grid View*/
		$crud->columns('kdbarang','namabarang','idjenis','harga','kdlokasi','tglmasuk','idkondisi','kdsumberdana');	
		
		// ================================ Form tabs
		//$crud->callback_field('unit',array($this,'get_unit'));
	    //$crud->field_Type('unit','text','my default value');
		//$crud->field_type('unit','hidden',array($unit = $this->session->userdata('admin_unit')));
		/**Merubah Label Judul Field di tabel*/		
		//$crud->set_add_value('unit', date("Y-m-d"));
		$crud->display_as('idjenis','Jenis Barang');
		$crud->display_as('namaunit','Unit');
		$crud->display_as('kdlokasi','Lokasi');
		$crud->display_as('kdbarang','Kode Barang');
		$crud->display_as('namabarang','Nama Barang');
		$crud->display_as('harga','Harga');
		$crud->display_as('tglmasuk','Tgl Masuk');
		$crud->display_as('invoice','No. Invoice');
		$crud->display_as('idkondisi','Kondisi');
		$crud->display_as('kdsumberdana','Sumber Dana');
		$crud->display_as('tipe','Tipe');
		$crud->display_as('serialnumber','Serial Number');
				
		$crud->set_relation('kdkategori','tblkategori','namakategori');					
		$crud->set_relation('kdsubkategori','tblsubkategori','namasubkategori');
		$crud->set_relation('idjenis','tbljenis','namajenis');
		$crud->set_relation('kdsumberdana','tblsumberdana','nmsumberdana');
		//$crud->set_relation('idunit','tblunit','namaunit');
		$crud->set_relation('kdlokasi','tbllokasi','namalokasi',['unit = ' => $unit]);
		$crud->set_relation('idkondisi','tblkondisi','namakondisi');
		
		
		$crud->unique_fields(array('kdbarang'));	
		$crud->required_fields('kdkategori','kdsubkategori','idjenis','namaunit','kdlokasi','kdsumberdana','namabarang','idkondisi','unit');		
		$crud->add_fields('kdkategori','kdsubkategori','idjenis','namaunit','kdlokasi','kdsumberdana','kdprefix','nourut','kdbarang','namabarang','harga','tipe','serialnumber','tglmasuk','thnmasuk','invoice','idkondisi','keterangan','unit');	
		$crud->edit_fields('kdkategori','kdsubkategori','idjenis','namaunit','kdlokasi','kdsumberdana','kdbarang','namabarang','harga','tipe','serialnumber','tglmasuk','thnmasuk','invoice','idkondisi','keterangan','unit');	
		$crud->unset_read_fields('motherboard','processor','tipedisk','sizedisk','tiperam','sizeram','namaos');
		//$crud->readFields('kdkategori','kdsubkategori','idjenis','namaunit','kdlokasi','kdbarang','namabarang','tipe','serialnumber','tglmasuk','invoice','idkondisi','keterangan');
			
		$crud->change_field_type('kdprefix','hidden');
		$crud->change_field_type('nourut','hidden');
		$crud->change_field_type('thnmasuk','hidden');
		$crud->order_by('idbarang','desc');
		$crud->callback_add_field('unit',array($this,'add_field_callback_1'));
		$this->load->library('gc_dependent_select');
		
		//Memanggil Relasi ketiga select tblkategori, tblsubkategori, tbljenis
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
			'data-placeholder' => 'pilih sub kategori' //placeholder:
			),
			
			// field ketiga
			'idjenis' => array( // nama dropdown kedua
			'table_name' => 'tbljenis', // tabel sub kategori
			'title' => 'namajenis', // judul subkategori
			'id_field' => 'idjenis', // primary key tabel subkategori
			'relate' => 'kdsubkategori', // relasi ke tabel kategori:
			'data-placeholder' => 'pilih jenis barang' //placeholder:
			),
			
			);
		
			$config = array(
			'main_table' => 'tblbarang',
			'main_table_primary' => 'idbarang',
			'url' => base_url() . 'admin/' . strtolower(__CLASS__) . '/' . strtolower(__FUNCTION__) . '/',
			);

			$categories = new gc_dependent_select($crud, $fields, $config);
						
			$js = $categories->get_js();		
			$crud->add_action('Generate Barcode', '', '','fa fa-barcode',array($this,'ca_barcode'));
			//$crud->add_action('Generate Kode Barang', '', '','fa fa-trophy',array($this,'generate'));			
			//Custom Action	
					
			$output = $crud->render();
			$output->output.= $js;
 
			$this->_example_output($output);        
	}
 
	
	function nama_otomatis($post_array)
		{		
			//$post_array['kdbarang'] = date('Y-m-d H:i:s');
			//$post_array['tglmasuk'] = date('ym');
			$ambilkat=$post_array['kdkategori'];
			$ambilsubkat=$post_array['kdsubkategori'];
			$ambilunit=$post_array['namaunit'];
			$ambiltgl=date('yd', strtotime($post_array['tglmasuk']));
			//$ambilwaktu=date('dmyHis');
			$post_array['kdbarang'] = ($ambilkat . '-' . $ambilsubkat . '-' . $ambilunit . '-' . $ambiltgl);
			return $post_array;
		}
		
	function ubah_tahun($post_array)
	{
			$ambilthnubah=date('Y', strtotime($post_array['tglmasuk']));	
			$post_array['thnmasuk'] = $ambilthnubah;
			return $post_array;
	}	
	
	function generate_kdbarang($post_array)
	{
		    // Mengenerate ID Barang
			$ambilkat=$post_array['kdkategori'];
			$ambilsubkat=$post_array['kdsubkategori'];
			$ambilunit=$post_array['namaunit'];
			$ambilkodesumberdana=$post_array['kdsumberdana'];
			$ambilthn=date('Y', strtotime($post_array['tglmasuk']));
						
            $kode_terakhir = $this->admin->getMax('tblbarang', 'nourut');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
			$post_array['kdprefix'] = ($ambilkat . '-' . $ambilsubkat . '-' . $ambilunit . '-' . $ambilkodesumberdana) . '-';
			$post_array['nourut'] = ($number);
			$post_array['kdbarang'] = ($ambilkat . '-' . $ambilsubkat . '-' . $ambilunit  . '-' . $ambilkodesumberdana . '-' . $number);
			$post_array['thnmasuk'] = $ambilthn;
			
			return $post_array;
	}
	
	public function ca_barcode($primary_key , $row)
	{
	    return site_url('admin/barang/get_barcode').'/'.$row->kdbarang;
	}

	public function get_barcode($code)
    {
        $this->set_barcode($code);
    }

	function add_field_callback_1()
	{
		$d=$this->session->userdata('admin_unit');;
		return '<input type="text" maxlength="50" value="'.$d.'" name="unit" style="width:462px">';
	}

    private function set_barcode($code)
    {
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        //generate barcode
		ob_clean();
        Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
    }
			
	function _example_output($output = null){
		$this->load->view('admin/master/vbarang',$output);    
	}
	
	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_barang->check_kode($value['J']);
						if ($check != 1) {
							//$resultData[$index]['id'] = $id;
							$resultData[$index]['kdkategori'] = $value['A'];
							$resultData[$index]['kdsubkategori'] = $value['B'];
							$resultData[$index]['idjenis'] = $value['C'];
							$resultData[$index]['namaunit'] = $value['D'];
							$resultData[$index]['kdlokasi'] = $value['E'];
							$resultData[$index]['kdprefix'] = $value['F'];
							$resultData[$index]['kdsumberdana'] = $value['G'];
							$resultData[$index]['nourut'] = $value['H'];
							$resultData[$index]['kdbarang'] = $value['I'];
							$resultData[$index]['namabarang'] = ucwords($value['J']);
							$resultData[$index]['harga'] = $value['K'];
							$resultData[$index]['tglmasuk'] = $value['L'];
							$resultData[$index]['idkondisi'] = $value['M'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_barang->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Barang Berhasil diimport ke database'));
						redirect('admin/barang');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Barang Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('admin/barang');
				}

			}
		}
	}
	
		
	}

	?>