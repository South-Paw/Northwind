<?php
class Customer extends CI_Model {
	public $id;
	public $code;
	public $companyName;
	public $contactName;
	public $contactTitle;
	public $address;
	public $city;
	public $region;
	public $postalCode;
	public $country;
	public $phone;
	public $fax;

	public function __construct() {
		$this->load->database();
	}

	public function getAllCustomers() {
		$this->db->select('id, CompanyName as companyName');
		$this->db->order_by('CompanyName', 'asc');

		$rows = $this->db->get('Customers')->result();

		$list = array();

		foreach ($rows as $row) {
			$list[$row->id] = $row->companyName;
		}

		return $list;
	}
}
