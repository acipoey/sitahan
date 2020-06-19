<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Instansi_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function masuk_list()
  {
    $hasil = $this->db->query("SELECT * FROM tbl_ref_instansi ORDER BY id DESC");
    return $hasil->result();
  }

  function masuk_list_all()
  {
    $hasil = $this->db->query('SELECT id, kode, nama, alamat, CASE
    WHEN level =1 THEN "Pengadilan"
    WHEN level =2 THEN "Lembaga Pemasyarakatan" END as level FROM tbl_ref_instansi ORDER BY id DESC');
    return $hasil->result();
  }

  public function getmasuk_detail($detail)
  {
    $data = $this->db->query("SELECT * from tbl_ref_instansi where id='$detail'")->row();
    return $data;
  }

  public function getbyid($id)
  {
    $data = $this->db->query("SELECT * from tbl_ref_instansi where id='$id'")->row();
    return $data;
  }

  public function getlast()
  {
    $data = $this->db->query("SELECT id from tbl_ref_instansi ORDER BY id DESC LIMIT 1")->row();
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
    $hasil = $this->db->query("DELETE FROM tbl_ref_instansi WHERE id='$id'");
    return $hasil;
  }

  function get_id($nama){
    $hasil = $this->db->query("SELECT id, level, alamat FROM tbl_ref_instansi WHERE nama LIKE '%".$nama."%';")->row();
    return $hasil;
  }

  function get_id_alamat($id){
    $hasil = $this->db->query("SELECT ri.alamat FROM tbl_ref_instansi ri left join users u on ri.id=u.instansi where u.id_user='$id'")->row();
    return $hasil;
  }

}
