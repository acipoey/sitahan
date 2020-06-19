<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penerima extends CI_Controller {

  public function __construct() {
      parent:: __construct();
      $this->load->library(array('form_validation'));
      if (!$this->session->userdata('logged_in'))
      {
          redirect(base_url('login'));
      }

      $this->id_user = $this->session->userdata('id_user');
      $this->role = $this->session->userdata('role');
      $this->load->model('penerima_model','penerima',true);
      $this->load->model('instansi_model', 'instansi', true);

  }


  public function index()
  {
    
    $data = array(
      'judul'   => "Data Penerima",
      'tombol'  => "Tambah Penerima",
    );
    

    $this->load->view('penerima/view', $data);
  }

  function datatables(){
        $data=$this->penerima->masuk_list();
        echo json_encode($data);
    }

    function add()
  {
    $data = array(
      'judul' => "Tambah Penerima",
      'instansi'  => $this->instansi->masuk_list(),
    );
    $this->load->view('penerima/add', $data);
  }

  public function save()
  {
    $data = array(
        'nama_penerima'     => $this->input->post('nama_penerima'),
        'created'           => date("Y-m-d H:i:s")

        );

        $status = $this->penerima->Simpan('tbl_ref_penerima',$data);
        if ($status) {
            $pesan = "Data Berhasil Ditambahkan";
            $this->session->set_flashdata('pesan_sks', $pesan);
            redirect('penerima');
        } else {
            $pesan = "Maaf, Data Gagal Ditambahkan";
            $this->session->set_flashdata('pesan_ggl', $pesan);
            redirect('penerima');
        }
  }

  function hapus(){
    $id=$this->input->post('id');
    $data=$this->penerima->Hapus($id);
    echo json_encode($data);
  }

  /*

  

  function savedata(){

    $id_dosen = '';
    $nama_dosen = $_POST['nama_dosen'];
    $nip = $_POST['nip'];


    $data = array(  
      'id_dosen'=> $id_dosen,
      'nama_dosen' => $nama_dosen,
      'nip' => $nip,
      'created' => date("Y-m-d H:i:s"),
      'updated' => timestamp,

      );
    
    $result = $this->M_dosen->Simpan('ref_dosen', $data);
    if($result == 1){
      $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
      header('location:'.base_url().'dosen');
    }else{
      $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
      header('location:'.base_url().'dosen');
    }   
  }

  function editdosen($kode= null){

    $data_dosen = $this->M_dosen->Getdosen($kode);

    $data = array(
      'id_dosen' => $data_dosen['id_dosen'],
      'nama_dosen' => $data_dosen['nama_dosen'],
      'nip' => $data_dosen['nip'],
      );
    $this->load->view('dosen/edit_dosen', $data);
  }

  function hapusdosen($kode = null){
    
    $result = $this->M_dosen->Hapus('ref_dosen', array('id_dosen' => $kode));
    if($result == 1){
      $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
      header('location:'.base_url().'dosen');
    }else{
      $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
      header('location:'.base_url().'dosen');
    }
  }

  function updatedosen(){
    
    $data = array(
      'id_dosen' => $this->input->post('id_dosen'),
      'nama_dosen' => $this->input->post('nama_dosen'),
      'nip' => $this->input->post('nip'),
      'created' => $this->input->post('created'),
      'updated' => $this->input->post('updated'),
      
      );
    
    $res = $this->M_dosen->Updatedosen($data);
    if($res>=0){
      $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
      header('location:'.base_url().'dosen');
    }else{
      $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
      header('location:'.base_url().'dosen');
    }
  }
  */

}

