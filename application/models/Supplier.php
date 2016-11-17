<?php
class Supplier extends CI_Model {
    public $id;
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

    public function read($id) {
        $cat = new Supplier();
        $query = $this->db->get_where('Suppliers', array('id'=>$id));

        if ($query->num_rows() !== 1) { // swapped to function
            throw new Exception("Supplier ID $id not found in database");
        }

        // Copy all database column values into this, converting column names
        // to fields names by converting first char to lower case.
        $row = $query->result();
        foreach ((array) $row as $field=>$value) {
            $fieldName = strtolower($field[0]) . substr($field, 1);
            $cat->$fieldName = $value;
        }
        return $cat;
    }
	
    public function listAll() {
        $rows = $this->db->get('Suppliers')->result(); // Gets all rows
        $list = array();

        foreach ($rows as $row) {
            $list[$row->id] = $row->CompanyName;
        }

        return $list;
    }
};
