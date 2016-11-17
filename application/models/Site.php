<?php
if (session_id() == "") {
	session_start();
}

class Site extends CI_Model {
	public $siteName = 'Northwind';
}
