<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
  function __construct(){
     parent::__construct();
     $this->load->library(array('form_validation','pagination'));
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
    $config = array(
            array(
                    'field' => 'username',
                    'label' => 'User Name',
                    'rules' => 'required|min_length[5]|is_unique[member.username]',
                    'errors'=>array(
                        'required'=>'<p class="text-red">%s tidak boleh Kosong</p>',
                        'min_length'=>'<p class="text-red">%s Minimal 5 Karakter</p>',
                        'is_unique'=>'<p class="text-red">Username '.set_value('username').' Sudah Ada</p>',
                        )
            ),
            array(
              ''
              ),
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('error', ''.validation_errors().'');
          redirect('member/index');
        }else{
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
          $this->session->set_flashdata('error','Berhasil, Anda telah terdaftar, silahkan login untuk melanjutkan!');
        }else{
        $this->session->set_flashdata('error','Kesalahan, sepertinya ada kesalahan sistem... mohon maafa untuk ketidak nyamanan ini!');
        }      
      }
    
    $this->load->view('member/home');
  }
// # BELUM # //
  function myProfile(){
    $clause = array('id_member'=>$this->session->userdata('id'));

    $data['list'] = $this->aplicationModel->getMemberById($clause);

    $this->load->view('member/myProfile', $data);
  }

  function formEditProfile($id){
    $clause = array('id_member'=>$id);
    
    $this->load->view('member/formEditProfile');

  }
  
  function home(){
    //$this->cekRole();
    $data['header']='hey dull';

    $this->load->view('member/home', $data);
  }
  function formProposal(){
    $data['Kat']= $this->aplicationModel->getAllkategori();
	   $data['ind'] = $this->aplicationModel->getAllIndustri();
    $this->load->view('member/formProposal', $data);
  }

  function formEditProposal($idProp){
    $clause = array(
      'id_proposal'=>$idProp
      );
    $data['Kat']= $this->aplicationModel->getAllkategori();
    $data['ind'] = $this->aplicationModel->getAllIndustri();
    $data['edit'] = $this->aplicationModel->getProposalById($clause);

    $this->load->view('member/formEditProposal', $data);
  }

  function editProposal(){
    //  $this->session->unset_userdata('pic');
    $tgl_mulai=strftime("%Y-%m-%d", strtotime($_POST['tgl_mulai']));
    $tgl_end=strftime("%Y-%m-%d", strtotime($_POST['tgl_selesai']));
    $clause = array('id_proposal' => $_POST['idProp']);
    $value = array(
                      'ke_ID'=>$_POST['ke_ID'],
                      'industri_ID'=>$_POST['industri_ID'],
                      'judul_proposal'=>$_POST['judul_proposal'],
                      'deskripsi'=>$_POST['deskripsi'],
                      'project_manajer'=>$_POST['project_manajer'],
                      'tgl_mulai'=>$tgl_mulai,
                      'tgl_selesai'=>$tgl_end
                      );
    $insert = $this->aplicationModel->editProposal($clause, $value);

    if($insert == true){
        $this->session->set_flashdata('sukses','Proposal berhasil sisimpan.');
        redirect('member/proposalList');
    }else{
        $this->session->set_flashdata('error','Maaf ada kesalahan sistem');
        redirect('member/formEditProposal');
    }     
  }
  function sponsorList(){
    $data['List'] = $this->aplicationModel->getAllSponsor();

    $this->load->view('sponsorList', $data);
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
  function proposalDetail($idProp){
    $clause = array('id_Proposal'=>$idProp);
    $data['detail'] = $this->aplicationModel->getProposalById($clause);

    $this->load->view('member/detailProposal', $data);
  }
  function ApproveDetail($idProp){
    $clause = array('id_Proposal'=>$idProp);
    $data['detail'] = $this->aplicationModel->getEventById($clause);

    $this->load->view('member/proposalAprove', $data);
  }

  function proposalList(){
    $clause = array('member_ID'=>$this->session->userdata('id'));
    $data['list'] = $this->aplicationModel->getProposalById($clause);
    $this->load->view('member/myProposal', $data);
  }
  
  function approvedList(){
    $clause = array(
      'event.member_ID'=>$this->session->userdata('id'),
      'event.status'=>'Accept'
      );
    $data['list'] = $this->aplicationModel->getEventById($clause);
    $this->load->view('member/companyAcc', $data);
  }

  function pagination($url, $per_page, $jml){
    $config['base_url']= $url;
    $config['total_rows']=$jml->num_rows();
    $config['per_page']=$per_page;
    $config['uri_segment']=3;
    
    //pagination class
    $config['full_tag_open']='<ul class="pagination">';
    $config['full_tag_close']='</ul>';
    $config['num_tag_open']='<li class="waves-effect">';
    $config['num_tag_close']='</li>';
    $config['cur_tag_open']='<li class="active"><a href="#!"></a>';
    $config['cur_tag_close']='</li>';
    $config['next_tag_open'] = '<li class="waves-effect"><a href="#!"><i class="material-icons"></i></a>';
    $config['next_tagl_close'] = '</li>';
    $config['prev_tag_open']='<li><a href="#!"><i class="material-icons"></i></a>';
    $config['prev_tag_close']='</li>';
    $config['first_tag_open']='<li class="waves-effect">';
    $config['first_tag_close']='</li>';
    //$config['last_tag_open']='<li class="waves-effect">';
    //$config['last_tag_close']='</li>';
    $this->pagination->initialize($config);
    $link=$this->pagination->create_links();

    return $link;
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
        if($this->upload->do_upload('dokumen')){
                  //  $this->session->unset_userdata('pic');
                    $tgl_mulai=strftime("%Y-%m-%d", strtotime($_POST['tgl_mulai']));
                    $tgl_end=strftime("%Y-%m-%d", strtotime($_POST['tgl_selesai']));
                     $value = array(
                      'member_ID'=>$this->session->userdata('id'),
                      'ke_ID'=>$_POST['ke_ID'],
                      'industri_ID'=>$_POST['industri_ID'],
                      'judul_proposal'=>$_POST['judul_proposal'],
                      'deskripsi'=>$_POST['deskripsi'],
                      'project_manajer'=>$_POST['project_manajer'],
                      'tgl_mulai'=>$tgl_mulai,
                      'tgl_selesai'=>$tgl_end,
                      'status'=>'Open',
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