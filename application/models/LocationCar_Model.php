<?php 
class LocationCar_Model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }


    public function getCar($id){
        $query = "SELECT * from cars where type='".$id."'";
        $type = $this->db->query($query);
        return $type->result();
    }

} 