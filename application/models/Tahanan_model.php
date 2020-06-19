<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tahanan_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function masuk_list($id_instansi, $level_instansi)
  {
    if ($level_instansi == 1) {
      $hasil = $this->db->query("SELECT t.id, t.nama, t.tempat_lahir, t.tgl_lahir, t.jenis_kelamin, t.kebangsaan, t.tempat_tinggal, t.agama, t.pekerjaan, t.pejabat, t.perkara, t.start_date, t.end_date, t.tgl_surat, t.no_surat, t.status_change, i.nama as nama_instansi  FROM tbl_tahanan t join tbl_ref_instansi i on i.id=t.id_instansi  ORDER BY id DESC");
      return $hasil->result();
    }
    $hasil = $this->db->query("SELECT * FROM tbl_tahanan ORDER BY id DESC");
    //$hasil = $this->db->query("SELECT * FROM tbl_tahanan where id_instansi='$id_instansi' ORDER BY id DESC");
    return $hasil->result();
  }

  public function getmasuk_detail($detail)
  {
    $data = $this->db->query("SELECT * from tbl_tahanan where id='$detail'")->row();
    return $data;
  }

  public function getbyid($id)
  {
    $data = $this->db->query("SELECT t.id, t.nama, t.tempat_lahir, t.tgl_lahir, t.jenis_kelamin, t.kebangsaan, t.tempat_tinggal, t.agama, t.pekerjaan, t.pejabat, t.perkara, t.start_date, t.end_date, t.tgl_surat, t.no_surat, i.nama as nama_instansi  FROM tbl_tahanan t join tbl_ref_instansi i on i.id=t.id_instansi where t.id='$id'")->row();
    return $data;
  }

  public function getlast()
  {
    $data = $this->db->query("SELECT id from tbl_tahanan ORDER BY id DESC LIMIT 1")->row();
    return $data;
  }

  public function Simpan($table, $data)
  {
    return $this->db->insert($table, $data);
  }

  function update($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  function edit($table, $data, $where)
  {
    return $this->db->get_where($table, $data, $where);
  }

  function hapus($id)
  {
    $hasil = $this->db->query("DELETE FROM tbl_tahanan WHERE id='$id'");
    return $hasil;
  }

  function tahanan_logs($id){
    $hasil=$this->db->query("SELECT l.id, u.nama, t.nama as tahanan, l.end_date_new, l.end_date_old, l.start_date_new, l.start_date_old, l.created FROM logs l join tbl_tahanan t on l.tahanan_id=t.id JOIN users u on l.user_id=u.id_user where t.id='$id' ORDER BY l.id DESC");
    return $hasil->result();
  }

  function get_all_tahanan($nama){
    $hasil = $this->db->query("SELECT *FROM tbl_tahanan WHERE nama LIKE '%".$nama."%';")->row();
    return $hasil;
  }
}
