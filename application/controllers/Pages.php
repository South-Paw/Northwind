<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Pages extends CI_Controller {
    public function index() {
    	account();
    }

	public function about() {
        $this->load->helper('url');

		$this->load->model('site');
		$this->load->model('session');

		$data = array(
			'loggedIn'		=> $this->session->loggedIn(),
            'title'			=> $this->site->siteName,
			'pageTitle'		=> 'About'
		);

        $data['content'] = $this->load->view('pages/about', $data, True);

        $this->load->view('templates/master', $data);
	}

	public function account() {
        $this->load->helper('url');

		$this->load->model('site');
		$this->load->model('session');

		$response = 'null';
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($username != False || $password != False) {
			$valid = $this->session->login($username, $password);

			if ($valid) {
				$response = 'success';
			} else {
				$response = 'failed';
			}
		}

		$logoutResponse = False;
		$logout = $this->input->post('logout');

		if ($logout == 1) {
			$logoutResponse = $this->session->logout();
		}

		if ($logoutResponse) {
			$response = 'loggedout';
		}

		$data = array(
			'response'		=> $response,
			'loggedIn'		=> $this->session->loggedIn(),
            'title'			=> $this->site->siteName,
			'pageTitle'		=> 'Account'
		);

        $data['content'] = $this->load->view('pages/account', $data, True);

        $this->load->view('templates/master', $data);
	}
}
