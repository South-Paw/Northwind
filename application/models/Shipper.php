<?php
class Shipper extends CI_Model {
	public $id;
	public $companyName;
	public $phone;

	public function __construct() {
		$this->load->database();
	}

	public function getAllShippers() {
		$this->db->select('id, CompanyName as companyName');
		$this->db->order_by('CompanyName', 'asc');

		$rows = $this->db->get('Shippers')->result();

		$list = array();

		foreach ($rows as $row) {
			$list[$row->id] = $row->companyName;
		}

		return $list;
	}
}
