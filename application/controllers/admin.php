<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  function __construct(){
     parent::__construct();
    $this->load->model(array('aplicationModel'));//load testCrudmodel dari folder model
  }
  function formKategori(){
  	$this->load->view('admin/formKategori');
  }

  function createKategori(){
    $value = array(
      'id_ke'=>$_POST['id_ke'],
      'nama_ke'=>$_POST['nama_ke']
      );
    $insert = $this->aplicationModel->insertKategori($value);
    
    if($insert == true){
      $this->session->set_flashdata('sukses','Berhasil');
      redirect('');
    }else{
      $this->session->set_flashdata('error','Gagal');
      redirect('');
    }
  }
  function listKategori(){
    $data['list'] = $this->aplicationModel->getAllKategori();
  	$this->load->view('admin/table');
  }

  function formIndustri(){
    $data['list'] = $this->aplicationModel->getAllIndustri();
    $this->load->view();
  }

  function createIndustri(){
    $value = array(
      'id_ke'=>$_POST['id_si'],
      'nama_ke'=>$_POST['nama_si']
      );

    $insert = $this->aplicationModel->insertKategori($value);
    if($insert == true){
      $this->session->set_flashdata('sukses','Berhasil');
      redirect('');
    }else{
      $this->session->set_flashdata('error','Gagal');
      redirect('');
    }
  }

  function listMember(){
    $data['list'] = $this->aplicationModel->getAllMember();
    $this->load->view('admin/tableMember', $data);
  }

  function listSponsor(){
    $data['list'] = $this->aplicationModel->getAllSponsor();
    $this->load->view('admin/tableSponsor', $data);
  }

  function listEvent(){
    $data['list']=>$this->aplicationModel->getAllEvent();
  }
}