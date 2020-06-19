<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
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
        $this->load->model('surat_masuk_model', 'surat_masuk', true);
        $this->load->model('surat_keluar_model', 'surat_keluar', true);
        $this->load->library('upload');
    }

    public function index()
    {

        if ($this->session->userdata('level_instansi') == 2) {
            $a = "Pemberitahuan ke Pengadilan";
        } else {
            $a = "Pengantar ke Lapas";
        }

        $data = array(
            'judul'         => "Data Surat " . $a,
            'tombol'         => "Tambah Surat Masuk",
        );

        $this->load->view('surat_keluar/view', $data);
    }

    function datatables()
    {
        $data = $this->surat_keluar->masuk_list2($this->session->userdata('id_user'), $this->session->userdata('level_instansi'));
        // var_dump($data);exit();
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
        $this->load->view('surat_keluar/add', $data);
    }


    function save()
    {

        $config['upload_path'] = './uploads/surat_keluar/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if (!empty($_FILES['file_upload1']['name'])) {

            if ($this->upload->do_upload('file_upload1')) {
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

        if ($gambar != '')
            $upload_berkas = TRUE;
        else
            $upload_berkas = '';

        $data = array(
            'no_surat'              => $this->input->post('no_surat'),
            'tgl_surat'             => $this->input->post('tgl_surat'),
            'asal_surat'            => $this->session->userdata('id_instansi'),
            'pengirim'              => $this->id_user,
            'alamat_pengirim'       => $this->input->post('alamat_pengirim'),
            'perihal'               => $this->input->post('perihal'),
            'hal'                   => $this->input->post('hal'),
            'file'                  => $gambar,
            'tgl_surat'             => date("Y-m-d H:i:s"),
            'created'               => date("Y-m-d H:i:s"),
            'upload_berkas'         => $upload_berkas,
            'id_created'            => $this->id_user,
            'instansi'              => $this->session->userdata('id_instansi'),

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
        $id = $this->input->post('id');
        $data = $this->surat_masuk->Hapus($id);
        echo json_encode($data);
    }

    function upload_bekas()
    {

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

        $data2 = array(
            'upload_berkas'     => 1,
            'file'              => $gambar,
        );

        $where = array(
            'id_surat'    =>  $this->input->post('kode'),
        );
        $status = $this->surat_masuk->update($where, $data2, 'tbl_surat');
        if (!$status) {
            $pesan = "Berkas Berhasil Diupload";
            $this->session->set_flashdata('pesan_sks', $pesan);
            redirect('surat_keluar');
        }
    }


    function kirim()
    {

        $data2 = array(
            'status_kirim'       => TRUE,
            'tgl_diterima'     => date("Y-m-d H:i:s"),
        );

        $where = array(
            'id_surat'         =>  $this->input->post('id'),
        );
        $status = $this->surat_masuk->update($where, $data2, 'tbl_surat');
        $pesan = "Berkas Berhasil Dikirim";
        $this->session->set_flashdata('pesan_sks', $pesan);
        echo json_encode($status);
    }

    function edit()
    {   
        $id = $this->uri->segment(3);
        // var_dump($this->surat_keluar->getbyid($id));exit();
        $data = array(
            'judul'     => "Edit Surat",
            'pengirim'  => $this->surat_keluar->pengirim_list($this->role),
            'penerima'  => $this->surat_keluar->penerima_list_all($this->session->userdata('level_instansi')),
            'surat'     => $this->surat_keluar->getbyid($id),
        );
        $this->load->view('surat_keluar/edit', $data);
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
        $this->load->view('surat_keluar/detail', $data);
    }

}
