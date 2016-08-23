<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicationModel extends CI_Model {
	function doLoginMember(){
		$cek = $this->db->get_where('member',array('username'=>$_POST['username'],'password'=>$_POST['password']));

		if($cek->num_rows() == 1){
			foreach ($cek->result_array() as $row) {
				$sessionVal = arra(
					'username'=>$row['username'],
					'password'=>$row['passeord'],
					'email'=>$row['email'],
					'userRole'=>'Member'
					);
				$this->session->set_userdata($sessionVal);
				return true;
			}
		}else{
			return false;
		}
	}

	function doLoginSponsor(){
		$cek = $this->db->get_where('sponsor',array('username'=>$_POST['username'],'password'=>$_POST['password']));

		if($cek->num_rows() == 1){
			foreach ($cek->result_array() as $row) {
				$sessionVal = arra(
					'username'=>$row['username'],
					'password'=>$row['passeord'],
					'email'=>$row['email'],
					'userRole'=>'Sponsor'
					);
				$this->session->set_userdata($sessionVal);
				return true;
			}
		}else{
			return false;
		}
	}

	function getMemberByID($clause){
		$member = $this->db->get_where('member',$clause);

		return $member;
	}

 	 function insertMember($value){
    	$insert = $this->db->insert('member', $value);

	    if ($insert) {
	      return true;
	    }else {
	      return false;
	    }
	 }

	 //getProposalByID()

	  function insertProposal($value){
	    $insert = $this->db->insert('proposal', $value);

	    if ($insert) {
	      return true;
	    }else {
	      return false;
	    }
	  }

	  function editProposal(,$clause,$value){
	  	$this->db->where($clause)
	    $upate = $this->db->upate('proposal', $value);

	    if ($upate) {
	      return true;
	    }else {
	      return false;
	    }
	  }

	  function getSponsorByID($clause){
	  	$this->db->join('industri','sponsor.industriID == industri.idIndustri');
		$sponsor = $this->db->get_where('sponsor',$clause);

		return $sponsor;
	}

	  function insertSponsor($value)
	  {
	    $insert = $this->db->insert('sponsor', $value);

	    if ($insert) {
	      return true;
	    }else {
	      return false;
	    }
	  }

	function createEvent($value){
	  	$insert = $this->db->insert('event',$value);

	  	if($insert){
	  		return true;
	  	}else{
	  		return false;
	  	}
	}
	  	function upateEvent($clause, $value){
	  		$this->db->where($clause);
	  		$update = $this->db->update('event',$value);

	  		if($update){
	  			return true;
	  		}
	  		return false;
	  	}

}//end class