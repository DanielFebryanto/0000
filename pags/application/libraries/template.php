<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends CI_Controller{
    protected $_ci;
    function __construct(){
        $this->_ci= &get_instance();
    }
    
    function userTemp($template, $data=null){
        $data['_content']=$this->_ci->load->view($template,$data, true);
        $data['_header']=$this->_ci->load->view('header',$data, true);
        $data['_sidebar']=$this->_ci->load->view('sidebar',$data, true);
        $data['_footer']=$this->_ci->load->view('footer',$data, true);
        $this->_ci->load->view('/template.php',$data);
    }
    
    function adminTemp($template, $data=null){
        $data['_admContent']=$this->_ci->load->view($template,$data, true);
        $data['_admHeader']=$this->_ci->load->view('adminHeader',$data, true);
        $data['_admSidebar']=$this->_ci->load->view('adminSideBar',$data, true);
        $data['_admFooter']=$this->_ci->load->view('adminFooter',$data, true);
        $this->_ci->load->view('/adminTemplate.php',$data);
    }
    
    function jurnalisTemp($template, $data=null){
        $data['_content']=$this->_ci->load->view($template,$data, true);
        $data['_header']=$this->_ci->load->view('jurnalis/header',$data, true);
        $data['_sidebar']=$this->_ci->load->view('jurnalis/sidebar',$data, true);
        $data['_footer']=$this->_ci->load->view('jurnalis/footer',$data, true);
        $this->_ci->load->view('/jurnalis/template.php',$data);
    }
}