<?php 
class LocationCar_Model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }


    public function getCar($id){
        $query = "SELECT * from cars where id_C='".$id."'";
        $type = $this->db->query($query);
        return $type->result();
    }

    public function getUser(){
        $user = $this->db->get_where("user",array("login" => $_SESSION["login"]));
        return $user->result();
    }

    public function setLocCar(){
        $dataLoc = array(
            "dateStart" => $_SESSION["dateStartLoc"],
            "dateEnd" => $_SESSION["dateEndLoc"],
            "kilometersStart" => $_SESSION["KmStartCarLoc"],
            "priceLoc" => $_SESSION["priceLoc"],
            "returnLoc" => 0,
            "acceptLoc" => 0,
            "id_cars" => $_SESSION["idCarLoc"],
            "id_user" => $_SESSION["idUser"]
    );
		$this->db->insert("location", $dataLoc);
        $this->session->unset_userdata("dateStartLoc");
        $this->session->unset_userdata("dateEndLoc");
        $this->session->unset_userdata("KmStartCarLoc");
        redirect(base_url()."Administration");
	}

} 