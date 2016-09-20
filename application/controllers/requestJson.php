<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RequestJson extends CI_Controller {
  function __construct(){
     parent::__construct();
     $this->load->library(array('form_validation'));
    $this->load->model(array('aplicationModel'));//load testCrudmodel dari folder model
  }

  function getOfferNotif($id){
  	$sponsorClause = array(
      'idsponsor'=>$id
      );
  	$spo = $this->aplicationModel->getSponsorByID($sponsorClause);
  	foreach ($spo->result_array() as $val){
  		$industri = $val['industri_ID'];
  	}

  	$sql = "SELECT id_proposal from proposal where industri_ID = $industri AND status = 'Open' ";
  	$query=$this->db->query($sql);
  	$result= array("notif" => $query->num_rows());
    if($result == 0){
      $result = '';
    }
  	echo  json_encode($result) ;
  }

  function accProposal($id){
  	$sql = "SELECT id_proposal from proposal where member_ID = '$id' AND status = 'Negoisasi' ";
  	$query=$this->db->query($sql);
  	$result= array("notif" => $query->num_rows());

  	echo  json_encode($result) ;
  }
}