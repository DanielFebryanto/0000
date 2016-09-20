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
/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////                                      BLOCK USER AUTH                                          /////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    function index(){
        if($this->session->has_userdata('nip')){ //jika admin telah login
                redirect('admin/home');
        } else {
            $this->load->view('admin/login');
        }
        
    }
    function asd(){
        $data=$this->admin_check();
        $data['title']='test calendar';
        $data['event']='';
        $getCal=$this->db->get('test_calender');
        foreach($getCal->result_array() as $row){
            
            $tgl=strftime("%y, %m, %d", strtotime($row["Tanggal"]));
            $dateExplode=explode(",", $tgl);
            $yearEvent=$dateExplode[0];
            $monthEvent=$dateExplode[1];
            $dateEvent=$dateExplode[2];
            //$tgl=date($row['Tanggal']);
            $data['dd']=''.date("$yearEvent,$monthEvent,d").' '.$yearEvent.'';
            $nama=$row['namaEven'];
            $data['event'] .="
            {
                            title: '$nama',
                            start: new Date(y, m, $dateEvent),
                            allday: true
                    },
            ";
        }
        $this->template->display_backEnd('admin/calenderTest',$data);
    }
    function home(){
        if($this->session->has_userdata('nip')){
            $data=$this->admin_check(); // get sessions variable from function admin_check
            $data['subTitle']=' Home ';
            $data['title']='Admin | Home';
            $data['content']='Mari Berkarya Lagi';
            $this->template->display_backend('admin/home',$data);
        } else{
            redirect('admin/form_login');
        }
    }
    function home2(){
        $data=$this->admin_check();
        $data['subTitle']=' Home ';
        $data['title']='Admin | Home';
        $data['content']='Mari Berkarya Lagi';
        $this->template->display_backend('admin/home2',$data);
    }
    
    function form_login(){
        if($this->session->has_userdata('nip')){ //jika admin telah login
                redirect('admin/home');
            
        } else {
            $this->load->view('admin/login');
        }
        
    }
    
    function admin_login(){
        $query=$this->admin_model->admin_auth();
        
        if($query){
            redirect('admin/home');
        } else {
            redirect('admin/form_login');
        }
    }
    
    function admin_check(){
        date_default_timezone_set('Asia/Jakarta');
        if($this->session->has_userdata('nip')){ //jika admin telah login
                $query=$this->db->get_where('employe',array('nip'=>$this->session->userdata('nip'))); //render user pic
                foreach($query->result_array() as $pic_row){
                    $data['user_pic']=$pic_row['pic'];
                }
                //get notification
                $row_notif=$this->jurnalis_model->get_message_notif(); //get notifications from from db
                $data['notif_row']='';
                $data['notif_message']='';
                // define sessions value into variable
                $user_nama_depan=ucwords($this->session->userdata('nama_depan'));
                $user_nama_belakang=ucwords($this->session->userdata('nama_belakang'));
                $data['username']="$user_nama_depan $user_nama_belakang";
                $data['nip']=$this->session->userdata('nip');
                $data['user_jabatan']=$this->session->userdata('jabatan');

                if($row_notif->num_rows() > 0){
                    $data['notif_row']=$row_notif->num_rows(); // display notif, if notif > 0
                    
                    foreach($row_notif->result_array() as $row){ // render notif data and display it on message notif
                        
                        $getDate=$row['notif_date'];
                        $selisih = time() - strtotime($getDate);

                        $detik = $selisih ;
                        $menit = round($selisih / 60 );
                        $jam = round($selisih / 3600 );
                        $hari = round($selisih / 86400 );
                        $minggu = round($selisih / 604800 );
                        $bulan = round($selisih / 2419200 );
                        $tahun = round($selisih / 29030400 );
                        
                        if ($detik <= 60) {
                            $ago=''.$detik.' Detik Yang lalu';
                        } else if ($menit <= 60) {
                            $ago=''.$menit.' menit Yang lalu';
                        } else if ($jam <= 24) {
                            $ago=''.$jam.' jam Yang lalu';
                        } else if ($hari <= 7) {
                            $ago=''.$hari.' hari Yang lalu';
                        } else if ($minggu <= 4) {
                            $ago=''.$minggu.' minggu Yang lalu';
                        } else if ($bulan <= 12) {
                            $data['ago']=''.$bulan.' Bulan Yang lalu';
                        } else {
                             $ago=''.$tahun.' Tahun Yang lalu';
                        }
                        
                        $get_sender=$this->db->get_where('employe',array('nip'=>$row['notif_from']));
                        foreach($get_sender->result_array() as $ro){
                        //html code for meesage notif in header.php
                        $data['notif_message'].='
                            <li>
                                        <a href="admin/read_mail">
                                            <span class="image">
                                        <img src="'.base_url().'/backend_images/'.$ro['pic'].'" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>'.$ro['jabatan'].'</span>
                                            <span class="time">'.$ago.'</span>
                                            </span>
                                            <span class="message"><b>
                                        '.$row['subject'].'
                                    </b></span>
                                        </a>
                                    </li>
                        ';
                    }
                    }
            }
            return $data;
    }else {
            redirect('admin/form_login');
        }
    }
    function logout(){
        $remove=array('nip','nama_depan','nama_belakang','jabatan','granted');
        $this->session->unset_userdata($remove);
        redirect('admin/form_login');
    }
    
    function profile(){
        $data=$this->admin_check(); // get sessions from function admin_check()
        $data['title']='Profile | Administrator';
        $data['form_edit']='';
        $pro=$this->admin_model->get_user_profile();
        foreach($pro as $row){
            //html tag for for Edit Profile in profile.php
            $data['form_edit'] .='
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="update_profile">

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        
                                            <input name="first_name" type="text" class="form-control has-feedback-left" id="inputSuccess2" value="'.$row['nama_depan'].'" title="First Name">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input name="last_name" type="text" class="form-control" id="inputSuccess3" title="Last Name" value="'.$row['nama_belakang'].'">
                                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input name="email" type="text" class="form-control has-feedback-left" id="inputSuccess4" title="Email Adress" value="'.$row['email'].'">
                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input name="contact" type="text" class="form-control" id="inputSuccess5" title="Phone" value="'.$row['contact'].'">
                                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input style="padding-left:45px;" title="Date of Birth" id="birthday" name="dob" class="date-picker form-control col-md-7 col-sm-6 col-xs-12" required="required" type="text" value="'.$row['dob'].'">
                                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="password" disabled="disabled" title="Go to Setting Menu To Change Your Password" class="form-control" id="inputSuccess3" value="'.$row['password'].'">
                                            <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                                        </div>
		                </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div style="float:right" class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
            ';
        }
        $this->template->display_backend('admin/profile',$data);
        
    }
    function update_profile(){
        $this->jurnalis_model->update_user_profile();// goto model to update profile preferences
        redirect('admin/profile'); //redirect to function profile after prpofile preferences updated.
    }
    function do_upload(){
        $this->load->library('encryption');
        
     $config =  array(
                  'file_name' => $this->session->userdata('nip'),
                  'upload_path'     => "./backend_images/",
                  'allowed_types'   => "gif|jpg|png|jpeg|pdf",
                  'overwrite'       => TRUE,
                  'max_size'        => "0",  // Can be set to particular file size
                  'max_height'      => "0",
                  'remove_spaces'   => false,
                  'max_width'       =>"0"
                ); 
        
				$this->load->library('upload', $config);
				if($this->upload->do_upload(gambar)){
                  //  $this->session->unset_userdata('pic');
                    $name=$config['file_name'];
                    $type=$_FILES['gambar']['type'];
					$this->jurnalis_model->update_picture($name,$type);
                    $this->session->set_flashdata('sukses','Profile Picture telah berhasil di update');
                    $this->admin_check();
					redirect('admin/profile',$data);
				}
				else
				{
				$this->session->set_flashdata('error','Profile Picture gagal di perbaharui');
				redirect('admin/profile', $data);
				}    
}
    /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////                                  END BLOCK USER AUTH                                          /////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    
    /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////                                      BLOCK JURNALIS                                          /////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    
    function jurnalis(){
        $data=$this->admin_check();
        $data['title']=' Admin | Jurnalis';
        $data['content']='Mari Berkarya Lagi';
        $data['table_name']='Tabel Jurnalis';
        $data['table_jurnalis']='';
        $query=$this->admin_model->get_jurnalis();
        foreach($query->result_array() as $row){
            
            $data['table_jurnalis'] .='
            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">'.ucwords($row['nama_depan']).' '.ucwords($row['nama_belakang']).'</td>
                                                <td class=" ">'.$row['email'].'</td>
                                                <td class=" ">'.$row['gender'].'</td>
                                                <td class=" ">'.$row['jabatan'].'</td>
                                                <td class=" last"><a href="#">View</a>
                                                </td>
                                            </tr>
            ';
        }
        $this->template->display_backEnd('admin/jurnalis',$data);
    }
    
    function add_jurnalis(){
        $this->admin_model->input_jurnalis();
        redirect('admin/jurnalis');
    }
   /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////                                  END BLOCK JURNALIS               /////////////////////////////////////////////////  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    
    /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////                                  BEGIN BLOCK KATEGORI               /////////////////////////////////////////////////  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    function kategori(){ //to rendering whole kategori data
        
        $data=$this->admin_check(); 
        $data['title']='Admin | Kategori';
        $data['content']='Mari Berkarya Lagi';
        $data['table_name']='Tabel Sub Kategori';
        $data['table_kategori']='';
        $data['kat_opt']='';
        $query=$this->admin_model->get_sub_kategori();
        foreach($query->result_array() as $row){
            $data['table_kategori'] .='
                                            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">'.$row['id_sub'].'</td>
                                                <td class=" ">'.$row['nama_sub_kategori'].'</td>
                                                <td class=" ">'.$row['nama_kategori'].' 
                                                </td>
                                                <td class=" ">'.$row['jml_artikel'].'</td>
                                                <td class=" last"><a href="#">View</a>
                                                </td>
                                            </tr>
            ';
        }
        $query_kat=$this->admin_model->get_kategori();
        foreach($query_kat->result_array() as $row){
            $data['kat_opt'] .='
            <option value="'.$row['id_kategori'].'">'.$row['nama_kategori'].'</option>
            ';
        }
        $this->template->display_backEnd('admin/kategori',$data);
    }
    
    function add_kategori(){
        $this->admin_model->insert_kat();
        
        redirect('admin/kategori');
    }
    function add_subKategori(){
        $this->admin_model->insert_subKat();
        
        redirect('admin/kategori');
    }
    
   /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////                                  END BLOCK KATEGORI                                          /////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    
