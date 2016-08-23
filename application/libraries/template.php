<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends CI_Controller{
    protected $_ci;
    function __construct(){
        $this->_ci= &get_instance();
    }
    
    function app_display($template, $data=null){
        $data['_content']=$this->_ci->load->view($template,$data, true);
        $data['_header']=$this->_ci->load->view('header',$data, true);
        $data['_sidebar']=$this->_ci->load->view('side_bar',$data, true);
       // $data['_footer']=$this->_ci->load->view('admin/footer',$data, true);
        $this->_ci->load->view('/template.php',$data);
    }

}