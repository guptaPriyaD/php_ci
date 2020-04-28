<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    public function index() {
        echo "Welcome User";
        echo '<p align="center"><a href="'. base_url() . 'private_area/logout">Logput</a></p>';
    }

    public function logout() {
        $data = $this-> session->all_userdata();
        foreach($data as $row => $value) {
            $this->session->unset_userdata($row);
        }
        redirect('login');
    }

}