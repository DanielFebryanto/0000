<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model_lama extends CI_Model {
   
    function admin_auth(){
        $this->db->where('email',$this->input->post('username'));
        $this->db->where('password',$this->input->post('password'));
        $this->db->where('Jabatan','Admin');
        $query=$this->db->get('employe');
        
        if($query->num_rows() == 1){
            foreach($query->result() as $row){
                $data=array(
                    'nama_depan' => $row->nama_depan,
                    'nama_belakang' => $row->nama_belakang,
                    'pic' => $row->pic,
                    'jabatan' => $row->jabatan,
                    'granted' =>true
                );
                $this->session->set_userdata($data);
                return true;
            }
            
        } else{
            $this->session->set_flashdata('error','Username Atau Pass yang anda masukan salah');
            return false;
        }
    }
    function add_kategori_model(){
        $data= array(
            'nama_kategori'=>$this->input->post('kategori')
            );
        $this->db->insert('kategori',$data);
        return;
    }
    function add_subKategori_model(){
        $data= array(
            'id_kategori'=>$this->input->post('id_kategori'),
            'nama_sub_kategori'=>$this->input->post('sub_kat')
            );
        $this->db->insert('sub_kategori',$data);
        return;
    }
    function load_kategori($num, $offset){
        $sql="SELECT*from sub_kategori inner join kategori on sub_kategori.id_kategori=kategori.id_kategori order by id_sub";
        $query=$this->db->query($sql, $num, $offset);
        return $query->result();
    }
    
/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////             BEGIN ARTIKEL MODEL       //////////////////////////////////////////////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    function load_artikel($num, $offset){
        $this->db->select('*');
        $this->db->from('artikel', $num, $offset);
        $this->db->join('employe','employe.nip=artikel.nip');
        $query=$this->db->get();
        
        return $query->result();
    }
    
    
/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////             END ARTIKEL MODEL       /////////////////////////////////////////////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    
    
/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////             BEGIN JURNALIS MODEL       /////////////////////////////////////////////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    
    function load_jurnalis(){
        $query=$this->db->get_where('employe',array('jabatan'=>'jurnalis'));
        return $query->result();
    }
    
    function add_jurnalis_model(){
        $query=$this->db->get_where('employe',array(
            'nama_depan'=>$this->input->post('nama_depan'),
            'nama_belakang'=>$this->input->post('nama_belakang'),
            'email'=>$this->input->post('email'),
            'dob'=>$this->input->post('dob')
            ));
        if($query->num_rows()>0){
            $this->session->set_flashdata('error','Data sudah terdaftar di database ');
            return;
        }else{
        $data= array(
            'nama_depan'=>$this->input->post('nama_depan'),
            'nama_belakang'=>$this->input->post('nama_belakang'),
            'email'=>$this->input->post('email'),
            'pasword'=>$this->input->post('email'),
            'tgl_join'=>date('Y-m-d'),
            'dob'=>$this->input->post('dob'),
            'gender'=>$this->input->post('gender'),
            'jabatan'=>'Jurnalis'
            );
        $this->db->insert('employe',$data);
        $this->session->set_flashdata('sukses',' Data Telah Disimpan');
        return;
        }
    }
/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////             END JURNALIS MODEL       /////////////////////////////////////////////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
}