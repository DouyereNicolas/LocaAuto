<?php 
class Connexion_Model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function getUser($data){

        $this->db->join("password","user.id = password.id_User","inner");
        $user = $this->db->get_where("user",$data);
        return $user->result();
    }

    public function testUser($user){
        $test = $this->db->get_where("user",$user);
        $test = $test->result();
        if(isset($test[0])){
            return 1;
        }else{
            return 0;
        };
    }

    public function testPassword($pass){
        $test = $this->db->get_where("password",$pass);
        if(isset($test[0])){
            return 1;
        }else{
            return 0;
        };
    }

    public function testPass($user,$pass){

    }
} 