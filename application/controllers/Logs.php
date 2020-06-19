<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url('login'));
		}

		$this->id_user = $this->session->userdata('id_user');
		$this->role = $this->session->userdata('role');
		$this->load->model('logs_model', 'logs', true);
	}

	function datatables(){
        $data=$this->logs->masuk_list();
        echo json_encode($data);
    }

	public function index()
	{	

		$data = array(
			'judul'   => "Data Logs Pergantian Masa Tahanan",
		);


		$this->load->view('logs/view', $data);
	}
}
