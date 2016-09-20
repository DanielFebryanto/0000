<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* FUNCTION ON THIS FILE */
/*

*/
class Jurnalis_model extends CI_Model {
    
    function jurnalis_auth(){
        $this->db->where('email',$this->input->post('email'));
        $this->db->where('password',$this->input->post('password'));
        $this->db->where('Jabatan','Jurnalis');
        $query=$this->db->get('employe');
        
        if($query->num_rows() == 1){
            foreach($query->result() as $row){
                $data=array(
                    'nip' => $row->nip,
                    'nama_depan' => $row->nama_depan,
                    'nama_belakang' => $row->nama_belakang,
                    'jabatan' => $row->jabatan,
                    'granted' =>'YES'
                );
                $this->session->set_userdata($data);
                return true;
            }
            
        } else{
            $this->session->set_flashdata('error','Username Atau Pass yang anda masukan salah');
            return false;
        }
    }
    
    /*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////             END AUTH MODEL       ///////////////////////////////////////////////////////////////////// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    
/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////             END AUTH MODEL       ///////////////////////////////////////////////////////////////////// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    function get_pic(){
        $query=$this->db->get_where('employe',array('nip',$this->session->userdata('nip')));
        
            return $query->result() ;
            
    }
   function ambil_kategori(){
       $query=$this->db->get('kategori');
       if($query->num_rows()>0){
           /*
		foreach ($query->result_array() as $row)
			{
				$result['-']= 'Pilih Kategori';
				$result[$row['id_kategori']]= ucwords(strtolower($row['nama_kategori']));
			}*/
			return $query->result_array();
		}
   }
    
    function ambil_sub_kategori($kdkat){
        $this->db->where('id_kategori',$kdkat);
        $render=$this->db->get('sub_kategori');
        if($render->num_rows()>0){

            foreach ($render->result_array() as $row)
            {
                $result[$row['id_sub']]= ucwords(strtolower($row['nama_sub_kategori']));
            }
            } else {
               $result['-']= '- Belum Ada Sub Kategori -';
            }
            return $result;
    }
    /*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////             END AUTH MODEL       ///////////////////////////////////////////////////////////////////// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    function setup_preview(){
        $query=$this->db->get_where('artikel',array(
            'id_sub'=>$this->input->post('sub_kayegori'),
            'judul'=>$this->input->post('judul')
        ));
        if($query->num_rows() > 0){  
            $this->session->set_flashdata('error','Artikel Tersebut Sudah Prnah Di Tulis Sebelumnya!!!');
        } else { 
            $this->db->select('*');
            $this->db->from('sub_kategori');
            $this->db->where('id_sub',$this->input->post('sub_kategori'));
            $this->db->join('kategori','kategori.id_kategori=sub_kategori.id_kategori');
            $find=$this->db->get('');
            
            if($find->num_rows() > 0){
                foreach($find->result_array() as $row){
                    $session_prev=array(
                        'id_kategori'=>$this->input->post('kategori'),
                        'nama_kategori'=>$row['nama_kategori'],
                        'sub_kategori'=>$row['nama_sub_kategori'],
                        'id_sub'=>$this->input->post('sub_kategori'),
                        'creator'=>$this->session->userdata('nip'),
                        'judul'=>$this->input->post('judul'),
                        'tgl_dibuat'=>date('y-M-d'),
                        'artikel'=>$this->input->post('artikel')
            );
            $this->session->set_userdata($session_prev);
                }
            }
            
        }
        return;
    }
    function notif($notif_from,$notif_to, $subject, $message){
        date_default_timezone_set('Asia/Jakarta');
        $notif_value=array(
            'notif_from'=>$notif_from,
            'notif_to'=>$notif_to,
            'subject'=>$subject,
            'message'=>$message,
            'viewed'=>'0'
        );
        $insert_notif=$this->db->insert('notif',$notif_value);
        return;
    }
    function model_masukan_artikel(){
        /* 
            id_artikel  _AI
            id_kategori
            id_sub
            nip
            judul
            tgl_dibuat
            artikel
            view
        */
        $query=$this->db->get_where('artikel', array(
            'judul'=>$this->input->post('judul'),
            'id_sub'=>$this->input->post('sub_kategori')
        ));
        if($query->num_rows()>0){
            $this->session->set_flashdata('error','Artikel Tersebut Sudah Prnah Di Tulis Sebelumnya!!!'); 
        } else{
            $data_insert= array(
                'id_kategori'=>$this->session->userdata('id_kategori'),
                'id_sub'=>$this->session->userdata('id_sub'),
                'nip'=>$this->session->userdata('nip'),
                'judul'=>$this->session->userdata('judul'),
                'tgl_dibuat'=>date('y-m-d'),
                'artikel'=>$this->session->userdata('artikel'),
                'verifikasi'=>'BELUM',
                'viewed'=>'0'
            );
            $insert_art=$this->db->insert('artikel',$data_insert);
            $notif_from='AUTO NOTIF';
            $notif_to=$this->session->userdata('nip');
            $subject='Artikel Saved';
            $message='Your Artikel With Title '.$this->session->userdata('judul').' has been Saved. <br/>We will Preview Your article within 72 hours<br/> Regrads Administrator.';
            $notif_send=$this->notif($notif_from,$notif_to, $subject, $message);
            if($insert_art){
                $end_preview=array('id_kategori','id_sub','judul','tgl_dibuat','artikel','creator','nama_kategori','sub_kategori');
                $this->session->unset_userdata($end_preview);
                
            } else {
                $this->session->set_flashdata('error','Ada Kesalahan Hubungi Admin atau Teknisi agar segera di perbaiki!!!'); 
            }
            $this->session->set_flashdata('sukses','Suksess Artikel Anda Telah Terbit, Admin Akan segera memberi kabar kelanjutan!');
        }
        return;
    }
    
    function load_artikel(){
        $this->db->select('*');
        $this->db->where('nip',$this->session->userdata('nip'));
        $this->db->from('artikel');
        $this->db->join('kategori','artikel.id_kategori=kategori.id_kategori');
        $this->db->join('sub_kategori','sub_kategori.id_sub=artikel.id_sub');
        $query=$this->db->get('');
        
        //$query=$this->db->get_where('artikel',array('nip'=>$this->session->userdata('nip')));
        
        if($query->num_rows() > 0){
            
        } //end if($query)
        return $query->result();
    }
    
    function get_chart(){
        $this->db->select('*');
        $this->db->like('tanggal','2013-');
        $this->db->order_by('tanggal','asc');
        return $this->db->get('tbl_pendapatan');
    }
    function get_chart2(){
        $sql="SELECT COUNT(id_artikel) from artikel where verifikasi='BELUM' ";
        $query=$this->db->query($sql);
        return $query->num_rows();
    }
    function get_user_profile(){
        $query=$this->db->get_where('employe',array('nip'=>$this->session->userdata('nip')));
        return $query->result_array();
    }
    
    function update_picture($name,$type){
        if($type=='image/jpeg'){
            $ext='.jpg';
        }else{
        $ext_get=explode("/",$type);
        $ext=".$ext_get[1]";
        }
        $rename_image=array('pic'=>$name.$ext);
        $this->db->where('nip',$this->session->userdata('nip'));
        $this->db->update('employe',$rename_image);
        return;
    }
    function update_user_profile(){
        $update_array=array(
            'nama_depan'=>$this->input->post('first_name'),
            'nama_belakang'=>$this->input->post('last_name'),
            'email'=>$this->input->post('email'),
            'contact'=>$this->input->post('contact'),
            'dob'=>$this->input->post('dob')
        );
        $this->db->where('nip',$this->session->userdata('nip'));
        $update_pro=$this->db->update('employe',$update_array);
        if($update_pro){
            $this->session->set_flashdata('sukses','Data Pribadi Telah Berhasil Diperbaharui!');
        }else{
        $this->session->set_flashdata('error','Gagal sepertinya ada kesalahan');
        }
        return;
    }
    function get_message_notif(){
        $where_clause=array(
            'notif_to'=>$this->session->userdata('nip'),
            'viewed'=>'0'
        );
        
        $this->db->where($where_clause);
        $row_notif=$this->db->get('notif');
        return $row_notif;
    }
    function get_whole_message(){
        $where_clause=array(
            'notif_to'=>$this->session->userdata('nip'),
            'viewed'=>'0'
        );
        $this->db->where($where_clause);
        $this->db->order_by('notif.id_notif','DESC');
        $this->db->limit(5);
        $get_messsage=$this->db->get('notif');
        return $get_messsage;
    }
    function artikel_notif(){
        $artikel_notif=$this->db->get_where('artikel',array('nip'=>$this->session->userdata('nip')));
        return $artikel_notif;
    }
}