<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_model extends CI_Model{

    public function getAllmahasiswa(){
        // https://www.codeigniter.com/user_guide/database/query_builder.html#selecting-data
        // $query digunakan untuk menampung isi dari tabe mahasiswa
        $query=$this->db->get('mahasiswa');

        // https://www.codeigniter.com/user_guide/database/results.html
        // untuk menampikan isi dari query
        return $query->result_array();

        // atau bisa juga menggunakan code berikut
        // return $this->db->get('mahasiswa')->result_array();
    }

    public function tambahdatamhs(){
        $data=[
            "nama" => $this->input->post('nama',true),
            "nim" => $this->input->post('nim',true),
            "email" => $this->input->post('email',true),
            "jurusan" => $this->input->post('jurusan',true)
        ];

        $this->db->insert('mahasiswa', $data);
    }

    public function hapusdatamhs($id){
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
    }

}

/* End of file of mahasiswa_model.php */

?>