<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsor extends CI_Controller {
  function __construct(){
     parent::__construct();
    $this->load->model(array('aplicationModel'));//load testCrudmodel dari folder model
  }
  function home(){
  	$this->load->view('sponsor/home');	
  }
  function registerPage(){
  	$data['Industri'] = $this->aplicationModel->getAllIndustri();
  	$this->load->view("sponsor/login", $data);
  }
  function sponsorLogin(){
  	$cek = $this->aplicationModel->doLoginSponsor();

  	if($cek == true){
  		redirect('sponsor/home');
  	}
  		$this->session->set_flashdata('error','Username atau password yang anda masukan salah!');
  	redirect('sponsor/registerPage');
  }

  function sponsorRegister(){
  	$value=array(
  		'nama_sponsor'=>$_POST['nama_sponsor'],
  		'about_sponsor'=>$_POST['about_sponsor'],
  		'industri_ID'=>$_POST['industri_ID'],
  		'email'=>$_POST['email'],
  		'website'=>$_POST['website'],
  		'username'=>$_POST['username'],
  		'password'=>$_POST['password'],
  		'tgl_gabung'=>date("Y-m-d")
  		);

  	$insert = $this->aplicationModel->insertSponsor($value);

  	if($insert == true){
  		$this->session->set_flashdata('sukses','Berhasil, anda telah terdaftar, silahkan Login untuk melanjutkan!');
  	}else{
  		$this->session->set_flashdata('error','Kesalahan, Maaf, sepertinya ada Kesalahan sistem, coba beberapa saat lagi!');
  	}
  	$this->load->view('sponsor/login');
  }
  function detailSponsor($id){
  	$clause = array('idsponsor'=>$id);
  	$data['det'] = $this->aplicationModel->getSponsorByID($clause);

  	$this->load->view('aboutSponsor', $data);
  }
  function sponsorList(){
  	$data['List'] = $this->aplicationModel->getAllSponsor();

  	$this->load->view('sponsorList', $data);
  }
  function offer($id){
  	$sponsorClause = array('idsponsor'=>$id);
  	$spo = $this->aplicationModel->getSponsorByID($sponsorClause);
  	foreach ($spo->result_array() as $val) {
  		$industri = $val['industri_ID']	;
  	}
  	$clause = array('industri_ID'=>$industri);
  	$data['list'] = $this->aplicationModel->getProposalById($clause);
  	$this->load->view('sponsor/proposalList', $data);
  }
  function proposalDetail($idProp){
  	$clause = array('id_Proposal'=>$idProp);
  	$data['detail'] = $this->aplicationModel->getProposalById($clause);

  	$this->load->view('sponsor/proposalDetail', $data);
  }

  function approvePage($idProp, $idsponsor){
    $val = array('id_proposal'=>$idProp);
    $mem = $this->aplicationModel->getProposalById($val);
    foreach($mem->result_array() as $row){
      $id_member = $row['member_ID'];
    }
    $data['approve'] = array('idProp'=>$idProp, 'idsponsor'=>$idsponsor,'id_member'=>$id_member);

    $this->load->view('sponsor/approve', $data);
   }
   function doApprove(){
    $value = array(
      'proposal_ID'=>$_POST['proposal_ID'],
      'sponsor_ID'=>$_POST['idsponsor'],
      'pesan_sponsor'=>$_POST['pesan'],
      'status'=>'Accept'
      'tgl_buat'=>date("Y-m-d")
      );

    $insert = $this->aplicationModel->insertEvent($value);

    if($insert == true){
      $this->session->set_flashdata('sukses','Berhasil, Member akan segera menghubungi anda untuk kelanjutan.');
      redirect('sponsor/offer');
    }else{
      $this->session->set_flashdata('error','Maaf, ada kesalahan.');
      redirect('sponsor/approvePage');
    }
   }
}//end of class