<?php
    class RentCarModel extends CI_Model{
        
        public function fetchvehicle(){
            $carData = $this->db->get('product');
            return $carData->result_array();
        }

        public function fetchdataspec($id){
            $this->db->where('id_product',$id);

            $result = $this->db->get('product');
            if($result->num_rows()==1){
                return $result->row(0);
            }else{
                return false;
            }
        }

        function order($data){
            $idpro = $data['id_product'];
            $idusr = $data['id_user'];
            $total = $data['total'];
            $status = $data['status'];

            $q = "INSERT INTO `transaction`(`Id_product`, `id_user`, `total`, `status`) VALUES ($idpro,$idusr,$total,'$status');";
            $query = $this->db->query($q);
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        function gettransaction($iduser){
            $q = "SELECT * FROM transaction WHERE id_user=$iduser";
            $query = $this->db->query($q);

            if($query){
                return $query->result_array();
            }else{
                return False;
            }
        }

    }