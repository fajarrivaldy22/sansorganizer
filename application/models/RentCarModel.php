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

    }