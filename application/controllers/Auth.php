<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('mailer');
		$this->load->model('auth_model', 'auth_model');
		$this->load->model('admin/admin_model', 'admin_model');
	}
		//--------------------------------------------------------------
	public function index(){
		if($this->session->has_userdata('is_admin_login'))
		{
			redirect('admin/dashboard');
		}
		else{
			redirect('auth/login');
		}
	}
		//--------------------------------------------------------------
	public function login(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('auth/login');
			}
			else {
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				$result = $this->auth_model->login($data);
				if($result){
					if($result['is_verify'] == 0){
						$this->session->set_flashdata('error', 'Please verify your email address!');
						redirect(base_url('auth/login'));
						exit;
					}
					if($result['is_active'] == 0){
						$this->session->set_flashdata('error', 'Account is disabled by Admin!');
						redirect(base_url('auth/login'));
						exit;
					}
					if($result['is_admin'] == 1){
						$admin_data = array(
							'admin_id' => $result['admin_id'],
							'username' => $result['username'],
							'firstname' => $result['firstname'],
							'lastname' => $result['lastname'],
							'admin_unit' => $result['unit'],
							'admin_role_id' => $result['admin_role_id'],
							'admin_role' => $result['admin_role_title'],
							'admin_pimpinan' => $result['pimpinan'],
							'admin_sarpra' => $result['sarpras'],
							'admin_unit_name' => $result['unitname'],
							'admin_unit_address' => $result['address'],
							'admin_unit_kota' => $result['kota'],
							'admin_unit_email' => $result['email'],
							'admin_unit_phone' => $result['phone'],
							'admin_unit_website' => $result['website'],
							'is_admin_login' => TRUE
						);
						log_message('INFO', '------------------------------------ '.$this->router->fetch_class().'||'.$this->router->fetch_method().' - '.$result['username']." Login Success");
						$this->session->set_userdata($admin_data);
						$this->admin_model->update_login_status($result['admin_id'],file_get_contents('https://api.ipify.org'));
							$this->rbac->set_access_in_session(); // set access in session
							redirect(base_url('admin/dashboard'), 'refresh');
						}
					}
					else{
						log_message('ERROR', '------------------------------------ '.$this->router->fetch_class().'||'.$this->router->fetch_method().' - '.$result['username']." Wrong password");
						$this->session->set_flashdata('error', 'Invalid Username or Password!');
						redirect(base_url('auth/login'));
					}
				}
			}
			else{
				$this->load->view('auth/login');
			}
		}	

		//-------------------------------------------------------------------------
		public function register(){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('username', 'Username', 'trim|is_unique[ci_admin.username]|required');
				$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[ci_admin.email]|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$data['title'] = 'Create an Account';
					$this->load->view('auth/register', $data);
				}
				else{
					$data = array(
						'username' => $this->input->post('username'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'admin_role_id' => 2, // By default i putt role is 2 for registraiton
						'email' => $this->input->post('email'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'is_active' => 1,
						'is_verify' => 0,
						'token' => md5(rand(0,1000)),    
						'last_ip' => '',
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->auth_model->register($data);
					if($result){
						//sending welcome email to user
						$name = $data['firstname'].' '.$data['lastname'];
						$email_verification_link = base_url('auth/verify/').'/'.$data['token'];
						$body = $this->mailer->Tpl_Registration($name, $email_verification_link);
						$this->load->helper('email_helper');
						$to = $data['email'];
						$subject = 'Activate your account';
						$message =  $body ;
						$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
						$email = true;
						if($email){
							$this->session->set_flashdata('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');	
							redirect(base_url('auth/login'));
						}	
						else{
							echo 'Email Error';
						}
					}
				}
			}
			else{
				$data['title'] = 'Create an Account';
				$this->load->view('auth/register', $data);
			}
		}

		//----------------------------------------------------------	
		public function verify(){
			$verification_id = $this->uri->segment(3);
			$result = $this->auth_model->email_verification($verification_id);
			if($result){
				$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');	
				redirect(base_url('auth/login'));
			}
			else{
				$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
				redirect(base_url('auth/login'));
			}	
		}
		//--------------------------------------------------		
		public function forgot_password(){
			if($this->input->post('submit')){
				//checking server side validation
				$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
				if ($this->form_validation->run() === FALSE) {
					$this->load->view('auth/forget_password');
					return;
				}
				$email = $this->input->post('email');
				$response = $this->auth_model->check_user_mail($email);
				if($response){
					$rand_no = rand(0,1000);
					$pwd_reset_code = md5($rand_no.$response['admin_id']);
					$this->auth_model->update_reset_code($pwd_reset_code, $response['admin_id']);
					// --- sending email
					$name = $response['firstname'].' '.$response['lastname'];
					$email = $response['email'];
					$reset_link = base_url('auth/reset_password/'.$pwd_reset_code);
					$body = $this->mailer->Tpl_PwdResetLink($name,$reset_link);

					$this->load->helper('email_helper');
					$to = $email;
					$subject = 'Reset your password';
					$message =  $body ;
					$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
					if($email){
						$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

						redirect(base_url('auth/forgot_password'));
					}
					else{
						$this->session->set_flashdata('error', 'There is the problem on your email');
						redirect(base_url('auth/forgot_password'));
					}
				}
				else{
					$this->session->set_flashdata('error', 'The Email that you provided are invalid');
					redirect(base_url('auth/forgot_password'));
				}
			}
			else{
				$data['title'] = 'Forget Password';
				$this->load->view('auth/forget_password',$data);	
			}
		}
		//----------------------------------------------------------------		
		public function reset_password($id=0){
			// check the activation code in database
			if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$result = false;
					$data['reset_code'] = $id;
					$data['title'] = 'Reseat Password';
					$this->load->view('auth/reset_password',$data);
				}   
				else{
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$this->auth_model->reset_password($id, $new_password);
					$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
					redirect(base_url('auth/login'));
				}
			}
			else{
				$result = $this->auth_model->check_password_reset_code($id);
				if($result){
					$data['reset_code'] = $id;
					$data['title'] = 'Reseat Password';
					$this->load->view('auth/reset_password',$data);
				}
				else{
					$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
					redirect(base_url('auth/forgot_password'));
				}
			}
		}

		public function logout(){
			log_message('ERROR', '------------------------------------ '.$this->router->fetch_class().'||'.$this->router->fetch_method().' - '.$this->session->userdata('admin_unit')." logout");
			$this->session->sess_destroy();
			redirect(base_url('auth/login'), 'refresh');
		}
		function getUserIP()
		{
			// Get real visitor IP behind CloudFlare network
			if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
					$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
					$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
			}
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];

			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}

			return $ip;
		}

	}  // end class


	?>