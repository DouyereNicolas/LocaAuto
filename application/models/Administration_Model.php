<?php 
class Administration_Model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function getUser($log){
        $user = $this->db->get_where("user",array("login" => $log));
        return $user->result();
    }

    public function getLocation($user){
        $location = $this->db->get_where("location",array("id_user" => $user));
        return $location->result();
    }

    public function getAllLocation(){
        $this->db->join("user","user.id = location.id_User","inner");
        $this->db->join("cars","cars.id = location.id_Cars","inner");
        $location = $this->db->get("location");
        return $location->result();
    }
}  