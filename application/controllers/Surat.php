<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Surat extends CI_Controller
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
		$this->load->model('surat_model', 'surat', true);
	}


	public function index()
	{

		$data = array(
			'judul' 		=> "Data Kode Surat",
			'tombol' 		=> "Tambah Kode Surat",
			// 'ref_surat'     => $this->surat->getbyid(1)
		);

		$this->load->view('surat/view', $data);
	}

	function add()
    {
        $data = array(
            'judul'     => "Tambah Kode Surat",
        );
        $this->load->view('surat/add', $data);
    }

	function datatables(){
        $data = $this->surat->masuk_list();
        echo json_encode($data);
    }


    public function save()
	{
		$data = array(
        'kode'       		=> $this->input->post('kode'),
        'nama'       		=> $this->input->post('nama'),
        'created'  			=> date("Y-m-d H:i:s")

        );

        $status = $this->surat->Simpan('tbl_ref_surat',$data);
        if ($status) {
            $pesan = "Data Berhasil Ditambahkan";
            $this->session->set_flashdata('pesan_sks', $pesan);
            redirect('surat');
        } else {
            $pesan = "Maaf, Data Gagal Ditambahkan";
            $this->session->set_flashdata('pesan_ggl', $pesan);
            redirect('surat');
        }
	}

	function edit()
    {	
    	$id = $this->uri->segment(3);
        $data = array(
        	'judul'     => "Edit Kode Surat",
            'data'     => $this->surat->getbyid($id),
        );
        $this->load->view('surat/edit', $data);
    }

	public function update()
	{

		$data = array(
			'kode'       => $this->input->post('kode'),
			'nama'       => $this->input->post('nama'),
		);

		$where = array(
			'id'    =>  $this->input->post('id'),
		);
		$status = $this->surat->update($where, $data, 'tbl_ref_surat');

		if ($status) {
			$pesan = "Data Berhasil Diupdate";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('surat');
		} else {
			$pesan = "Data Berhasil Diupdate";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('surat');
		}
	}

	function hapus(){
	    $id=$this->input->post('id');
	    $data=$this->surat->Hapus($id);
	    echo json_encode($data);
	}
}
