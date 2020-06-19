<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_keluar_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
    }
    
    function masuk_list($id, $instansi){
    if ($instansi == 1) {
        $hasil=$this->db->query("SELECT sk.id_surat, sk.no_surat, sk.asal_surat, sk.isi, sk.perihal, sk.indeks, DATE_FORMAT(sk.tgl_surat,'%d-%m-%Y') as tgl_surat, DATE_FORMAT(sk.tgl_diterima,'%d-%m-%Y') as tgl_diterima, sk.file, sk.hal, sk.pengirim, sk.alamat_pengirim, sk.tembusan, sk.kepada, sk.upload_berkas, sk.status_kirim, i.nama as nama_instansinya, u.nama as pengirimnya FROM tbl_surat sk left join tbl_ref_instansi i on sk.kepada=i.level left join users u on sk.pengirim=u.id_user where sk.instansi = '2' and sk.status_kirim= '1' and status_delete='0' ORDER BY id_surat DESC");
    }elseif ($instansi == 2) {
         $hasil=$this->db->query("SELECT sk.id_surat, sk.no_surat, sk.asal_surat, sk.isi, sk.perihal, sk.indeks, DATE_FORMAT(sk.tgl_surat,'%d-%m-%Y') as tgl_surat, DATE_FORMAT(sk.tgl_diterima,'%d-%m-%Y') as tgl_diterima, sk.file, sk.hal, sk.pengirim, sk.alamat_pengirim, sk.tembusan, sk.kepada, sk.upload_berkas, sk.status_kirim, i.nama as nama_instansinya, u.nama as pengirimnya FROM tbl_surat sk left join tbl_ref_instansi i on sk.kepada=i.level left join users u on sk.pengirim=u.id_user where sk.instansi = '1' and sk.status_kirim= '1' and status_delete='0' ORDER BY id_surat DESC");
    }else{
         $hasil=$this->db->query("SELECT sk.id_surat, sk.no_surat, sk.asal_surat, sk.isi, sk.perihal, sk.indeks, DATE_FORMAT(sk.tgl_surat,'%d-%m-%Y') as tgl_surat, DATE_FORMAT(sk.tgl_diterima,'%d-%m-%Y') as tgl_diterima, sk.file, sk.hal, sk.pengirim, sk.alamat_pengirim, sk.tembusan, sk.kepada, sk.upload_berkas, sk.status_kirim, i.nama as nama_instansinya, u.nama as pengirimnya FROM tbl_surat sk left join tbl_ref_instansi i on sk.kepada=i.level left join users u on sk.pengirim=u.id_user where sk.status_kirim= '1' ORDER BY id_surat DESC");
    }
        return $hasil->result();
    }

    function masuk_list2($id, $instansi){
    if ($instansi == 1) {
        $hasil=$this->db->query("SELECT sk.id_surat, sk.no_surat, sk.asal_surat, sk.isi, sk.perihal, sk.indeks, DATE_FORMAT(sk.tgl_surat,'%d-%m-%Y') as tgl_surat, sk.tgl_diterima, sk.file, sk.hal, sk.pengirim, sk.alamat_pengirim, sk.tembusan, sk.kepada, sk.upload_berkas, sk.status_kirim, i.nama as nama_instansinya, u.nama as pengirimnya FROM tbl_surat sk left join tbl_ref_instansi i on sk.kepada=i.level left join users u on sk.pengirim=u.id_user where sk.instansi = '1' ORDER BY id_surat DESC");
    }elseif ($instansi == 2) {
         $hasil=$this->db->query("SELECT sk.id_surat, sk.no_surat, sk.asal_surat, sk.isi, sk.perihal, sk.indeks, DATE_FORMAT(sk.tgl_surat,'%d-%m-%Y') as tgl_surat, sk.tgl_diterima, sk.file, sk.hal, sk.pengirim, sk.alamat_pengirim, sk.tembusan, sk.kepada, sk.upload_berkas, sk.status_kirim, i.nama as nama_instansinya, u.nama as pengirimnya FROM tbl_surat sk left join tbl_ref_instansi i on sk.kepada=i.level left join users u on sk.pengirim=u.id_user where sk.instansi = '2' ORDER BY id_surat DESC");
    }else{
         $hasil=$this->db->query("SELECT sk.id_surat, sk.no_surat, sk.asal_surat, sk.isi, sk.perihal, sk.indeks, DATE_FORMAT(sk.tgl_surat,'%d-%m-%Y') as tgl_surat, sk.tgl_diterima, sk.file, sk.hal, sk.pengirim, sk.alamat_pengirim, sk.tembusan, sk.kepada, sk.upload_berkas, sk.status_kirim, i.nama as nama_instansinya, u.nama as pengirimnya FROM tbl_surat sk left join tbl_ref_instansi i on sk.kepada=i.level  left join users u on sk.pengirim=u.id_user ORDER BY id_surat DESC");
    }
        return $hasil->result();
    }
     
    public function getmasuk_detail($detail){
    $data = $this->db->query("SELECT * from tbl_surat_keluar where id_surat='$detail'")->row();
    return $data;
    }

    public function getbyid($id){
        $data = $this->db->query("SELECT * from tbl_surat where id_surat='$id'")->row();
    return $data;
    }

    public function getbyid_aa($id){
        $data = $this->db->query("SELECT sk.id_surat, sk.no_surat, sk.asal_surat, sk.isi, sk.perihal, sk.indeks, sk.tgl_surat, sk.tgl_diterima, sk.file, sk.hal, sk.pengirim, sk.alamat_pengirim, sk.tembusan, sk.kepada, sk.upload_berkas, sk.status_kirim, i.nama as nama_instansinya, u.nama as pengirimnya FROM tbl_surat sk left join tbl_ref_instansi i on sk.kepada=i.level left join users u on sk.pengirim=u.id_user where id_surat='$id'")->row();
    return $data;
    }

    public function getlast(){
    $data = $this->db->query("SELECT id_surat from tbl_surat_keluar ORDER BY id_surat DESC LIMIT 1")->row();
    return $data;
    }

    function pengirim_list($role){
        $hasil=$this->db->query("SELECT * FROM users where role=".$role." ORDER BY id_user DESC");
        return $hasil->result();
    }

    function penerima_list_all($level){
        if ($level == 1) {
            $hasil=$this->db->query("SELECT * FROM tbl_ref_instansi where level='2' order by id DESC");
        }elseif ($level == 2){
            $hasil=$this->db->query("SELECT * FROM tbl_ref_instansi where level='1' order by id DESC");
        }else{
            $hasil=$this->db->query("SELECT * FROM tbl_ref_instansi order by id DESC");
        }
        return $hasil->result();
    }

    public function kode_instansi(){
        $data = $this->db->query("SELECT kode from tbl_ref_instansi where id=1")->row()->kode;
    return $data;
    }

    public function kode_surat(){
        $data = $this->db->query("SELECT kode from tbl_ref_surat where id=1")->row()->kode;
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
        $hasil=$this->db->query("DELETE FROM tbl_surat_keluar WHERE id_surat='$id'");
        return $hasil;
    }

    function penerima_list(){
        $hasil=$this->db->query("SELECT * FROM tbl_ref_penerima order by id DESC");
        return $hasil->result();
    }

     function getberkas($id){
        $hasil=$this->db->query("SELECT file FROM tbl_surat where id_surat=".$id." ORDER BY id_surat DESC");
        return $hasil->row()->file;
    }

}