<?php

class LoginModel extends CI_Model
{
    
    public function loginuser($email,$password){
        $this->db->where('email',$email);
        $this->db->where('password',$password);

        $result = $this->db->get('user');
        if($result->num_rows()==1){
            return $result->row(0);
        }else{
            return false;
        }   
    }
}