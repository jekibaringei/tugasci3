<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
    // Menampilkan view Sign In Page
    public function index(){
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        // jalankan ini ketika validasinya gagal
        if($this->form_validation->run() == false){
            $data['title'] = 'Sign In Page';
            $this->load->view('admin/auth_header',$data);
            $this->load->view('auth/login');
            $this->load->view('admin/auth_footer');
        } else{
            // dijalankan ketika validasi sukses dengan menjalankan fungsi login
            $this->_login();
        }
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['email' => $email ])->row_array();

        // jika usernya ada
        if($user){
            // jika usernya aktif
            if($user['is_active'] == 1 ){
                // cek password
                if(password_verify($password, $user['password'])){
                    // jika benar, menyiapkan data di session
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    // menyimpan ke session
                    $this->session->set_userdata($data);
                    // arahkan ke
                    redirect('beranda');

                }else{
                    // jika password salah jalankan ini
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Wrong password entered!
                    </div>');
                    redirect('auth');
                }
            }else{
                // jika usernya tidak aktif
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                This email has not been activated!
          </div>');
            redirect('auth');
            }
        }else{
            // tidak ada user dengan email tersebut, langsung gagalkan login
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            This email is not registered!
          </div>');
            redirect('auth');
        }
    }
    // Form validasi sekaligus untuk menampilkan Sign Up Page
    public function register(){
        // memberikan aturan / rules dari tiap input pada form
        $this->form_validation->set_rules('name','username','required|trim'); //trim digunakan supaya spasi tidak masuk ke database
        $this->form_validation->set_rules('email','email','required|trim|valid_email|is_unique[user.email]',['is_unique' => 'This email has already been registered!']);
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[4]|matches[password2]',['matches' => 'Password does not match!','min_length' => 'Password is too short!']);
        $this->form_validation->set_rules('password2','Confirm Password','required|trim|matches[password1]');

        // kalau gagal jalankan ini
        if($this->form_validation->run() == false){
            $data['title'] = 'Sign Up Page';
            $this->load->view('admin/auth_header',$data);
            $this->load->view('auth/register');
            $this->load->view('admin/auth_footer');
            // kalau suskses jalankan ini
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'image' => 'default.jpg',
                // enkripsi password menggunakan password_hash
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),//PASSWORD_DEFAULT merupakan algoritma security agar dipilih security terbaik oleh PHP
                'role_id' => 2,
                'is_active' => 1,
                'date_create' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Your account has been created successfully!
          </div>');
            redirect('auth');
        }
    }
    // method log out
    public function logout(){
        // bertugas membersihkan session, mengembalikan ke halaman login
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        You have successfully logged out!
        </div>');
        redirect('auth');


    }
}