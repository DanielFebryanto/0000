<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
    function admin_auth(){
        $query=$this->db->get_where('employe',array(
        'email'=>$this->input->post('email'),
        'password'=>$this->input->post('password'),
        'jabatan'=>'Administrator'
        ));
        
        if($query->num_rows() == 1){
            foreach($query->result_array() as $row){
                $admin_sess=array(
                    'nip'=>$row['nip'],
                    'nama_depan'=>$row['nama_depan'],
                    'nama_belakang'=>$row['nama_belakang'],
                    'jabatan'=>$row['jabatan'],
                    'granted'=>'YES'
                );
                $this->session->set_userdata($admin_sess);
                return true;
            }
        } else {
            $this->session->set_flashdata('error','Username atau Password yang anda masukan Salah!.');
            return false;
        }
    }
    
    function get_jurnalis(){
        $this->db->order_by('nama_depan','asc');
        $query=$this->db->get_where('employe',array('jabatan'=>'Jurnalis'));
        
        return $query;
    }
    
    function input_jurnalis(){
        /*
            HTML input Name :
                - first_name
                - last_name
                - email
                - contact
                - dob
                - gender
        */
        $query=$this->db->get_where('employe',array(
            'nama_depan'=>$this->input->post('first_name'),
            'nama_belakang'=>$this->input->post('last_name'),
            'email'=>$this->input->post('email')
        ));
        if($query->num_rows() > 0){
            $username=$this->input->post('first_name');
            $last=$this->input->post('last_name');
            $email=$this->input->post('email');
            $this->session->set_flashdata('error','Jurnalis bernama '.$username.' '.$last.' dengan Email '.$email.' Sudah Terdaftar.');
        } else {
            $insert_value=array(
                'nama_depan'=>$this->input->post('first_name'),
                'nama_belakang'=>$this->input->post('last_name'),
                'email'=>$this->input->post('email'),
                'password'=>$this->input->post('email'),
                'contact'=>$this->input->post('contact'),
                'dob'=>$this->input->post('dob'),
                'gender'=>$this->input->post('gender'),
                'pic'=>'user.png',
                'tgl_join'=>date('y-m-d'),
                'jabatan'=>'Jurnalis'
            );
            $insert=$this->db->insert('employe',$insert_value);
            $this->session->set_flashdata('sukses','Sukses Jurnalis Telah Terdaftar Di DB');
        }
        return;
    }
    function get_kategori(){
        $query_kat=$this->db->get('kategori');
        return $query_kat;
    }
    
    function get_sub_kategori(){
        $this->db->order_by('nama_sub_kategori','asc');
        $this->db->select('*');
        $this->db->from('sub_kategori');
        $this->db->join('kategori','kategori.id_kategori=sub_kategori.id_kategori');
        $query=$this->db->get('');
        return $query;
    }
    
    function insert_subKat(){
        $check=$this->db->get_where('sub_kategori',array('nama_sub_kategori'=>$this->input->post('sub_kat')));
        if($check->num_rows() >0 ){
            $this->session->set_flashdata('error',' Sub Kategori Dengan nama <b>'.$this->input->post('sub_kat'),' </b> sudah ada !!');
        } else{
            $insert_sub=array(
                'nama_sub_kategori'=>$this->input->post('sub_kat'),
                'id_kategori'=>$this->input->post('id_kategori'),
                'jml_artikel'=>'0'
            );
            $execute=$this->db->insert('sub_kategori',$insert_sub);
            
            if($execute){
                $this->session->set_flashdata('sukses',' Sub Kategori <b> '.$this->input->post('sub_kat').' </b> Telah Berhasil Ditambahkan');
            }else{
                $this->session->set_flashdata('error','Sorry Something went wrong!!');
            }
        }
        return;
    }
    
    function insert_kat(){
        $check=$this->db->get_where('kategori',array('nama_kategori'=>$this->input->post('kategori')));
        
        if($check->num_rows() > 0){
            $this->session->set_flashdata('error',' Sub Kategori Dengan nama <b>'.$this->input->post('sub_kat'),' </b> sudah ada !!');
        } else{
            $insert_kat=array(
                'nama_kategori'=>$this->input->post('kategori')
            );
            $execute=$this->db->insert('kategori',$insert_kat);
            
            if($execute){
                $this->session->set_flashdata('sukses',' Kategori <b> '.$this->input->post('kategori').' </b> Telah Berhasil Ditambahkan');
            }else{
                $this->session->set_flashdata('error','Sorry Something went wrong!!');
            }
        }
        return;
    }
    
    function get_artikel($clause){
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->order_by('tgl_dibuat','ASC');
        $this->db->join('kategori','kategori.id_kategori=artikel.id_kategori');
        $this->db->join('sub_kategori','sub_kategori.id_sub=artikel.id_sub');
        $this->db->join('employe','employe.nip=artikel.nip');
        $this->db->where('verifikasi',$clause);
        $query=$this->db->get('');
        
        return $query;
    }
    
    function get_artikel_prev($prev_id){
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('id_artikel',$prev_id);
        $this->db->join('kategori','kategori.id_kategori=artikel.id_kategori');
        $this->db->join('sub_kategori','sub_kategori.id_sub=artikel.id_sub');
        $this->db->join('employe','employe.nip=artikel.nip');
        $query=$this->db->get('');
        
        return $query;
    }
    
    function get_confirm(){
        date_default_timezone_set('Asia/Jakarta');
        $update_value=array('verifikasi'=>'SUDAH');
        $this->db->where('id_artikel',$this->input->post('confirm_id'));
        $artikel_update=$this->db->update('artikel',$update_value);
        
        if($artikel_update){ // if Artikel Approval has been granted then update jumlah artikel on sub_kategori table
            $query=$this->db->get_where('sub_kategori',array('id_sub'=>$this->input->post('id_sub')));
            foreach($query->result_array() as $row){
                $new_jml=$row['jml_artikel'] + 1;
                $jml_value=array('jml_artikel'=>$new_jml);
                $this->db->where('id_sub',$this->input->post('id_sub'));
                $update_jmlArtikel=$this->db->update('sub_kategori',$jml_value);
                
                
                if($update_jmlArtikel){ // if uppdate jumlah artikel success Send an email
                    $get_admin=$this->db->get_where('employe',array('nip'=>$this->session->userdata('nip')));
                    foreach($get_admin->result_array() as $ad){
                        $notif_value=array(
                            'notif_from'=>$this->session->userdata('nip'),
                            'notif_to'=>$this->input->post('nip'),
                            'subject'=>'Artikel Release',
                            'message'=>'Terimakasih. Artikel Anda dengan Judul '.$this->input->post('judul').' Telah Kami Terbitkan',
                            'viewed'=>'0',
                            'notif_date'=>date("y-m-d H:i:s")
                        );
                        $notif_insert=$this->db->insert('notif',$notif_value);
                        $receiver_mail=$this->input->post('email');
                        $this->email->from($ad['email'], $username);
                        $this->email->to('daniel.febryanto@gmail.com');

                        $this->email->subject('Artikel Release');
                        $this->email->message('Terimakasih. Artikel Anda dengan Judul '.$this->input->post('judul').' Telah Kami Terbitkan');

                        $this->email->send();
                    }
                    $this->session->set_flashdata('sukses','Berhasil. Artikel Telah Disetujui');
                }
            }
        }else{
            $this->session->set_flashdata('error','Maaf Ada Kesalahan');
        }
        return;
    }
    
    function get_correction(){
        $notif_value=array(
            'notif_from'=>$this->session->userdata('nip'),
            'notif_to'=>$this->input->post('nip'),
            'subject'=>'Artikel Verification',
            'message'=>'<p> '.$this->input->post('fouls').'<p><br/>'.$this->input->post('message').'',
            'viewed'=>'0',
        );
        $notif_insert=$this->db->insert('notif',$notif_value);
        if($notif_insert){
            $art_sess=array(
                'sess_judul','sess_username','sess_kategori','sess_sub_kategori','sess_id_sub','sess_artikel','sess_nip','sess_email','sess_id_artikel','sess_tgl_dibuat'
            );
            $this->session->unset_userdata($art_sess);
        }
        $this->session->set_flashdata('warning','Anda Telah Mengirim Pesan kepada Jurnalis untuk Merubah sebagian dari isi Artikel yang Ditulis');
        return;
    }
    
    function get_user_profile(){
        $query=$this->db->get_where('employe',array('nip'=>$this->session->userdata('nip')));
        return $query->result_array();
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
        date_default_timezone_set('Asia/Jakarta');
        $where_clause=array('notif_to'=>$this->session->userdata('nip'),'viewed'=>'0');
        $row_notif=$this->db->get_where('notif',$where_clause);
        
        return $row_notif;
    }
    
}