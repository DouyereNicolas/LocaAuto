<?php 
class Location_Model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function getAllCar(){
        $query = "select * from cars";
        $cars = $this->db->query($query);
        return $cars->result();
    }

    public function getCar($id){
        
    }

    public function getCarByType($type){
        $query = "SELECT * from cars where type='".$type."'";
        $type = $this->db->query($query);
        return $type->result();
    }

    public function updateLoc($id){
        $this->db->where('id', $id);
        $this->db->update('location', array("acceptLoc" => "1"));
    }

    public function updateRend($id){
        $result = $this->db->get_where("location",array("id"=>$id));
        $result = $result->result();
        if($result[0]->returnLoc == "0"){
            $this->db->where('id', $id);
            $this->db->update('location', array("returnLoc" => "1"));
        }else{
            $this->db->where('id', $id);
            $this->db->update('location', array("returnLoc" => "0"));
        }
        
    }
} 