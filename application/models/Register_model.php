<?php 

class Register_model extends CI_Model {
	public function insert($data)
	{
		$this->db->insert('user_registraion', $data);
		return $this->db->insert_id();
	}

	public function verify_email($key)
	{
		$this->db->where('verification_key', $key);
		$this->db->where('is_email_verified', no);
		$query = $this->db->get('user_registraion');

		if($query->num_rows(0) > 0) {
			$data = array(
				'is_email_verified' => 'yes'
			);
		$this->db->where('verification_key', $key);
		$this->db->where('user_registraion', $data);
		} else {
			return false;
		}
	}
}

?>