<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	
	public function index()
	{
        $this->load->helper('url');
        $this->load->view("Header");
		$this->load->view('Accueil');
		$this->load->view('Footer');
	}

	public function deco(){
		session_destroy();
		redirect(base_url());
	}
}
