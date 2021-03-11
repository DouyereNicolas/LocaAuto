<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LocationCar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("LocationCar_Model");
		$this->load->helper('url_helper');
	}
	public function index()
	{
		$data["user"] = $this->LocationCar_Model->getUser();
		$data["car"] = $this->LocationCar_Model->getCar($_GET['id']);
		$data["date"] = $this->intervalDate();
		$_SESSION["idCarLoc"] = $data["car"][0]->id_C;
		$_SESSION["KmStartCarLoc"] = $data["car"][0]->kilometers;
		$_SESSION["idUser"] = $data["user"][0]->id_U;
		$_SESSION["priceLoc"] = $data["car"][0]->priceDay * $this->intervalDate();
		$this->load->view("Header");
		$this->load->view('LocationCar', $data);
		$this->load->view("Footer");
	}

	public function formLocCar()
	{
		$this->load->library('form_validation');

		if ($this->input->post("submit") == "valid") {

			$this->LocationCar_Model->setLocCar();

		} else if ($this->input->post("submit") == "annul") {
			$this->session->unset_userdata("dateStartLoc");
			$this->session->unset_userdata("dateEndLoc");
			redirect(base_url() . "location");
		} else if ($this->input->post("submit") == "modif") {
			redirect(base_url() . "location");
		} else {
			$this->index();
		}
	}

	public function intervalDate()
	{
		$datetime1 = new DateTime($_SESSION["dateStartLoc"]);
		$datetime2 = new DateTime($_SESSION["dateEndLoc"]);
		$interval = $datetime1->diff($datetime2);
		$interval =  $interval->format('%a');
		return $interval;
	}

	

}
