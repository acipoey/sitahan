<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
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
		$this->instansi_login = $this->session->userdata('instansi');
		$this->load->model('users_model', 'users', true);
		$this->load->model('instansi_model', 'instansi', true);
	}


	public function index()
	{
		$data = array(
			'judul' => "Data User ",
		);


		$this->load->view('users/view', $data);
	}

	function datatables()
	{
		$data = $this->users->masuk_list($this->role, $this->instansi_login);
		echo json_encode($data);
	}

	function add()
	{
		$data = array(
			'judul' 	=> "Tambah User ",
			'instansi'  => $this->instansi->masuk_list(),
		);
		$this->load->view('users/add', $data);
	}

	public function save()
	{
		$id_instansi = $this->instansi->get_id($this->input->post('instansi'));
		//if ($this->input->post('role') == 1)
			$instansinya = $id_instansi->id;
		//else
		//	$instansinya = 6;
		$data = array(
			'nama'       		=> $this->input->post('nama_lengkap'),
			'username' 			=> $this->input->post('username'),
			'jabatan' 			=> $this->input->post('jabatan'),
			'nip' 				=> $this->input->post('nip'),
			'password' 			=> md5($this->input->post('password')),
			'role' 				=> $this->input->post('role'),
			'created'  			=> date("Y-m-d H:i:s"),
			'instansi' 			=> $instansinya,

		);

		$status = $this->users->Simpan('users', $data);
		if ($status) {
			$pesan = "Data Berhasil Ditambahkan";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('users');
		} else {
			$pesan = "Maaf, Data Gagal Ditambahkan";
			$this->session->set_flashdata('pesan_ggl', $pesan);
			redirect('users');
		}
	}

	function hapus()
	{
		$id = $this->input->post('id');
		$data = $this->users->Hapus($id);
		echo json_encode($data);
	}

	function edit()
    {	
    	$id = $this->uri->segment(3);
        $data = array(
        	'judul'     => "Edit Users",
        	'instansi'  => $this->instansi->masuk_list(),
            'users'     => $this->users->getbyid($id),
        );
        $this->load->view('users/edit', $data);
    }

    public function update()
	{
		// var_dump($this->input->post());exit();

		$id_instansi = $this->instansi->get_id($this->input->post('instansi'));
		//if ($this->input->post('role') == 1)
			$instansinya = $id_instansi->id;
		//else
		//	$instansinya = 6;

		$data = array(
			'nama'       		=> $this->input->post('nama_lengkap'),
			'username' 			=> $this->input->post('username'),
			'jabatan' 			=> $this->input->post('jabatan'),
			'nip' 				=> $this->input->post('nip'),
			'role' 				=> $this->input->post('role'),
			'created'  			=> date("Y-m-d H:i:s"),
			'instansi' 			=> $instansinya,
		);

		$where = array(
			'id_user'    =>  $this->input->post('id_user'),
		);
		$status = $this->users->update($where, $data, 'users');
		if ($this->input->post('password') != '') {
			$data = array(
				'password' 			=> md5($this->input->post('password')),
			);

			$where = array(
				'id_user'    =>  $this->input->post('id_user'),
			);

			$status = $this->users->update($where, $data, 'users');

			
		}
		if ($status) {
			$pesan = "Data Berhasil Diupdate";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('users');
		} else {
			$pesan = "Data Berhasil Diupdate";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('users');
		}
	}

}
