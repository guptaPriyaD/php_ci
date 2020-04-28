<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();

		//load model 
		$this->load->model("main_model");
		
		//load library
		$this->load->library('form_validation');
	}
	
	 public function index()
	{
		$data["fetch_data"]= $this->main_model->fetch_data();
		$this->load->view('main_view', $data);		
	}

	public function form_validation() {
		$this->form_validation->set_rules("first_name", "First Name", "required|alpha");
		$this->form_validation->set_rules("last_name", "Last Name", "required|alpha");
	
		if($this->form_validation->run()) {
			$data = array(
				"first_name" => $this->input->post("first_name"),
				"last_name" => $this->input->post("last_name")
			);
			if($this->input->post('update')) {
				$this->main_model->update_data($data, $this->input->post('hidden_id'));
				redirect(base_url() . "main/updated");
			}

			if($this->input->post('insert')) {
				$this->main_model->insert_data($data);
				redirect(base_url(). "main/inserted" );
			}
		} else {
			$this->index();
		}
	
	}

	public function inserted() {
		$this->index();
	}

	public function delete_data() {
		$id = $this->uri->segment(3);
		$this->main_model->delete_data($id);
		redirect(base_url(). "main/deleted");
	}

	public function deleted() {
		$this->index();
	}

	public function update_data() {
		$user_id= $this->uri->segment(3);
		$data['user_data'] = $this->main_model->fetch_single_data($user_id);
		$data["fetch_data"]= $this->main_model->fetch_data();
		$this->load->view('main_view', $data);
 
	}

	public function updated() {
		$this->index();
	}

	function login() {
		$data['title'] = "Login form with Sessions";
		$this->load->view('login_view', $data);
	}

	function login_validation() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if($this->main_model->can_login($username, $password)) {
				$session_data = array (
					'username' => $username
				);
				$this->session->set_userdata($session_data);
				redirect(base_url() . "main/enter");
			} else {
				$this->session->set_flashdata('error', 'Invalid username or password');
				redirect(base_url() . "main/login");
			}
		} else {
			$this->login();
		}
	}

	function enter() {
		if($this->session->userdata('username') != '') {
			echo '<h2>Welcome - '. $this->session->userdata('username') . '</h2>';
			echo '<a href="'. base_url() . 'main/logout">Logout</a>';
		} else {
			redirect (base_url(). 'main/login');
		}
	}

	function logout() {
		$this->session->unset_userdata('username');
		redirect(base_url().  'main/login');
	}
}
 