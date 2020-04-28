<?php 

class Main_model extends CI_Model {
	public function test_main()
	{
		echo "this is model func";
	}

	function insert_data($data) {
		$insert_data = array(
			'first_name' => $data['first_name'],
			'last_name'  => $data['last_name']
		);
		$this->db->insert("users", $insert_data);
	}

	function fetch_data() {
		$this->db->select('id, first_name, last_name');
		$this->db->select('id, first_name, last_name');
		$query = $this->db->get('users');
		return $query;
	}

	function delete_data($id) {
		$this->db->where("id", $id);
		$this->db->delete('users');
	}

	function fetch_single_data($id) {
		$this->db->select('id, first_name, last_name');
		$this->db->where("id", $id);
		$query = $this->db->get('users');
		return $query;

	}

	function update_data($data, $id) {
		$update_data = array(
			'first_name' => $data['first_name'],
			'last_name'  => $data['last_name']
		);
		$this->db->where("id", $id);
		$query = $this->db->update('users', $update_data);
	}

	function can_login($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('users');

		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}