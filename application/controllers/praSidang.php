<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PraSidang extends CI_Controller {
  function __construct(){
     parent::__construct();
    $this->load->model(array('aplicationModel'));//load testCrudmodel dari folder model
  }

  function tampilProposal(){

  	$data['tampil'] = 'Ini Dari Controller';

  	$data['kat'] = $this->aplicationModel->getAllkategori();
  	$this->load->view('praSidang/test', $data);
  }

  function tampilMember(){
  	$data['Header'] = 'Tampil Member';

  	$data['list'] = $this->aplicationModel->getAllmember();

  	$this->load->view('test/tampilmember', $data);
  }

}