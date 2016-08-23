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
  
}