<?php
class Order extends CI_Model {
	public $id;
	public $customerID;
	public $employeeID;
	public $orderDate;
	public $requiredDate;
	public $shippedDate;
	public $shipVia;
	public $freight;

	public function __construct() {
		$this->load->database();
	}

	public function getAllOrders($orderId = NULL) {
		$this->db->order_by('id');

		if ($orderId) {
			$this->db->where(array('id' => $orderId));
		}

		$rows = $this->db->get('Orders')->result();

		$list = array();

		foreach ($rows as $row) {
			$list[] = $row;
		}

		return $list;
	}

	public function getOrder($id) {
		$order = new Order();

		$query = $this->db->get_where('OrderDetails', array('orderId'=>$id));

		$rows = $query->result();

		$orders = array();

		foreach ($rows as $row) {
			$orders[$row->id] = $row;
		}

		return $orders;
	}
}
