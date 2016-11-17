<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Orders extends CI_Controller {
    public function index() {
    	$this->browser();
    }

    public function browser() {
        $this->load->helper('url');

		$this->load->model('site');
		$this->load->model('session');

		$this->load->model('order');
		$this->load->model('customer');
		$this->load->model('employee');
		$this->load->model('shipper');

		$orderList = $this->order->getAllOrders();
		$customerList = $this->customer->getAllCustomers();
		$employeeList = $this->employee->getAllEmployees();
		$shippersList = $this->shipper->getAllShippers();

		$data = array(
			'orderList'		=> $orderList,
			'customerList'	=> $customerList,
			'employeeList'	=> $employeeList,
			'shippersList'	=> $shippersList,
			'loggedIn'		=> $this->session->loggedIn(),
            'title'			=> $this->site->siteName,
			'pageTitle'		=> 'Order Browser'
		);

		$data['content'] = $this->load->view('orders/browser', $data, TRUE);

		$this->load->view('templates/master', $data);
	}

	public function details($orderId) {
        $this->load->helper('url');

		$this->load->model('site');
		$this->load->model('session');

		$this->load->model('order');
		$this->load->model('customer');
		$this->load->model('employee');
		$this->load->model('shipper');
		$this->load->model('product');

		$order = $this->order->getAllOrders($orderId);
		$customerList = $this->customer->getAllCustomers();
		$employeeList = $this->employee->getAllEmployees();
		$shippersList = $this->shipper->getAllShippers();
		$productList = $this->product->listAll();

		$orderContents = $this->order->getOrder($orderId);

		$productsOrdered = array();

		foreach ($orderContents as $orderItem) {
			$productsOrdered[$orderItem->ProductID] = $this->product->read($orderItem->ProductID);
		}

		$data = array(
			'order'			=> $order[0],
			'orderContents'	=> $orderContents,
			'customerList'	=> $customerList,
			'employeeList'	=> $employeeList,
			'shippersList'	=> $shippersList,
			'productList'	=> $productList,
			'productsOrdered' => $productsOrdered,
			'loggedIn'		=> $this->session->loggedIn(),
			'title'			=> $this->site->siteName,
			'pageTitle'		=> 'Order #'. $orderId .' Details'
		);

		$data['content'] = $this->load->view('orders/details', $data, TRUE);

		$this->load->view('templates/master', $data);
	}
}
