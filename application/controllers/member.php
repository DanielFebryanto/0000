<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
  function __construct(){
          parent::__construct();
          $this->load->library(array('template'));
          $this->load->model(array('homeModel'));//load testCrudmodel dari folder model
      }

      function index(){
      	$data['header']='';
      	$this->template->memberDisplay("", $data);
      }
  }