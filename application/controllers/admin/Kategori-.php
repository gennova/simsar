<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/kategori_model', 'kategori_model');
			$this->load->library('datatable'); // loaded my custom serverside datatable library

			$this->rbac->check_module_access();
		}

		public function index(){
			$data['view'] = 'admin/kategori/kategori_list';
			$this->load->view('layout', $data);
		}
		
		public function datatable_json(){				   					   
			$records = $this->kategori_model->get_all_kategori();
			$data = array();
			foreach ($records['data']  as $row) 
			{  
				$data[]= array(
					$row['kdprefixkat'],
					$row['namakategori'],
					'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/kategori/edit/'.$row['idkategori']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/kategori/edit/'.$row['idkategori']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" data-href="'.base_url('admin/kategori/del/'.$row['idkategori']).'" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a>'
				);
			}
			$records['data']=$data;
			echo json_encode($records);						   
		}

		//-----------------------------------------------------------

		public function add(){
			
			$this->rbac->check_operation_access(); // check opration permission

			if($this->input->post('submit')){
				$this->form_validation->set_rules('kdprefixkat', 'Kode_Prefix', 'trim|required');
				$this->form_validation->set_rules('namakategori', 'Nama_Kategori', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/kategori/kategori_add';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'kdprefixkat' => $this->input->post('kdprefixkat'),
						'namakategori' => $this->input->post('namakategori'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->kategori_model->add_kategori($data);
					if($result){
						$this->session->set_flashdata('msg', 'kategori has been added successfully!');
						redirect(base_url('admin/kategori'));
					}
				}
			}
			else{
				$data['view'] = 'admin/kategori/kategori_add';
				$this->load->view('layout', $data);
			}
			
		}

		public function edit($id = 0){

			$this->rbac->check_operation_access(); // check opration permission

			if($this->input->post('submit')){
				$this->form_validation->set_rules('kdprefixkat', 'Kode_Prefix', 'trim|required');
				$this->form_validation->set_rules('namakategori', 'Nama_Kategori', 'trim|required');


				if ($this->form_validation->run() == FALSE) {
					$data['kategori'] = $this->kategori_model->get_kategori_by_id($id);
					$data['view'] = 'admin/kategori/kategori_edit';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'kdprefixkat' => $this->input->post('kdprefixkat'),
						'namakategori' => $this->input->post('namakategori'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->kategori_model->edit_kategori($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'kategori has been updated successfully!');
						redirect(base_url('admin/kategori'));
					}
				}
			}
			else{
				$data['kategori'] = $this->kategori_model->get_kategori_by_id($id);
				$data['view'] = 'admin/kategori/kategori_edit';
				$this->load->view('layout', $data);
			}
		}

		public function delete($id = 0)
		{
			$this->rbac->check_operation_access(); // check opration permission
			
			$this->db->delete('tblkategori', array('idkategori' => $id));
			$this->session->set_flashdata('msg', 'kategori has been deleted successfully!');
			redirect(base_url('admin/kategori'));
		}

	}


	?>