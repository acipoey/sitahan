<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function masuk_list($role, $instansi = NULL)
    {
        if ($role == 1) {
            $hasil = $this->db->query("SELECT u.*, i.nama as nama_instansi FROM users u inner join tbl_ref_instansi i on u.instansi=i.id ORDER BY id_user DESC");
        } elseif ($role == 2) {
            if ($instansi) {
                $hasil = $this->db->query("SELECT u.*, i.nama as nama_instansi FROM users u inner join tbl_ref_instansi i on u.instansi=i.id where instansi= $instansi ORDER BY id_user DESC");
            }
        }
        return $hasil->result();
    }

    public function getmasuk_detail($detail)
    {
        $data = $this->db->query("SELECT * from users where id_user='$detail'")->row();
        return $data;
    }

    public function getbyid($id)
    {
        $data = $this->db->query("SELECT * from users where id_user='$id'")->row();
        return $data;
    }

    public function getlast()
    {
        $data = $this->db->query("SELECT id_user from users ORDER BY id_user DESC LIMIT 1")->row();
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

    function hapus($id_user)
    {
        $hasil = $this->db->query("DELETE FROM users WHERE id_user='$id_user'");
        return $hasil;
    }
}
