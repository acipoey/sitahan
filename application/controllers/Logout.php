<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url'));

        if (!$this->session->userdata('logged_in')) {
          redirect(base_url('login'));
        }
    }

	public function index()
	{
        $id_user = $this->session->userdata('id_user');
        $role = $this->session->userdata('role');
        //log_aktivitas($user_id,$role,'Logout dari sistem.');
        $this->session->sess_destroy();
        redirect(base_url('login'));
	}
}