<?php

class LoginSS extends CI_Model{
    function __construct(){
        //Call the Model Constructor
        parent::__construct();
    }
    
    function validUser($username, $pass){
        //$this->db->select('id, rut, password, role_id');
        $this->db->from('user');
        $this->db->where('username = "'.$username.'"');
        $this->db->where('password = "'.md5($pass).'"');        
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1){
            $data = array();
            
            $row = $query->row(0);
            
            $data['success'] = true;
            $data['hash'] = sha1($row->id.sha1($row->id.md5($pass)));
            $data['id'] = $row->id;
            //$data['role_id'] = $row->role_id;
            $data['fullname'] = $row->firstname.' '.$row->lastname;
        }
        else{
            $data['success'] = false;
        }

        return $data;
    }      
}
?>
