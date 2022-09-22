<?php
    class mahasiswa extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('Mahasiswa_model');
        }
        public function index() {
            $data['judul']= 'Students Page';
            $data['mahasiswa']= $this->Mahasiswa_model->getAllMahasiswa();
            $this->form_validation->set_rules('kode','kode','required');
            $this->form_validation->set_rules('matakuliah','matakuliah','required');
            $this->form_validation->set_rules('sks','sks','required');
            $this->form_validation->set_rules('semester','semester','required');
            $this->form_validation->set_rules('jurusan','jurusan','required');
            if($this->form_validation->run()== False){
                $this->load->view('templates/header',$data);
                $this->load->view('mahasiswa/index',$data);
                $this->load->view('templates/footer'); 
            }else{
                $data =[
                    'kode' => $this->input->post('kode'),
                    'matakuliah' => $this->input->post('matakuliah'),
                    'sks' => $this->input->post('sks'),
                    'semester' => $this->input->post('semester'),
                    'jurusan' => $this->input->post('jurusan'),
                ];
                $this->db->insert('mahasiswa',$data);
                redirect('mahasiswa');
            }
        }
        public function ubah($id = null)
        {
            $this->Mahasiswa_model->ubahDataMahasiswa($id);
            redirect('mahasiswa');
        }
    }
    ?>