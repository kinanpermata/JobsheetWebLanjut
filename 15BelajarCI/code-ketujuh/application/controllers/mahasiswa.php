<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

    // fungsi yang akan dijalankan saat classnya diinstansiasi
    public function __construct()
    {
         parent::__construct();
         $this->load->model('mahasiswa_model');
         $this->load->helper('url', 'form');
         $this->load->library('form_validation');
    }
    
     public function index()
    {
        $data['title']='List Mahasiswa';
        $data['mahasiswa']=$this->mahasiswa_model->getAllmahasiswa();
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('template/footer');
    }

    
    public function tambah(){
        $data['title']='Form Menambahkan Data Mahasiswa';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE){
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/tambah', $data);
            $this->load->view('template/footer');
        } else{
            # code...
            $this->mahasiswa_model->tambahdatamhs();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('mahasiswa', 'refresh');
        }
        
    }

    public function hapus($id){
        $this->mahasiswa_model->hapusdatamhs($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('mahasiswa','refresh');
    }

}

/* End of file Controllername.php */

?>