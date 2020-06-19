<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masuk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
    }
    
    function masuk_list($id, $instansi){
        if ($instansi == 1) {
            $hasil=$this->db->query("SELECT * FROM tbl_surat_masuk where instansi = '2' ORDER BY id_surat DESC");
        }elseif ($instansi == 2) {
            $hasil=$this->db->query("SELECT * FROM tbl_surat_masuk where instansi = '1' ORDER BY id_surat DESC");
        }else{
            $hasil=$this->db->query("SELECT * FROM tbl_surat_masuk ORDER BY id_surat DESC");
        }
        return $hasil->result();
    }

    function masuk_list2($id, $instansi){
        if ($instansi == 1) {
            $hasil=$this->db->query("SELECT * FROM tbl_surat_masuk where instansi = '1' ORDER BY id_surat DESC");
        }elseif ($instansi == 2) {
            $hasil=$this->db->query("SELECT * FROM tbl_surat_masuk where instansi = '2' ORDER BY id_surat DESC");
        }else{
            $hasil=$this->db->query("SELECT * FROM tbl_surat_masuk ORDER BY id_surat DESC");
        }
        return $hasil->result();
    }
     
    public function getmasuk_detail($detail){
    $data = $this->db->query("SELECT * from tbl_surat_masuk where no_surat='$detail'")->row();
    return $data;
    }

    public function getbyid($id){
        $data = $this->db->query("SELECT * from tbl_surat_masuk where id_surat='$id'")->row();
    return $data;
    }

    public function getlast(){
    $data = $this->db->query("SELECT id_surat from tbl_surat_masuk ORDER BY id_surat DESC LIMIT 1")->row();
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

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

}