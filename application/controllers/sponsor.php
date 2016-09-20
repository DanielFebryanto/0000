<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsor extends CI_Controller {
  function __construct(){
     parent::__construct();
    $this->load->model(array('aplicationModel'));//load testCrudmodel dari folder model
  }
  function SponsorCheck(){
    $this->load->view();
  }
  function home(){
  	$this->load->view('sponsor/home');	
  }
  function registerPage(){
  	$data['Industri'] = $this->aplicationModel->getAllIndustri();
  	$this->load->view("sponsor/login", $data);
  }
  function sponsorLogin(){
  	$cek = $this->aplicationModel->doLoginSponsor();

  	if($cek == true){
  		redirect('sponsor/home');
  	}
  		$this->session->set_flashdata('error','Username atau password yang anda masukan salah!');
  	redirect('sponsor/registerPage');
  }

  function sponsorRegister(){
  	$value=array(
  		'nama_sponsor'=>$_POST['nama_sponsor'],
  		'about_sponsor'=>$_POST['about_sponsor'],
  		'industri_ID'=>$_POST['industri_ID'],
  		'email'=>$_POST['email'],
  		'website'=>$_POST['website'],
  		'username'=>$_POST['username'],
  		'password'=>$_POST['password'],
  		'tgl_gabung'=>date("Y-m-d")
  		);

  	$insert = $this->aplicationModel->insertSponsor($value);

  	if($insert == true){
  		$this->session->set_flashdata('sukses','Berhasil, anda telah terdaftar, silahkan Login untuk melanjutkan!');
  	}else{
  		$this->session->set_flashdata('error','Kesalahan, Maaf, sepertinya ada Kesalahan sistem, coba beberapa saat lagi!');
  	}
  	$this->load->view('sponsor/login');
  }
  function detailSponsor($id){
  	$clause = array('idsponsor'=>$id);
  	$data['det'] = $this->aplicationModel->getSponsorByID($clause);

  	$this->load->view('aboutSponsor', $data);
  }
  
  function proposalDetail($idProp){
  	$clause = array('id_Proposal'=>$idProp);
  	$data['detail'] = $this->aplicationModel->getProposalById($clause);

  	$this->load->view('sponsor/proposalDetail', $data);
  }

  function offer($offset = 0){
    $id = $this->session->userdata('id');

    $sponsorClause = array(
      'idsponsor'=>$id
      );
    $count = $this->aplicationModel->getSponsorByID($sponsorClause);
    foreach ($count->result_array() as $val){
      $industri = $val['industri_ID'];
    }

    $clause = array(
      'industri_ID'=>$industri,
      'status'=>'Open'
      );
    $per_page = 2;
    $jml = $this->aplicationModel->getProposalById($clause);
    $url=base_url().'sponsor/offer';
    $data['pagination']=$this->pagination($url, $per_page, $jml);
    $data['offset'] = $offset;
    $data['list'] = $this->aplicationModel->pagingProposalById($clause, $per_page, $data['offset']);

    $this->load->view('sponsor/proposalList', $data);
  }

  function proposalDisetujui($offset = 0){
    $clause = array(
      'sponsor_ID'=>$this->session->userdata('id')
      );
    $per_page = 5;
    $url=base_url().'sponsor/proposalDisetujui';
    $jml = $this->aplicationModel->getEventByID($clause);
    $data['pagination']=$this->pagination($url, $per_page, $jml);
    $data['offset'] = $offset;
    $data['list'] = $this->aplicationModel->getEventByID($clause, $per_page, $data['offset']);
    $this->load->view('sponsor/proposalList', $data);
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
  function approvePage($idProp, $idsponsor){
    $val = array('id_proposal'=>$idProp);
    $mem = $this->aplicationModel->getProposalById($val);
    foreach($mem->result_array() as $row){
      $id_member = $row['member_ID'];
    }
    $data['id_proposal'] = $idProp;
    $data['idsponsor'] = $idsponsor;
    $data['id_member'] =$id_member;

    $this->load->view('sponsor/approve', $data);
   }
   function doApprove(){
    $value = array(
      'proposal_ID'=>$_POST['proposal_ID'],
      'sponsor_ID'=>$_POST['idsponsor'],
      'member_ID'=>$_POST['id_member'],
      'pesan_sponsor'=>$_POST['message'],
      'status'=>'Accept',
      'tgl_buat'=>date("Y-m-d")
      );

    $insert = $this->aplicationModel->insertEvent($value);

    if($insert == true){
      $value =array('status'=>'Negoisasi');
      $clause = array('id_proposal' => $_POST['proposal_ID']);
      $this->aplicationModel->editProposal($clause,$value);
      $this->session->set_flashdata('sukses','Berhasil, Member akan segera menghubungi anda untuk kelanjutan.');
      redirect('sponsor/offer');
    }else{
      $this->session->set_flashdata('error','Maaf, ada kesalahan.');
      redirect('sponsor/approvePage');
    }
   }
}//end of class