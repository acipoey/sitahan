<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
    }
    
    function masuk_list(){
        $hasil=$this->db->query("SELECT * FROM tbl_ref_surat ORDER BY id DESC");
        return $hasil->result();
    }
     
    public function getmasuk_detail($detail){
    $data = $this->db->query("SELECT * from tbl_ref_surat where id='$detail'")->row();
    return $data;
    }

    public function getbyid($id){
        $data = $this->db->query("SELECT * from tbl_ref_surat where id='$id'")->row();
    return $data;
    }

    public function getlast(){
    $data = $this->db->query("SELECT id from tbl_ref_surat ORDER BY id DESC LIMIT 1")->row();
    return $data;
    }

    public function Simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	function update($where,$data,$table){
	  $this->db->where($where);
	  $this->db->update($table,$data);
	 }

	function edit($table,$data,$where){  
 	return $this->db->get_where($table,$data,$where);
	}

	function hapus($id){
        $hasil=$this->db->query("DELETE FROM tbl_ref_surat WHERE id='$id'");
        return $hasil;
    }

}