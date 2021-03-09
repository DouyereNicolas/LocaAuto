<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Location_Model");
		$this->load->helper('url_helper');

	}
	public function index()
	{
		//$data["type"] = $this->Location_Model->getCarByType("luxe");

		if(isset($_GET['type'])){
			$data["carType"] = $this->Location_Model->getCarByType($_GET['type']);
		}else{
			$data["carType"] = $this->Location_Model->getAllCar();
		}
        $this->load->view("Header");
		$this->load->view('Location',$data);
	}

	public function acceptLoc(){
		$idLoc = $_GET["idLoc"];
		$this->Location_Model->updateLoc($idLoc);
		redirect(base_url()."Administration");
	}
	public function returnCar(){
		$idLoc = $_GET["idLoc"];
		$this->Location_Model->updateRend($idLoc);
		redirect(base_url()."Administration");
	}
}
 