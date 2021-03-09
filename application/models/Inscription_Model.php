<?php 
class Inscription_Model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function insertClient($user){

        $this->db->insert("user",$user);
    }

    public function insertMdp($userMdp){

        $this->db->insert("password",$userMdp);
    }

    public function getUserByLogin($log){
        $user = $this->db->get_where("user",array("login" => $log));
        return $user->result();
    }
} 