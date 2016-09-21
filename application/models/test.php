<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Model {

	function getAllMember(){
		//Select * from member
		$ldata = $this->db->get('member');
		return $data;
	}

	function getMemberByClause($clause){
		//Select * from member where kondisi
		$this->where($clause);
		$data = $this->db->get('member');
		return $data;
	}

	function joinTable(){
		//select * from proposal join member on member.id_member = proposal.member_ID
		$this->db->join('member','member.id_member = proposal.member_ID');
		$data = $this->db->get('proposal');
	}
}