<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Upload_multiple extends CI_Controller {

    public function index() {
		$this->load->view('upload_multiple_view');
	}

    public function upload () {
        $output = '';

        $config['upload_path'] = "./upload";
        $config['allowed_types'] = "gif|png|jpg|jpeg";
        $this->load->library('upload');        
        $this->upload->initialize($config);

        for($count = 0; $count < count($_FILES['files']['name']); $count++) {

            $_FILES['file']['name'] =     $_FILES['files']['name'][$count];
            $_FILES['file']['type'] =     $_FILES['files']['type'][$count];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$count];
            $_FILES['file']['error'] =    $_FILES['files']['error'][$count];
            $_FILES['file']['size'] =     $_FILES['files']['size'][$count];

            if($this->upload->do_upload('file')) {
                $data = $this->upload->data();

                $output .= '
                    <div class="col=md=3">
                        <img src="'. base_url().'upload/'.$data["file_name"] .'" class="img-responsive img-thumbnail" height="200" width="200" />
                    </div>
                ';                
            }
        }
        echo $output;
    }

}