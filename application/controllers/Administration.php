<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Administration_Model");
		$this->load->helper('url_helper');

	}

	public function index()
	{

		$data["user"] = $this->Administration_Model->getUser($_SESSION["login"]);
		if($data["user"][0]->id_levelUser == 1){
			$data["location"] = $this->Administration_Model->getAllLocation();
			$this->load->view("Header");
			$this->load->view('Administration_Admin',$data);
			$this->load->view("Footer");
		}else{
			$data["location"] = $this->Administration_Model->getLocation($data["user"][0]->id_U);
			$this->load->view("Header");
			$this->load->view('Administration_User',$data);
			$this->load->view("Footer");
		}

		
	} 

}
 