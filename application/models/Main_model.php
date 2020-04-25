<?php 

class Main_model extends CI_Model {
	public function test_main()
	{
		echo "this is model func";
	}

	function insert_data($data)
	{
		$this->db->insert("users", $data);
	}

	function fetch_data() {
		$query = $this->db->get('users');
		return $query;

	}
}