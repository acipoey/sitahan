<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

    // cek keberadaan user di sistem
    function check_user_account($username, $password) {
        $this->db->select('u.id_user, u.username, u.password, u.nama, u.role, u.status, u.jabatan, u.nip, u.alamat, u.instansi, i.level, i.id as id_instansi');
        $this->db->from('users u');
        $this->db->join('tbl_ref_instansi i', 'u.instansi=i.id', left);
        $this->db->where('u.username', $username);
        $this->db->where('u.password', md5($password));
       
        return $this->db->get();
    }
}