<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendemail extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('send_mail_view');
    }  
        
    public function send(){
        $subject = "Application for Programer Registration by - " . $this->input->post('name'); 
        $programming_langs = implode(",", $this->input->post('programming_lang'));
        $file_data = $this->upload_file();

        if(is_array($file_data)) {
            $message = '
            <h3 align="center">Programmer Details</h3>
            <table border=1 width="100%" cellpadding=5>
                <tr>
                    <td width="30%">Name</td>
                    <td width="70%">'. $this->input->post('name') .'</td>
                </tr>
                <tr>
                    <td width="30%">Address</td>
                    <td width="70%">'. $this->input->post('address') .'</td>
                </tr>
                <tr>
                    <td width="30%">Email Address</td>
                    <td width="70%">'. $this->input->post('email') .'</td>
                </tr>
                <tr>
                    <td width="30%">Programming Languages Knowledge</td>
                    <td width="70%">'. $programming_langs .'</td>
                </tr>
                <tr>
                    <td width="30%">Experience year</td>
                    <td width="70%">'. $this->input->post('experience') .'</td>
                </tr>
                <tr>
                    <td width="30%">Mobile Numbar</td>
                    <td width="70%">'. $this->input->post('mobile') .'</td>
                </tr>
                <tr>
                    <td width="30%">Additional Information</td>
                    <td width="70%">'. $this->input->post('additional_information') .'</td>
                </tr>
            <table>
            ';
            $config = array (
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                // 'smtp_crypto' => 'ssl',
                'smtp_port' => 587,
                'smtp_user' => 'xxx@gmail.com',
                'smtp_pass' => 'xxx',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'word_wrap' => TRUE
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($this->input->post("email"));
            $this->email->to('bubbly1013@gmail.com');
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->attach($file_data['full_path']);
 
            if($this->email->send()) {
                if(delete_files($file_data['file_path'])) {
                    $this->session->set_flashdata('message', 'Application Sent');
                    redirect('sendemail');
                }
            }
        } else {
            $this->session->set_flashdata('message', "There is an error in attached file.");
        }
    }

    public function upload_file(){
        $config['upload_path'] = 'upload/';
        $config['allowed_types'] = 'doc|docx|pdf|txt';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('resume')) {
            return $this->upload->data();
        } else {
            return $this->upload->display_errors();
        }

    }  

}