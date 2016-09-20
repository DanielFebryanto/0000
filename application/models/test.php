<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Model {

	function getAllMember(){
		$ldata = $this->db->get('member');
		return $data;
	}
}