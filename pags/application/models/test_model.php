<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_model extends CI_Model {
   
    function load_data_model(){
        $query=$this->db->get('employe');
        return $query->result_array();
    }
   
}