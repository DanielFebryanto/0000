<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  function __construct(){
     parent::__construct();
    $this->load->model(array('aplicationModel'));//load testCrudmodel dari folder model
  }
  function index(){
    if($this->session->has_userdata('userRole')){ //jika admin telah login
                redirect('admin/home');
        } else {
            redirect('admin/formLogin');
        }
  }
  function logout(){
    $sessionVal=array(
      'username',
      'email',
      'id',
      'password',
      'userRole'
      );
    $this->session->unset_userdata($sessionVal);

    redirect('admin/formLogin');
  }
  function home(){
    if($this->session->has_userdata('userRole')){ //jika admin telah login
                $this->load->view('admin/home');
        } else {
            redirect('admin/formLogin');
        }
  }
  function formLogin(){
    $this->load->view('admin/login');
  }
  function doLogin(){
    $act = $this->aplicationModel->doLoginAdmin();
    if($act == true){
      redirect('admin/home');
    }else{
      $this->session->set_flashdata('error','username atau password yang anda masukan salah');
      redirect('admin/formLogin');
    }
  }
  function formKategori(){
  	$this->load->view('admin/formKategori');
  }

  function formEditKategori($id){
    $clause = array('id_ke'=>$id);
    $data['list'] = $this->aplicationModel->getkategoriByClause($clause);
    $this->load->view('admin/formEditKategori', $data);
  }
  function editKategori(){
    $clause = array('id_ke'=>$_POST['id_ke']);
    $value = array(
      'nama_ke'=>$_POST['kategori'],
      );
    $insert = $this->aplicationModel->updateKategori($clause, $value);
    
    if($insert == true){
      $this->session->set_flashdata('sukses','Berhasil');
      redirect('admin/listKategori');
    }else{
      $this->session->set_flashdata('error','Gagal');
      redirect('admin/formKategori');
    }
  }
  function createKategori(){
    $value = array(
      'nama_ke'=>$_POST['kategori']
      );
    $insert = $this->aplicationModel->updateKategori($value);
    
    if($insert == true){
      $this->session->set_flashdata('sukses','Berhasil');
      redirect('admin/listKategori');
    }else{
      $this->session->set_flashdata('error','Gagal');
      redirect('admin/formKategori');
    }
  }
  function listKategori(){
    $data['list'] = $this->aplicationModel->getAllKategori();
  	$this->load->view('admin/kategoriList', $data);
  }
  function listIndustri(){
    $data['list'] = $this->aplicationModel->getAllIndustri();
    $this->load->view('admin/industriList', $data);
  }
  function formEditIndustri($id){
    $clause = array('id_si'=>$id);
    $data['list'] = $this->aplicationModel->getIndustriByClause($clause);
    $this->load->view('admin/formEditIndustri', $data);
  }
  function editIndustri(){
    $clause = array('id_si'=>$_POST['id_si']);
    $value = array(
      'nama_si'=>$_POST['industri']
      );
    $insert = $this->aplicationModel->updateIndustri($clause, $value);
    
    if($insert == true){
      $this->session->set_flashdata('sukses','Berhasil');
      redirect('admin/listIndustri');
    }else{
      $this->session->set_flashdata('error','Gagal');
      redirect('admin/formIndustri');
    }
  }

  function formIndustri(){
    $data['list'] = $this->aplicationModel->getAllIndustri();
    $this->load->view('admin/formIndustri');
  }

  function createIndustri(){
    $value = array(
      'nama_si'=>$_POST['industri']
      );

    $insert = $this->aplicationModel->insertIndustri($value);
    if($insert == true){
      $this->session->set_flashdata('sukses','Berhasil');
      redirect('admin/listIndustri');
    }else{
      $this->session->set_flashdata('error','Gagal');
      redirect('admin/formIndustri');
    }
  }

  function listMember(){
    $data['list'] = $this->aplicationModel->getAllMember();
    $this->load->view('admin/memberList', $data);
  }

  function listSponsor(){
    $data['list'] = $this->aplicationModel->getAllSponsor();
    $this->load->view('admin/sponsorList', $data);
  }

  function listAproved(){
    $data['list']=$this->aplicationModel->getAllEvent();
    $this->load->view('admin/eventList', $data);
  }

  function deleteKategori($id){
    $clause = array('id_ke'=>$id);

    if($del == true){
      $this->load->view('');
    }
  }
}