<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
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
        $this->load->model('Surat_keluar_model', 'surat_keluar', true);
        $this->load->model('instansi_model', 'instansi', true);
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->session->userdata('level_instansi') == 2) {
            $a = "Pengantar dari Pengadilan";
        } else {
            $a = "Pemberitahuan dari Lapas";
        }

        $data = array(
            'judul'         => "Data Surat " . $a,
            'tombol'        => "Tambah Surat Keluar",
        );

        $this->load->view('surat_masuk/view', $data);
    }

    function datatables()
    {
        $data = $this->surat_keluar->masuk_list($this->session->userdata('id_user'), $this->session->userdata('level_instansi'));
        echo json_encode($data);
    }

    function add()
    {
        if ($this->session->userdata('level_instansi') == 2) {
            $a = "Kirim Pengantar Ke Pengadilan";
        } else {
            $a = "Kirim Pemberitahuan Ke Lapas";
        }
        $data = array(
            'judul'     => $a,
            'pengirim'  => $this->surat_keluar->pengirim_list($this->role),
            'penerima'  => $this->surat_keluar->penerima_list_all($this->session->userdata('level_instansi')),
            'alamat'    => $this->session->userdata('alamat'),
        );
        $this->load->view('surat_masuk/add', $data);
    }


    function save()
    {

        $config['upload_path'] = './uploads/surat_keluar/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if (!empty($_FILES['chooseFile']['name'])) {
            if ($this->upload->do_upload('chooseFile')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['source_image'] = './uploads/surat_keluar/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 600;
                $config['height'] = 400;
                $config['new_image'] = './uploads/surat_keluar/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
            } else {
                $gambar = '';
            }
        } else {
            $gambar = '';
        }

        if ($gambar != ''){
            $upload_berkas = 1;
        }
        else{
            $upload_berkas = '';
        }

        $penerima = $this->instansi->get_id($this->input->post('penerima'));
        $pengirim = $this->instansi->get_id_alamat($this->id_user);

        $data = array(
            'no_surat'              => $this->input->post('no_surat'),
            'tgl_surat'             => $this->input->post('tgl_surat'),
            'asal_surat'            => $this->session->userdata('level_instansi'),
            'pengirim'              => $this->id_user,
            'alamat_pengirim'       => $pengirim->alamat,
            'perihal'               => $this->input->post('perihal'),
            'tembusan'              => $this->input->post('tembusan'),
            'hal'                   => $this->input->post('hal'),
            'kepada'                => $penerima->level,
            'file'                  => $gambar,
            'tgl_surat'             => date("Y-m-d H:i:s"),
            'created'               => date("Y-m-d H:i:s"),
            'upload_berkas'         => $upload_berkas,
            'id_created'            => $this->id_user,
            'instansi'              => $this->session->userdata('level_instansi'),

        );

        $status = $this->surat_keluar->Simpan('tbl_surat', $data);

        if ($status) {
            $pesan = "Data Berhasil Disimpan";
            $this->session->set_flashdata('pesan_sks', $pesan);
            redirect('surat_keluar');
        }
    }

    function hapus()
    {
        // if ($this->session->userdata('role') != 1) {
            $id = $this->input->post('id');

            $data = array(
                'status_delete' => 1,

            );

            $where = array(
                'id_surat'      => $this->input->post('id'),
            );

            $data = $this->surat_keluar->update($where, $data, 'tbl_surat');
            $pesan = "Data Berhasil Dihapus";
            $this->session->set_flashdata('pesan_sks', $pesan);
            echo json_encode($data);
        // }
    }

    function donwload()
    {   

        $id = $this->uri->segment(3);
        $file = $this->surat_keluar->getberkas($id);
        $this->load->helper('download');
        $file = 'uploads/surat_keluar/'.$file;
        force_download($file, NULL);   
    }

    function detail()
    {   
        $id = $this->uri->segment(3);

        $data = array(
            'judul'     => "Detail Surat",
            'pengirim'  => $this->surat_keluar->pengirim_list($this->role),
            'penerima'  => $this->surat_keluar->penerima_list_all($this->session->userdata('level_instansi')),
            'surat'     => $this->surat_keluar->getbyid_aa($id),
        );
        // var_dump($this->surat_keluar->getbyid($id));exit();
        $this->load->view('surat_masuk/detail', $data);
    }


    function update()
    {

        $data = array(
            'no_surat'              => $this->input->post('no_surat'),
            'tgl_surat'             => $this->input->post('tgl_surat'),
            'alamat_pengirim'       => $this->input->post('alamat_pengirim'),
            'perihal'               => $this->input->post('perihal'),
            'hal'                   => $this->input->post('hal'),
        );

        $where = array(
            'id_surat'      => $this->input->post('id_surat'),
        );

        $status = $this->surat_keluar->update($where, $data, 'tbl_surat');

        if (!empty($_FILES['chooseFile']['name'])) {
            $config['upload_path'] = './uploads/surat_keluar/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

            $this->upload->initialize($config);
            if (!empty($_FILES['chooseFile']['name'])) {

                if ($this->upload->do_upload('chooseFile')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './uploads/surat_keluar/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = './uploads/surat_keluar/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];
                } else {
                    $gambar = '';
                }
            } else {
                $gambar = '';
            }

            $Path = FCPATH.'uploads\surat_keluar\\'.$this->input->post('file_lama');
            unlink($Path);


            $data = array(
                'file'          => $gambar,
                'upload_berkas' => 1,

            );

            $where = array(
                'id_surat'      => $this->input->post('id_surat'),
            );

            $status1 = $this->surat_keluar->update($where, $data, 'tbl_surat');

        }

        if (!$status) {
            $pesan = "Data Berhasil Disimpan";
            $this->session->set_flashdata('pesan_sks', $pesan);
            redirect('surat_keluar');
        }
    }
}
