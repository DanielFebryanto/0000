<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AplicationModel extends CI_Model {
	function doLoginMember(){
		$cek = $this->db->get_where('member',array('username'=>$_POST['username'],'password'=>$_POST['password']));

		if($cek->num_rows() == 1){
			foreach ($cek->result_array() as $row) {
				$sessionVal = array(
					'username'=>$row['nama_member'],
					'id'=>$row['id_member'],
					'password'=>$row['password'],
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
				$sessionVal = array(
					'username'=>$row['username'],
					'id'=>$row['idsponsor'],
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

	 function insertKategori($value){
	 	$insert = $this->db->insert('kategori', $value);

	 	if($insert){
	 		return true;
	 	}else{
	 		return false;
	 	}
	 }
	function getAllkategori(){
		$kat = $this->db->get('kategori_event');

		return $kat;
	}
	function getAllIndustri(){
		$industri = $this->db->get('industri');

		return $industri;
	}
	
	function insertProposal($value){
	   $insert = $this->db->insert('proposal', $value);

	   if ($insert) {
	     return true;
	   }else {
	     return false;
	   }
	 }
	 
	 function getAllProposal(){
	 	$this->db->join('member','member.id_member=proposal.member_ID');
	 	$this->db->join('industri','industri.id_si=proposal.industri_ID');
	 	$this->db->join('kategori_event','kategori_event.id_ke=proposal.ke_ID');
	 	$list = $this->db->get_where('proposal');
	 	return $list;
	 }
	 
	 function pagingAllProposal($clause, $per_page, $offset){
	 	$this->db->select('*');
	 	$this->db->join('member','member.id_member = proposal.member_ID');
	 	$this->db->join('industri','industri.id_si = proposal.industri_ID');
	 	$this->db->join('kategori_event','kategori_event.id_ke = proposal.ke_ID');
	 	$link = $this->db->get('proposal', $per_page,$offset);

	 	return $link;
	 }

	 function pagingProposalById($clause, $per_page, $offset){
	 	$this->db->select('*');
	 	$this->db->join('member','member.id_member = proposal.member_ID');
	 	$this->db->join('industri','industri.id_si = proposal.industri_ID');
	 	$this->db->join('kategori_event','kategori_event.id_ke = proposal.ke_ID');
	 	$this->db->where($clause);
	 	$link = $this->db->get('proposal', $per_page,$offset);

	 	return $link;
	 }

	 function getProposalById($clause){
	 	$this->db->join('member','member.id_member=proposal.member_ID');
	 	$this->db->join('industri','industri.id_si=proposal.industri_ID');
	 	$this->db->join('kategori_event','kategori_event.id_ke=proposal.ke_ID');

	 	$list = $this->db->get_where('proposal',$clause);

	 	return $list;
	 }

	  function editProposal($clause,$value){
	  	$this->db->where($clause);
	    $upate = $this->db->update('proposal', $value);

	    if ($upate) {
	      return true;
	    }else {
	      return false;
	    }
	  }

	  function getAllSponsor(){
	  	$this->db->get_where('sponsor');
	  	$sponsor = $this->db->get('sponsor');
	  	return $sponsor;
	  }

	  function getSponsorByID($clause){
	  	$this->db->join('industri','sponsor.industri_ID = industri.id_si');
		$sponsor = $this->db->get_where('sponsor',$clause);

		return $sponsor;
	}
	function pagingSponsorById($clause, $per_page, $offset){
		$this->db->select('*');
		$this->db->where($clause);
		$this->db->join('industri','sponsor.industri_ID = industri.id_si');
		$sponsor = $this->db->get('sponsor', $per_page,$offset);

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

	function insertEvent($value){
	  	$insert = $this->db->insert('event',$value);

	  	if($insert){
	  		return true;
	  	}else{
	  		return false;
	  	}
	}
	function getAllEvent(){
		$this->db->join('proposal','proposal.id_proposal=event.proposal_ID');
		$this->db->join('sponsor','sponsor.idsponsor=event.sponsor_ID');
		$this->db->join('member','member.id_member=event.member_ID');
		$event = $this->db->get('event');

		return $event;
	}

	function getEventById($clause){
		$this->db->join('proposal','proposal.id_proposal=event.proposal_ID');
		$this->db->join('kategori_event','kategori_event.id_ke=proposal.ke_ID');
		$this->db->join('sponsor','sponsor.idsponsor=event.sponsor_ID');
		$this->db->join('member','member.id_member=event.member_ID');
		$event = $this->db->get_where('event',$clause);

		return $event;
	}
	function pagingEventById($clause, $per_page, $offset){
		$this->db->select('*');
		$this->db->where($clause);
		$this->db->join('proposal','proposal.id_proposal=event.proposal_ID');
		$this->db->join('sponsor','sponsor.idsponsor=event.sponsor_ID');
		$this->db->join('member','member.id_member=event.member_ID');
		$event = $this->db->get('event', $per_page,$offset);

		return $event;
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