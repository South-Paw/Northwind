<?php
class Employee extends CI_Model {
	public $id;
	public $lastName;
	public $firstName;
	public $title;
	public $titleOfCourtesy;
	public $birthDate;
	public $hireDate;
	public $address;
	public $city;
	public $region;
	public $postalCode;
	public $country;
	public $homePhone;
	public $extension;
	public $notes;
	public $reportsTo;

	public function __construct() {
		$this->load->database();
	}

	public function getAllEmployees() {
		$this->db->select('id, FirstName as firstName, LastName as lastName');
		$this->db->order_by('FirstName', 'asc');

		$rows = $this->db->get('Employees')->result();

		$list = array();

		foreach ($rows as $row) {
			$list[$row->id] = $row->firstName .' '. $row->lastName;
		}

		return $list;
	}
}
