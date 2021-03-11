<?php 
class Location_Model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function getAllCar(){
        $time = date("Y-m-d");
        $query="SELECT * FROM cars LEFT JOIN location ON cars.id = location.id_Cars WHERE (location.dateEnd <= '".$time."') OR ((location.id_cars IS NULL) OR (location.returnLoc = 1 && location.acceptLoc = 1))";
        $location = $this->db->query($query);
        return $location->result();
    }

    public function getCar($query){
        $car = $this->db->query($query);
        return $car->result();
    }

    public function getCarByType($type){ 

        $time = date("Y-m-d");
        $query = "SELECT * FROM cars LEFT JOIN location ON cars.id_C = location.id_Cars WHERE type='".$type."' AND ((location.dateEnd <= '".$time."') OR ((location.id_cars IS NULL) OR (location.returnLoc = 1 && location.acceptLoc = 1)))";
        $type = $this->db->query($query);
        return $type->result();
    }

    public function updateLoc($id){
        $result = $this->db->get_where("location",array("id"=>$id));
        $result = $result->result();
        var_dump($result);
        if($result[0]->acceptLoc == "0"){
            $this->db->where('id', $id);
            $this->db->update('location', array("acceptLoc" => "1"));
        }else{
            $this->db->where('id', $id);
            $this->db->update('location', array("acceptLoc" => "0"));
        }
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

    public function supprLoc($idLoc){
        $this->db->delete('location', array('id' => $idLoc));
    }
} 