<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Products extends CI_Controller {
	public function index() {
		$this->browser();
	}

	public function browser() {
		$this->load->helper('url');

		$this->load->model('site');
		$this->load->model('session');

		$this->load->model('category');
		$this->load->model('product');
		$this->load->model('supplier');

		$categoryMap = $this->category->listAll();
		$currentCategoryId = $this->input->get('Category');

		if (!$currentCategoryId) {
			$currentCategoryId = key($categoryMap);
		}

		$productMap = $this->product->listAll($currentCategoryId);
		$currentProductId = $this->input->get('Product');

		if (!$currentProductId || !array_key_exists($currentProductId, $productMap)) {
			$currentProductId = key($productMap);
		}

		$product = $this->product->read($currentProductId);

		$supplierMap = $this->supplier->listAll();

		$data = array(
			'categoryMap'	=> $categoryMap,
			'productMap'	=> $productMap,
			'supplierMap'	=> $supplierMap,
			'product'		=> $product,
			'loggedIn'		=> $this->session->loggedIn(),
			'title'			=> $this->site->siteName,
			'pageTitle'		=> 'Product Browser'
		);

		$data['content'] = $this->load->view('products/browser', $data, TRUE);

		$this->load->view('templates/master', $data);
	}
}
