<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {


  function registerInsert($value)
  {
    $insert = $this->db->insert('member', $value);

    if ($insert) {
      return true;
    }else {
      return false;
    }
  }

  function memberLogin(){
    $check = $this->db->select_where('member', $value);

    if ($check->num_rows() > 0) {
      foreach ($check->result_array() as $row) {
        $value = array('username'=>$row['nama'],'password'=>$row['password'],'userid'=>$row['id_member']);
        $this->session->set_userdata($value);
      }
      return true;
    }
    return false;

  }


}
