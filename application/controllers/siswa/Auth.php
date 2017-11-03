<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
    {
        parent::__construct();
               
    }
 
    public function index()
    {  
    	$this->logged_in_check(); 
        $this->load->library('form_validation');
        $this->form_validation->set_rules("username", "User Name", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == true)
        {
            $this->load->model('siswa/auth_model', 'auth');  
            // check the username & password of user
            $status = $this->auth->validate();
            if ($status == "ERR_INVALID_USERNAME") {
                $this->session->set_flashdata("error", "No. Anggota salah");
            }
            elseif ($status == "ERR_INVALID_PASSWORD") {
                $this->session->set_flashdata("error", "Password is invalid");
            }
            else
            {
                // success
                // store the user data to session
                $this->session->set_userdata($this->auth->get_data());
                $this->session->set_userdata("siswa_logged_in", true);
                // redirect to dashboard
                redirect("siswa/Halaman_awal");
            }
        }
       
        $this->load->view("siswa/auth");
    } 

    public function logged_in_check()
    {
        if ($this->session->userdata("siswa_logged_in")) {
            redirect("siswa/Halaman_awal");
        }
    }
 
    public function logout()
    {
        $this->session->unset_userdata("siswa_logged_in");
        $this->session->sess_destroy();
        redirect("siswa/Auth");
    }
}
