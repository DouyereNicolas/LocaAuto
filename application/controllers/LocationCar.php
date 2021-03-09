<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocationCar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("LocationCar_Model");
		$this->load->helper('url_helper');

	}
	public function index()
	{
		$data["car"] = $this->LocationCar_Model->getCar($_GET['id']);
        $this->load->view("Header");
		$this->load->view('LocationCar',$data);
        $this->load->view("Footer");
	}
}
 