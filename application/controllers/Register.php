<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->model('register_model');
    }

    public function index() {
        $this->load->view('register_view');
    }    

    public function validation() {
        $this->form_validation->set_rules("user_name", "Name", "required|trim");
        $this->form_validation->set_rules("user_email", "Email Address", "required|trim|valid_email|is_unique[user_registraion.email]");
        $this->form_validation->set_rules("user_password", "Password", "required|trim");

        if($this->form_validation->run()) {
            $verification_key = hash('sha256', rand());
            $encrypted_password = $this->encrypt->encode($this->input->post('user_password'));

            $data = array (
                'name' => $this->input->post('user_name'),
                'email' => $this->input->post('user_email'),
                'password' => $encrypted_password,
                'verification_key' => $verification_key
            );

            $id = $this->register_model->insert($data);
            if($id > 0) {
                $subject = "Please verify email for login";
                $message = "
                <p>Hi ". $this->input->post('user_name'). "</p>
                <p>This is email verification mail from Codeigniter Login System. For complete registration process and login into system, you may want to verify your email by clicking this <a href='". base_url()."register/verify_email/".$verification_key."'>link</a>.</p>
                <p>Once you click this link your email will be verified and you can log in to the system.</p>
                <p>Thanks.</p>
                ";

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'xxx@gmail.com', // change it to yours
                    'smtp_pass' => 'xxx', // change it to yours
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('info@phpci.com');
                $this->email->to($this->input->post('user_email'));
                $this->email->subject($subject); 
                $this->email->message($message);
                if ($this->email->send()) {
                    $this->session->set_flashdata('message', 'Check your email for verification mail');
                    redirect('register');
                } else {
                    show_error($this->email->print_debugger()); 
                } 
            }
        } else {
            $this->index();
        }

    }

    public function verify_email() {
        if($this->uri->segment(3)) {
            $verification_key = $this->uri->segment(3);
            if($this->register_model->verify_email($verification_key)) {
                $data['message'] = '<h3 align="center">Your email has been successfully verified, now you can login from <a href="'. base_url() . 'login">here</a></h3>';
            } else {
                $data['message'] = '<h3 align="center">Invalid Link</h3>';
            }
            $this->load->view('email_verification_view', $data);
        }
    }
}