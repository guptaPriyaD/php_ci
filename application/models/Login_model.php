<?php

class Login_model extends CI_Model {

    function can_login($email, $password) {
		$this->db->where('email', $email);
		$query = $this->db->get('user_registration');

		if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                if($row->is_email_verified == 'yes') {
                    $store_password = $this->encrypt->decode($row->password);
                    if($password == $store_password) {
                        $this->session->set_userdata('id', $row->id);
                    } else {
                        return 'Wrong password';

                    }
                } else {
                    return 'First verify your email address';

                }
            }
		} else {
			return 'Wrong email adress';
		}
	}
}