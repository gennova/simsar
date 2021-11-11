<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('admin/dashboard_model', 'dashboard_model');
			$this->load->model('dashboard_model');
		}

		public function index(){
			$unit = $this->session->userdata('admin_unit');
			//$data['all_users'] = $this->dashboard_model->get_all_users();
			$data['all_barang'] = $this->dashboard_model->get_all_barang($unit);
			$data['all_meubel'] = $this->dashboard_model->get_all_meubel($unit);
			$data['all_elektronik'] = $this->dashboard_model->get_all_elektronik($unit);
			$data['all_lain'] = $this->dashboard_model->get_all_lain($unit);			
			$data['all_alatmusik'] = $this->dashboard_model->get_all_alatmusik($unit);
			$data['all_alatolahraga'] = $this->dashboard_model->get_all_alatolahraga($unit);
			$data['all_laboratorium'] = $this->dashboard_model->get_all_laboratorium($unit);
			$data['all_barangbos'] = $this->dashboard_model->get_all_barangbos($unit);
			$data['all_barangyys'] = $this->dashboard_model->get_all_barangyys($unit);
			$data['all_barangsum'] = $this->dashboard_model->get_all_barangsum($unit);
			$data['all_barangpinjam'] = $this->dashboard_model->get_all_barangpinjam($unit);
			$data['all_teknopreneur'] = $this->dashboard_model->get_all_teknopreneur($unit);
			$data['all_barangrusak'] = $this->dashboard_model->get_all_barangrusak($unit);
			$data['active_users'] = $this->dashboard_model->get_active_users($unit);
			$data['deactive_users'] = $this->dashboard_model->get_deactive_users($unit);
			$data['title'] = 'Dashboard';
			$data['view'] = 'admin/dashboard/dashboard1';
			$this->load->view('layout', $data);
		}
		
	}

?>	