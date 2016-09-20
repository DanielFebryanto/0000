<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jqmodel extends CI_Model {
    function getCount(){
        $getRows=$this->db->get('employe');
        return $getRows;
    }
    function getKat(){
        $getRows=$this->db->get('kategori');
        return $getRows;
    }
    function mupdate(){
        $updateVal=array(
            'nama_kategori'=>$_POST['nama_kategori']
        );
        $this->db->where('id_kategori',$this->input->post('id_kategori'));
        $this->db->update('kategori',$updateVal);
        return;
    }
    function add_new(){
        $insertVal=array(
            nama_kategori=>$this->input->post('nama_kategori')
        );
        $this->db->insert('kategori',$insertVal);
        return;
    }
}
