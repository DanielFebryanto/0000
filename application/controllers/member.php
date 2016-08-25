<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
  function __construct(){
     parent::__construct();
     $this->load->library(array(''));
    $this->load->model(array('aplicationModel'));//load testCrudmodel dari folder model
  }

  function index(){
  
    $this->load->view('index');
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

    redirect('member/index');
  }
  function loginMember(){
    $go = $this->aplicationModel->doLoginMember();

    if($go == true){
      redirect('member/index');
    }else{
      $this->session->set_flashdata('error','username atau password yang anda masukan salah');
      redirect('member/index');
    }
  }

  function registerMember(){
    $value = array(
      'nama_member'=>$_POST['nama_member'],
      'about_member'=>$_POST['about_member'],
      'email'=>$_POST['email'],
      'phone'=>$_POST['phone'],
      'website'=>$_POST['website'],
      'alamat'=>$_POST['alamat'],
      'username'=>$_POST['username'],
      'password'=>$_POST['password'],
      'tgl_gabung'=>date("Y-m-d")
      );

    $insert = $this->aplicationModel->insertMember($value);

    if($insert == true){
      $this->session->set_flashdata('sukses','Berhasil, Anda telah terdaftar, silahkan login untuk melanjutkan!');
    }else{
      $this->session->set_flashdata('error','Kesalahan, sepertinya ada kesalahan sistem... mohon maafa untuk ketidak nyamanan ini!');
    }
    $this->load->view('member/home');
  }
/*
  function cekRole(){
    if($this->session->userdata('username'){
      if($this->session->userdata('userRole') != 'Member'){

        return true;

      }
    }
  }
  */
  function home(){
    //$this->cekRole();
    $data['header']='hey dull';

    $this->load->view('member/home', $data);
  }
  function formProposal(){
    $data['Kat']= $this->aplicationModel->getAllkategori();
    $this->load->view('member/formProposal', $data);
  }
  function createProdposal(){
    $name= $_POST['tgl_mulai'];
    $namce= $_POST['tgl_selesai'];
    $type = $_FILES["dokumen"]["type"];
    $tgl=strftime("%Y-%m-%d", strtotime($namce));
    $jadinya = ''.$name.'.'.$type.'';
    echo $tgl;
    echo '<br> '.$namce.'';

  }
  function proposalList(){
    $this->load->view('member/test');
  }
  function do_upload(){
    $config =  array(
                  'file_name'       => $_POST['docName'],
                  'upload_path'     => "./docs/",
                  'allowed_types'   => "doc|docx|ppt|pptx|pdf",
                  'overwrite'       => TRUE,
                  'max_size'        => "0",  // Can be set to particular file size
                  'max_height'      => "0",
                  'remove_spaces'   => false,
                  'max_width'       =>"0"
                ); 
        
        $this->load->library('upload', $config);
        if($this->upload->do_upload(dokumen)){
                  //  $this->session->unset_userdata('pic');
                    $tgl_mulai=strftime("%Y-%m-%d", strtotime($_POST['tgl_mulai']));
                    $tgl_end=strftime("%Y-%m-%d", strtotime($_POST['tgl_selesai']));
                     $value = array(
                      'member_ID'=>1,//$this->session->userdata('id'),
                      'ke_ID'=>$_POST['ke_ID'],
                      'judul_proposal'=>$_POST['judul_proposal'],
                      'deskripsi'=>$_POST['deskripsi'],
                      'tgl_mulai'=>$tgl_mulai,
                      'tgl_selesai'=>$tgl_end,
                      'doc'=>$_POST['docName']
                      );

      $insert = $this->aplicationModel->insertProposal($value);

      if($insert == true){
        $this->session->set_flashdata('sukses','Proposal berhasil sisimpan.');
      redirect('member/proposalList');
      }else{
        $this->session->set_flashdata('error','Maaf ada kesalahan sistem');
        redirect('member/formProposal');
      }
          //$this->jurnalis_model->update_picture($name,$type);
          //return array('pic'=>$name.$type);

        }
  }

}//end of class member