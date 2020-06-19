<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Instansi extends CI_Controller
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
		$this->load->model('instansi_model', 'instansi', true);
	}

	function datatables(){
        $data=$this->instansi->masuk_list_all();
        echo json_encode($data);
    }

	public function index()
	{	

		$data = array(
			'judul'   => "Data Instansi",
			'tombol'  => "Tambah Instansi",
		);


		$this->load->view('instansi/view', $data);
	}

	function add()
	{
		$data = array(
			'judul' 	=> "Tambah Instansi",
		);
		$this->load->view('instansi/add', $data);
	}

	public function save()
	{
		$data = array(
			'kode'     => $this->input->post('kode'),
			'nama'     => $this->input->post('nama'),
			'alamat'   => $this->input->post('alamat'),
			'level'    => $this->input->post('level'),
			'created'  => date("Y-m-d H:i:s")

		);

		$status = $this->instansi->Simpan('tbl_ref_instansi', $data);
		if ($status) {
			$pesan = "Data Berhasil Ditambahkan";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('instansi');
		} else {
			$pesan = "Maaf, Data Gagal Ditambahkan";
			$this->session->set_flashdata('pesan_ggl', $pesan);
			redirect('instansi');
		}
	}

	function edit()
    {	
    	$id = $this->uri->segment(3);
        $data = array(
        	'judul'     => "Edit Kode Instansi",
            'instansi'     => $this->instansi->getbyid($id),
        );
        $this->load->view('instansi/edit', $data);
    }

    public function update()
	{

		$data = array(
			'kode'     => $this->input->post('kode'),
			'nama'     => $this->input->post('nama'),
			'alamat'   => $this->input->post('alamat'),
			'level'    => $this->input->post('level'),
		);

		$where = array(
			'id'    =>  $this->input->post('id'),
		);
		$status = $this->instansi->update($where, $data, 'tbl_ref_instansi');

		if ($status) {
			$pesan = "Data Berhasil Diupdate";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('instansi');
		} else {
			$pesan = "Data Berhasil Diupdate";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('instansi');
		}
	}

	function hapus()
	{
		$id = $this->input->post('id');
		$data = $this->instansi->Hapus($id);
		echo json_encode($data);
	}
}
