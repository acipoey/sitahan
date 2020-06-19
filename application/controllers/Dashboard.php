<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
	    parent:: __construct();
	    $this->load->library(array('form_validation'));
	    if (!$this->session->userdata('logged_in'))
	    {
	        redirect(base_url('login'));
	    }

	    $this->id_user = $this->session->userdata('id_user');
	    $this->role = $this->session->userdata('role');
	}


	public function index()
	{
		
		$data = array(
			'judul' => "Dashboard",
		);
		

		$this->load->view('dashboard/view', $data);
	}
}

