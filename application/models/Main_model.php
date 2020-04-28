<?php 

class Main_model extends CI_Model {
	public function test_main()
	{
		echo "this is model func";
	}

	function insert_data($data) {
		$this->db->insert("users", $data);
	}

	function fetch_data() {
		$query = $this->db->get('users');
		return $query;
	}

	function delete_data($id) {
		$this->db->where("id", $id);
		$this->db->delete('users');
	}

	function fetch_single_data($id) {
		$this->db->where("id", $id);
		$query = $this->db->get('users');
		return $query;

	}

	function update_data($data, $id) {
		$this->db->where("id", $id);
		$query = $this->db->update('users', $data);
	}
}