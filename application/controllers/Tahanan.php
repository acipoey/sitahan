<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tahanan extends CI_Controller
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
		$this->load->model('tahanan_model', 'tahanan', true);
	}


	public function index()
	{
		// var_dump($this->session->userdata('level_instansi'));exit();
		$data = array(
			'judul' => "Data Tahanan",
		);


		$this->load->view('tahanan/view', $data);
	}

	function datatables()
	{
		$data = $this->tahanan->masuk_list($this->session->userdata('id_instansi'), $this->session->userdata('level_instansi'));
		echo json_encode($data);
	}

	function add()
	{
		$data = array(
			'judul' => "Tambah Tahanan",
		);
		$this->load->view('tahanan/add', $data);
	}

	public function save()
	{
		$data = array(
			'nama'       		=> $this->input->post('nama_lengkap'),
			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
			'tgl_lahir' 		=> $this->input->post('tgl_lahir'),
			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
			'kebangsaan' 		=> $this->input->post('kebangsaan'),
			'tempat_tinggal' 	=> $this->input->post('tempat_tinggal'),
			'agama' 			=> $this->input->post('agama'),
			'pekerjaan' 		=> $this->input->post('pekerjaan'),
			'pejabat' 			=> $this->input->post('pejabat'),
			'perkara' 			=> $this->input->post('perkara'),
			'id_instansi' 		=> $this->session->userdata('id_instansi'),
			'start_date' 		=> $this->input->post('start_date'),
			'end_date' 			=> $this->input->post('end_date'),
			'tgl_surat' 		=> $this->input->post('tgl_surat'),
			'no_surat' 			=> $this->input->post('no_surat'),
			'created'  			=> date("Y-m-d H:i:s")

		);

		$status = $this->tahanan->Simpan('tbl_tahanan', $data);
		if ($status) {
			$pesan = "Data Berhasil Ditambahkan";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('tahanan');
		} else {
			$pesan = "Maaf, Data Gagal Ditambahkan";
			$this->session->set_flashdata('pesan_ggl', $pesan);
			redirect('tahanan');
		}
	}

	function hapus()
	{
		$id = $this->input->post('id');
		$data = $this->tahanan->Hapus($id);
		echo json_encode($data);
	}

	function edit()
    {	
    	$id = $this->uri->segment(3);
    	// var_dump($this->tahanan->getbyid($id));exit();
        $data = array(
        	'judul'     => "Edit Tahanan",
            'tahanan'     => $this->tahanan->getbyid($id),
        );
        $this->load->view('tahanan/edit', $data);
    }

    function edit_masa()
    {	
    	$id = $this->uri->segment(3);
    	// var_dump($this->tahanan->getbyid($id));exit();
        $data = array(
        	'judul'     => "Edit Masa Tahanan",
            'tahanan'     => $this->tahanan->getbyid($id),
        );
        $this->load->view('tahanan/edit_masa', $data);
    }

    function logs()
    {	
    	$id = $this->uri->segment(3);
        $data = array(
        	'judul'     => "Data Logs Masa Tahanan",
            'tahanan'     => $this->tahanan->tahanan_logs($id),
        );
        $this->load->view('tahanan/logs', $data);
    }

    public function update()
	{

		if ($this->input->post('start_date_old') != $this->input->post('start_date') || $this->input->post('end_date_old') != $this->input->post('end_date')) {

			$data_new = array(
				'user_id'				=> $this->session->userdata('id_user'),
				'tahanan_id'    		=> $this->input->post('id'),
				'start_date_old' 		=> $this->input->post('start_date_old'),
				'end_date_old' 			=> $this->input->post('end_date_old'),
				'start_date_new' 		=> $this->input->post('start_date'),
				'end_date_new' 			=> $this->input->post('end_date'),
				'created'  				=> date("Y-m-d H:i:s")
			);

			$this->tahanan->Simpan('logs', $data_new);

			$data = array(
				'status_change'       	=> 1,
			);

			$where = array(
				'id'    =>  $this->input->post('id'),
			);
			$status = $this->tahanan->update($where, $data, 'tbl_tahanan');
		}

		$data = array(
			'nama'       		=> $this->input->post('nama_lengkap'),
			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
			'tgl_lahir' 		=> $this->input->post('tgl_lahir'),
			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
			'kebangsaan' 		=> $this->input->post('kebangsaan'),
			'tempat_tinggal' 	=> $this->input->post('tempat_tinggal'),
			'agama' 			=> $this->input->post('agama'),
			'pekerjaan' 		=> $this->input->post('pekerjaan'),
			'pejabat' 			=> $this->input->post('pejabat'),
			'perkara' 			=> $this->input->post('perkara'),
			'start_date' 		=> $this->input->post('start_date'),
			'end_date' 			=> $this->input->post('end_date'),
			'tgl_surat' 		=> $this->input->post('tgl_surat'),
			'no_surat' 			=> $this->input->post('no_surat'),
		);

		$where = array(
			'id'    =>  $this->input->post('id'),
		);
		$status = $this->tahanan->update($where, $data, 'tbl_tahanan');
		if ($status) {
			$pesan = "Data Berhasil Diupdate";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('tahanan');
		} else {
			$pesan = "Data Berhasil Diupdate";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('tahanan');
		}
	}

	public function update_masa()
	{

		if ($this->input->post('start_date_old') != $this->input->post('start_date') || $this->input->post('end_date_old') != $this->input->post('end_date')) {

			$data_new = array(
				'user_id'				=> $this->session->userdata('id_user'),
				'tahanan_id'    		=> $this->input->post('id'),
				'start_date_old' 		=> $this->input->post('start_date_old'),
				'end_date_old' 			=> $this->input->post('end_date_old'),
				'start_date_new' 		=> $this->input->post('start_date'),
				'end_date_new' 			=> $this->input->post('end_date'),
				'created'  				=> date("Y-m-d H:i:s")
			);

			$this->tahanan->Simpan('logs', $data_new);

			$data = array(
				'status_change'       	=> 1,
			);

			$where = array(
				'id'    =>  $this->input->post('id'),
			);
			$status = $this->tahanan->update($where, $data, 'tbl_tahanan');
		}

		$data = array(
			'start_date' 		=> $this->input->post('start_date'),
			'end_date' 			=> $this->input->post('end_date'),
		);

		$where = array(
			'id'    =>  $this->input->post('id'),
		);
		$status = $this->tahanan->update($where, $data, 'tbl_tahanan');
		if ($status) {
			$pesan = "Data Berhasil Diupdate";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('tahanan');
		} else {
			$pesan = "Data Berhasil Diupdate";
			$this->session->set_flashdata('pesan_sks', $pesan);
			redirect('tahanan');
		}
	}

	function detail()
    {	
    	$id = $this->uri->segment(3);
    	// var_dump($this->tahanan->getbyid($id));exit();
        $data = array(
        	'judul'     => "detail Tahanan",
            'tahanan'     => $this->tahanan->getbyid($id),
        );
        $this->load->view('tahanan/detail', $data);
    }
}
