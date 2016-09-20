<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
BLOCK USER AUTH;
BLOCK EMPLOYE ;
BLOCK KATEGORI ;
BLOCK JURNALIS ;
BLOCK ARTIKEL ;
*/
class Admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->model('admin_model');
        date_default_timezone_set('Asia/Jakarta');
    }

}//end of Class