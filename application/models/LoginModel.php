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
        $q = "INSERT INTO `user`(`name`, `nomor_rekening`, `email`, `password`, `address`, `type`) VALUES ('$data->name','$data->norek','$data->email','$data->password','$data->address',$data->0)";
        $r = $this->db->query($q);
        if($r){
            return True;
        }else{
            return False;
        }
    }
}