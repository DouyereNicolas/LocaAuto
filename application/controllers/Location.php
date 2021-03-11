<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Location extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Location_Model");
		$this->load->helper('url_helper');
	}
	public function index()
	{
		if ((isset($_SESSION["dateStartLoc"]) && isset($_SESSION["dateEndLoc"])) || ($this->input->post("dateStart") != "" && $this->input->post("dateEnd") != "")) {
			$queryStart = "SELECT * from cars WHERE ";
			$queryBetween = "";

			if ($this->input->post("gearBox") != "") {
				$queryBetween = $queryBetween . 'cars.gearbox = "' . $this->input->post('gearBox') . '" AND ';
			};

			if ($this->input->post("carburant") != "") {
				$queryBetween = $queryBetween . 'cars.carburant = "' . $this->input->post('carburant') . '" AND ';
			};

			if ($this->input->post("nbPorte") != "") {
				$queryBetween = $queryBetween . 'cars.numberDoor = "' . $this->input->post('nbPorte') . '" AND ';
			};

			if ($this->input->post("nbPlace") != "") {
				$queryBetween = $queryBetween . 'cars.nbPlace = "' . $this->input->post('nbPlace') . '" AND ';
			};

			if ($this->input->post("dateStart")) {
				$dateStartLoc = $this->input->post("dateStart");
				$_SESSION['dateStartLoc'] = $this->input->post("dateStart");
			} else {
				$dateStartLoc = $_SESSION['dateStartLoc'];
			};
			if ($this->input->post("dateEnd")) {
				$dateEndLoc = $this->input->post("dateEnd");
				$_SESSION['dateEndLoc'] = $this->input->post("dateEnd");
			} else {
				$dateEndLoc = $_SESSION['dateEndLoc'];
			};

			if ($this->input->post("submit") == "luxe") {
				$queryStart = $queryStart . " cars.type='luxe' AND ";
			} else if ($this->input->post("submit") == "sportif") {
				$queryStart = $queryStart . " cars.type='sportif' AND ";
			} else if ($this->input->post("submit") == "suv") {
				$queryStart = $queryStart . " cars.type='suv' AND ";
			}

			$queryEnd = " cars.id_C NOT IN (SELECT cars.id_C FROM cars 
		INNER JOIN location on cars.id_C = location.id_cars
		WHERE (('" . $dateStartLoc . "'  BETWEEN location.dateStart AND location.dateEnd)
		OR ('" . $dateEndLoc . "' BETWEEN location.dateStart AND location.dateEnd)
		OR (location.dateStart BETWEEN '" . $dateStartLoc . "' AND '" . $dateEndLoc . "')
		OR (location.dateEnd  BETWEEN '" . $dateStartLoc . "' AND '" . $dateEndLoc . "')) AND (location.returnLoc = 0))";

			$data["carType"] = $this->Location_Model->getCar($queryStart . $queryBetween . $queryEnd);
		} else {
			$data["carType"] = "";
		}

		$this->load->view("Header");
		$this->load->view('Location', $data);
		$this->load->view('Footer');
	}

	public function acceptLoc()
	{
		$idLoc = $_GET["idLoc"];
		$this->Location_Model->updateLoc($idLoc);
		redirect(base_url() . "Administration");
	}
	public function returnCar()
	{
		$idLoc = $_GET["idLoc"];
		$this->Location_Model->updateRend($idLoc);
		redirect(base_url() . "Administration");
	}

	public function annulLoc()
	{
		$idLoc = $_GET["idLoc"];
		$this->Location_Model->updateLoc($idLoc);
		redirect(base_url() . "Administration");
	}

	public function supprLoc(){
		$idLoc = $_GET["idLoc"];
		$this->Location_Model->supprLoc($idLoc);
		redirect(base_url() . "Administration");
	}
}
