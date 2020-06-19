<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_penahanan extends CI_Controller {

	public function __construct() {
	    parent:: __construct();
	    $this->load->library(array('form_validation'));
	    if (!$this->session->userdata('logged_in'))
	    {
	        redirect(base_url('login'));
	    }

	    $this->id_user = $this->session->userdata('id_user');
	    $this->role = $this->session->userdata('role');
        $this->load->model('surat_masuk_model','surat_masuk',true);
	    $this->load->model('tahanan_model','tahanan',true);
	    $this->load->library('upload');
	}

	public function index()
	{
		
		$data = array(
			'judul' 		=> "Data Surat Masuk",
			'tombol' 		=> "Tambah Surat Masuk",
		);
		
		$this->load->view('surat_penahanan/view', $data);
	}

	function datatables(){
        $data=$this->surat_masuk->masuk_list();
        echo json_encode($data);
    }

    function add()
	{
		$data = array(
			'judul' 	=> "Pilih Jenis Pemberitahuan",
		);
		$this->load->view('surat_penahanan/add', $data);
	}

    function next()
    {  
        if ($this->input->post('jenis') == 3)
            $judul     = "Tambah : Surat Penahanan (Pemberitahuan 3 Hari)";
        else
            $judul     = "Tambah : Surat Penahanan (Pemberitahuan 10 Hari) ";
        $data = array(
            'judul'     => $judul,
            'jenis'     => $this->input->post('jenis'),
            'pengirim'  => $this->surat_masuk->pengirim_list($this->role),
            'penerima'  => $this->surat_masuk->penerima_list(),
            'tahanan'  => $this->surat_masuk->tahanan_list(),
            'instansi'  => $this->surat_masuk->instansi_list(),
            'alamat'    => $this->session->userdata('alamat'),
        );
        $this->load->view('surat_penahanan/add_next', $data);
    }


	function save()
	{

		$config['upload_path'] = './uploads/surat_masuk/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['file_upload1']['name'])){
 
            if ($this->upload->do_upload('file_upload1')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./uploads/surat_masuk/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './uploads/surat_masuk/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
            }else{
            	$gambar= '';
            }
        }else{
        	$gambar= '';
        }

		$data = array(
            'no_surat'              => $this->input->post('no_surat'),
			'tgl_surat'				=> $this->input->post('tgl_surat'),
			'asal_surat'			=> $this->input->post('pengirim'),
			'pengirim'				=> $this->input->post('pengirim'),
			'alamat_pengirim'		=> $this->input->post('alamat_pengirim'),
			'kode_hal'				=> $this->input->post('kode_hal'),
		//	'kepada'				=> $this->input->post('penerima'),
			'hal'					=> $this->input->post('hal'),
		//	'tembusan'				=> $this->input->post('tembusan'),
			'file'					=> $gambar,
		//	'file2'					=> $gambar2,
		//	'file3'					=> $gambar3,
			'tgl_surat'           	=> date("Y-m-d H:i:s"),
            'created'               => date("Y-m-d H:i:s"),
			'created'           	=> date("Y-m-d H:i:s"),
            'id_created'            => $this->id_user
		);

		$status = $this->surat_masuk->Simpan('tbl_surat_masuk',$data);
        if ($status) {
            $pesan = "Data Berhasil Disimpan";
            $this->session->set_flashdata('pesan_sks', $pesan);
            redirect('surat_masuk');
        }
	}

	function hapus(){
	    $id=$this->input->post('id');
	    $data=$this->surat_masuk->Hapus($id);
	    echo json_encode($data);
	}


    function pdf()
    {  
        

        $nama_tahanan   = $this->input->post('tahanan');
        $no_surat       = $this->input->post('no_surat');
        if ($no_surat == '') {
            $no_surat = '-';
        }
        $tgl_surat      = $this->input->post('tgl_surat');
        if ($tgl_surat == '') {
            $tgl_surat = date('d-m-Y');
        }   
        if ($this->input->post('jenis') == 3){
            $judul     = "Surat Penahanan (Pemberitahuan 3 Hari)";
            $data = array(
                'judul'     => $judul,
                'kepada'    => $no_surat,
                'tgl_surat' => $tgl_surat,
                'jenis'     => $this->input->post('jenis'),
                'pengirim'  => $this->surat_masuk->pengirim_list($this->role),
                'penerima'  => $this->surat_masuk->penerima_list(),
                'tahanan'   => $this->tahanan->get_all_tahanan($nama_tahanan),
                'instansi'  => $this->surat_masuk->instansi_list(),
                'alamat'    => $this->session->userdata('alamat'),
            );
            $this->load->view('surat_penahanan/3hari', $data);
        }else{
            $judul     = "Surat Penahanan (Pemberitahuan 10 Hari) ";
            $data = array(
                'judul'     => $judul,
                'kepada'    => $no_surat,
                'tgl_surat' => $tgl_surat,
                'jenis'     => $this->input->post('jenis'),
                'pengirim'  => $this->surat_masuk->pengirim_list($this->role),
                'penerima'  => $this->surat_masuk->penerima_list(),
                'tahanan'   => $this->tahanan->get_all_tahanan($nama_tahanan),
                'instansi'  => $this->surat_masuk->instansi_list(),
                'alamat'    => $this->session->userdata('alamat'),
            );
            $this->load->view('surat_penahanan/10hari', $data);
        }

        /*
        ob_start();
        if ($this->input->post('jenis') == 3){
            $judul     = "Surat Penahanan (Pemberitahuan 3 Hari)";
            $data = array(
                'judul'     => $judul,
                'jenis'     => $this->input->post('jenis'),
                'pengirim'  => $this->surat_masuk->pengirim_list($this->role),
                'penerima'  => $this->surat_masuk->penerima_list(),
                'tahanan'  => $this->tahanan->get_all_tahanan($nama_tahanan),
                'instansi'  => $this->surat_masuk->instansi_list(),
                'alamat'    => $this->session->userdata('alamat'),
            );
            $this->load->view('surat_penahanan/pdf', $data);  
            $html = ob_get_contents();
                    ob_end_clean();
            require_once('./assets/html2pdf/html2pdf.class.php');    
            $pdf = new HTML2PDF('P','A4','en');    
            $pdf->WriteHTML($html);    
            $pdf->Output('Surat.pdf', 'D');
        }else{
            $judul     = "Surat Penahanan (Pemberitahuan 10 Hari) ";
            $data = array(
                'judul'     => $judul,
                'jenis'     => $this->input->post('jenis'),
                'pengirim'  => $this->surat_masuk->pengirim_list($this->role),
                'penerima'  => $this->surat_masuk->penerima_list(),
                'tahanan'   => $this->tahanan->get_all_tahanan($nama_tahanan),
                'instansi'  => $this->surat_masuk->instansi_list(),
                'alamat'    => $this->session->userdata('alamat'),
            );
            $this->load->view('surat_penahanan/pdf2', $data);  
            $html = ob_get_contents();
                    ob_end_clean();
            require_once('./assets/html2pdf/html2pdf.class.php');    
            $pdf = new HTML2PDF('L','A4','en');    
            $pdf->WriteHTML($html);    
            $pdf->Output('Surat.pdf', 'D');
        }
        */
        
    }


}