/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////                                  BEGIN BLOCK ARTIKEL                                          /////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
   function un_verification(){
       $clause='BELUM';
       $query=$this->admin_model->get_artikel($clause);
       $data=$this->admin_check();
       $data['title']='Admin | Artikel';
       $data['content']='Mari Berkarya Lagi';
       $data['table_name']='Tabel Artikel';
       $data['table_artikel']='';
       foreach($query->result_array() as $row){
           $tgl=strftime("%b %d, %Y", strtotime($row['tgl_dibuat']));
           $nama_depan=ucwords($row['nama_depan']);
           $nama_belakang=ucwords($row['nama_belakang']);
           $data['table_th']='
            <tr>
                  <th>No</th>
                  <th>Judul Artikel</th>
                  <th>Jurnalis(s)</th>
                  <th>Kategori Range</th>
                  <th>Tanggal Dibuat</th>
                  <th>Verification</th>
                  <th>Action</th>
                </tr>
           ';
           $data['table_artikel'] .='
                                            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">'.$row['judul'].'</td>
                                                <td class=" ">'.$nama_depan.' '.$nama_belakang.'</td>
                                                <td class=" ">'.$row['nama_kategori'].' > '.$row['nama_sub_kategori'].'</td>
                                                <td class=" ">'.$tgl.'</td>
                                                <td class=" ">'.$row['verifikasi'].'</td>
                                                <td class=" last"><form action="'.base_url().'index.php/admin/preview_admin" method="post"><input type="hidden" name="id_artikel" value="'.$row['id_artikel'].'"> <button>View</button> </form>
                                                </td>
                                            </tr>
           ';
       }
       $this->template->display_backEnd('admin/artikel',$data);
   }
    function artikel(){
        $clause='SUDAH';
        $query=$this->admin_model->get_artikel($clause);
        $data=$this->admin_check();
        $data['title']='Admin | Artikel';
        $data['content']='Mari Berkarya Lagi';
        $data['table_name']='Tabel Artikel';
        $data['table_artikel']='';
        foreach($query->result_array() as $row){
            $tgl=strftime("%b %d, %Y", strtotime($row['tgl_dibuat']));
           $nama_depan=ucwords($row['nama_depan']);
           $nama_belakang=ucwords($row['nama_belakang']);
           
           $data['table_th']='
            <tr>
                  <th>No</th>
                  <th>Judul Artikel</th>
                  <th>Jurnalis(s)</th>
                  <th>Kategori Range</th>
                  <th>Tanggal Dibuat</th>
                  <th>Viewed</th>
                  <th>Action</th>
                </tr>
           ';
            
           $data['table_artikel'] .='
                                            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">'.$row['judul'].'</td>
                                                <td class=" ">'.$nama_depan.' '.$nama_belakang.'</td>
                                                <td class=" ">'.$row['nama_kategori'].' > '.$row['nama_sub_kategori'].'</td>
                                                <td class=" ">'.$tgl.'</td>
                                                <td class=" ">'.$row['viewed'].'</td>
                                                <td class=" last"><a href="'.base_url().'index.php/application/preview_admin">View</a>
                                                </td>
                                            </tr>
           ';
        }
        $this->template->display_backEnd('admin/artikel',$data);
    }
    function preview_admin(){
        $data=$this->admin_check();
        $prev_id=$this->input->post('id_artikel');
        $query=$this->admin_model->get_artikel_prev($prev_id);
        $data['title']='Admin | Preview';
        $data['content']='Preview Aritkel';
        foreach($query->result_array() as $row){
            $firstName=ucwords($row['nama_depan']);
                $lastName=ucwords($row['nama_belakang']);
                $depan_belakang="$firstName $lastName";
            $artikel_sessionValue=array(
                'sess_judul'=>ucwords($row['judul']),
                'sess_username'=>$depan_belakang,
                'sess_kategori'=>ucwords($row['nama_kategori']),
                'sess_sub_kategori'=>ucwords($row['nama_sub_kategori']),
                'sess_id_sub'=>$row['id_sub'],
                'sess_artikel'=>$row['artikel'],
                'sess_nip'=>$row['nip'],
                'sess_email'=>$row['email'],
                'sess_id_artikel'=>$row['id_artikel'],
                'sess_tgl_dibuat'=>$row['tgl_dibuat']
            );
            $this->session->set_userdata($artikel_sessionValue);
        }
        $this->template->display_backEnd('admin/preview',$data);
    }
    function confirm_artikel(){
        $this->admin_model->get_confirm();
        
        redirect('admin/un_verification');
    }
    function correction_artikel(){
        $this->admin_model->get_correction();
        
        redirect('admin/un_verification');
    }
    function admins(){
        
    }
    function seo(){
        
    }
    /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////                                  END BLOCK ARTIKEL                                          /////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////                                  BEGIN EMAIL BLOK                                          /////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    
    function mailbox(){
        $data=$this->admin_check();
        $data['title']='Email';
        $this->template->display_backEnd('admin/mailbox',$data);
    }
    function Compose_mail(){
        $data=$this->admin_check();
        $data['title']='Compose | Message';
        $this->template->display_backEnd('admin/compose',$data);
    }
    function read_mail($email){
        // Code here
    }
    /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////                                  END EMAIL BLOK                                          /////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
}