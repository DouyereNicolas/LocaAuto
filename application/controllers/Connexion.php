<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Connexion extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model("Connexion_Model");
        $this->load->helper('url_helper');
    }

    public function index()
    {
        if (isset($_SESSION["errorLogin"])) {
            $this->session->unset_userdata("errorLogin");
        }
        if (isset($_SESSION["errorPass"])) {
            $this->session->unset_userdata("errorPass");
        }
        if (isset($_SESSION["valueLog"])) {
            $this->session->unset_userdata("valueLog");
        }

        
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'login',
            'login',
            'required',
            array('required' => "Le login doit etre renseigner")
        );
        $this->form_validation->set_rules(
            'pass',
            'pass',
            'required',
            array('required' => "Le mot de passe doit etre renseigner")
        );

        if ($this->form_validation->run() == FALSE) {
            $_SESSION["errorLogin"] = form_error('login');
            $_SESSION["errorPass"] = form_error('pass');
            redirect(base_url() . $_SESSION['url']);
        } else {
            $data = array("login" => $this->input->post("login"), "password" => $this->input->post("pass"));
            $profil = $this->Connexion_Model->getUser($data);
            
            if (isset($profil[0])){
                $login = $profil[0]->login;
                $pass = $profil[0]->password;
                $this->session->set_userdata('login', $login);
                $this->session->set_userdata('password', $pass);
                redirect(base_url() . $_SESSION['url']);
            } else {
                $user = $this->Connexion_Model->testUser(array("login" => $this->input->post("login")));
                if($user == 0){
                    $_SESSION["errorLogin"] = "ce login n'existe pas";
                    $_SESSION["errorPass"] = "";
                    redirect(base_url() . $_SESSION['url']);
                }else{
                    $_SESSION["valueLog"] = $this->input->post("login");
                }

                $_SESSION["errorPass"] = "mot de passe incorrect";
                redirect(base_url() . $_SESSION['url']);
            }
        }
    }
}
