<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_jqgrid_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	function tampil_dosen_semua()
	{
		$q = $this->db->get('tbl_nama_dosen');
		return $q;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
