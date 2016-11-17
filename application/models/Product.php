<?php
/**
 * Declare the Product class, representing a row of the products table.
 * Since the database was imported from elsewhere and has capital letters
 * at the start of each field name, an internal tweak is used to convert
 * column names to php lower-case-first format.
 *
 * Implements only the Read function, since we're just implementing a product
 * browser, plus a listAll function that returns a map from productID to
 * productName for all products in the database.
 */
class Product extends CI_Model {
	public $id;
	public $productName;
	public $supplierID;
	public $categoryID;
	public $quantityPerUnit;
	public $unitPrice;
	public $unitsInStock;
	public $unitsOnOrder;
	public $reorderLevel;
	public $discontinued;

	public function __construct() {
		$this->load->database();
	}

	/**
	 * Return a Product object read from the database for the given product.
	 * @param int $id  Id of the product to be returned.
	 * @return a Product instance
	 * @throws a generic exception if no such product exists in the database.
	 */
	public function read($id) {
		$prod = new Product();
		$query = $this->db->get_where('Products', array('id'=>$id));
		if ($query->num_rows() !== 1) {
			throw new Exception("Product ID $id not found in database");
		}

		$rows = $query->result();
		$row = $rows[0];
		$prod->load($row);
		return $prod;
	}

	/**
     * Return an associative array id=>productName for all products in the
	 *  database, or all matching a given categoryId (if given).
	 * @param int $catId the ID in the categories table; only products in
	 * this category are returned if given. Otherwise all products are returned.
	 * @return associative array mapping productId to product
	 */
	public function listAll($catId=NULL) {
		$this->db->select('id, ProductName as productName');
		$this->db->order_by('ProductName', 'asc'); // order by changes
		if ($catId) {
			$this->db->where(array('CategoryID' => $catId));
		}
		$rows = $this->db->get('Products')->result();
		$list = array();
		foreach ($rows as $row) {
			$list[$row->id] = $row->productName;
		}
		return $list;
	}

	/**
     * Return an array of all products in the database.
	 * @return an array of Product objects containing all products, ordered
	 * by name.
	 */
	public function getAllProducts() {
		$this->db->order_by('ProductName');
		$rows = $this->db->get('Products')->result();
		$list = array();
		foreach ($rows as $row) {
			$prod = new Product();
			$prod->load($row);
			$list[] = $row;
		}
		return $list;
	}

	// Given a row from the database, copy all database column values
	// into 'this', converting column names to fields names by converting
	// first char to lower case.
	private function load($row) {
		foreach ((array) $row as $field => $value) {
			$fieldName = strtolower($field[0]) . substr($field, 1);
			$this->$fieldName = $value;
		}
	}

	// Check that the result from a DB query was OK
	private static function checkResult($result) {
		global $DB;
		if (!$result) {
			die("DB error ({$DB->error})");
		}
	}
};
