<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  function __construct(){
          parent::__construct();
          //$this->load->library(array('template'));
          $this->load->model(array('homeModel'));//load testCrudmodel dari folder model
      }
  public function index()
  {
    $this->load->view("index");
  }
  function testRegis(){
      $value = array('nama'=>$_POST['nama']);
      $this->homeModel->registerInsert($value);
    }
  function loginMember(){
    $value = array('username'=>$_POST['username'],'password'=>$_POST['password']);
    $oper = $this->homeModel->memberLogin($value);
    if($oper == true){
      $this->load->view("index");
    }else {
      $this->session->set_flashdata("errror","Username Password salah");
      $this->load->view("index");
    }
  }
}
