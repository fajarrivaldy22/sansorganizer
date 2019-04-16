<?php
    class RentCarModel extends CI_Model{
        
        public function fetchvehicle(){
            $carData = $this->db->get('product');
            return $carData->result_array();
        }

    }