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

    public function regisuser($data){


        $name = $data['name'];
        $norek = $data['norek'];
        $email = $data['email'];
        $password = $data['password'];
        $addr = $data['address'];

        $this->db->where('email',$email);
        
        $result = $this->db->get('user');
        if($result->num_rows()==0){
            $q = "INSERT INTO `user`(`name`, `nomor_rekening`, `email`, `password`, `address`, `type`) VALUES ('$name','$norek','$email','$password','$addr',0)";
            $r = $this->db->query($q);
            if($r){
                return True;
            }else{
                return False;
            }
        }else{
            return FALSE;
        }
        
    }

    public function getalluser(){
        $result = $this->db->get('user');
        return $result->result_array();
    }
}