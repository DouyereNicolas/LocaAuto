<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Inscription_Model");
		$this->load->helper('url_helper');

	}
	
	public function index()
	{
        $this->load->view("Header");
		$this->load->view('Inscription');
		$this->load->view("Footer");
	}

	public function form_validation(){
		$this->load->library('form_validation');
		//$this->form_validation->set_message('required', '{field} doit etre remplis.');
		$this->form_validation->set_error_delimiters('<div class="errorFormInscription">', '</div>');

		$this->form_validation->set_rules('lastName', 'lastName', 'required',
        array('required' => "Le nom de famille doit etre renseigner"));
		$this->form_validation->set_rules('firstName', 'firstName', 'required',
        array('required' => "Le Prénom doit etre renseigner"));
		$this->form_validation->set_rules('login', 'login', 'required|is_unique[user.login]',
        array('required' => "Le Login doit etre renseigner","is_unique" => "Le Login est deja utiliser"));
		$this->form_validation->set_rules('pass', 'pass', 'required',
        array('required' => "le mot de passe doit etre renseigner"));
		$this->form_validation->set_rules('passConfirm', 'passConfirm', 'required|matches[pass]',
        array('required' => "La confirmation du mot de passe doit etre renseigner",'matches' => 'les deux mots de passe ne sont pas identique'));
		$this->form_validation->set_rules('email', 'email', 'required|is_unique[user.mail]|valid_email',
        array('required' => "L'email doit etre renseigner","is_unique" => "L'email est deja utiliser","valid_email" => "L'email n'a pas un bon format"));
		$this->form_validation->set_rules('adress', 'adress', 'required',
        array('required' => "L'adresse doit etre renseigner"));
		$this->form_validation->set_rules('city', 'city', 'required',
        array('required' => "La ville doit etre renseigner"));
		$this->form_validation->set_rules('zipCode', 'zipCode', 'required',
        array('required' => "Le code postal doit etre renseigner"));
		$this->form_validation->set_rules('licenceDate', 'licenceDate', 'required',
        array('required' => "La date d'obtention du permis doit etre renseigner"));

		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$user = array(
				"lastName" => $this->input->post("lastName"),
				"firstName" => $this->input->post("firstName"),
				"login" => $this->input->post("login"),
				"mail" => $this->input->post("email"),
				"adress" => $this->input->post("adress"),
				"city" => $this->input->post("city"),
				"zipCode" => $this->input->post("zipCode"),
				"licenseDate" => $this->input->post("licenceDate"),
				"id_levelUser" => "2",
			);
			$this->Inscription_Model->insertClient($user);
			$user = $this->Inscription_Model->getUserByLogin($this->input->post("login"));
			$userMdp = array("password" => $this->input->post("pass"),"id_user" => $user[0]->id);
			$this->Inscription_Model->insertMdp($userMdp);

			$this->session->set_userdata(array("login" => $this->input->post("login")));
			$this->session->set_userdata(array("password" => $this->input->post("pass")));
			
			redirect(base_url());
		}
	}
}