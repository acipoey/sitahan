<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
    }
    
    function masuk_list(){
        $hasil=$this->db->query("SELECT l.id, u.nama, t.nama as tahanan, l.end_date_new, l.end_date_old, l.start_date_new, l.start_date_old FROM logs l join tbl_tahanan t on l.tahanan_id=t.id JOIN users u on l.user_id=u.id_user ORDER BY l.id DESC");
        return $hasil->result();
    }

}