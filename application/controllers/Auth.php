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
            $this->load->model('auth_model', 'auth');  
            // check the username & password of user
            $status = $this->auth->validate();
            if ($status == "ERR_INVALID_USERNAME") {
                $this->session->set_flashdata("error", "Id Kelas is invalid");
            }
            elseif ($status == "ERR_INVALID_PASSWORD") {
                $this->session->set_flashdata("error", "Password is invalid");
            }
            else
            {
                // success
                // store the user data to session
                $this->session->set_userdata($this->auth->get_data());
                $this->session->set_userdata("logged_in", true);
                // redirect to dashboard
                redirect("Halaman_awal");
            }
        }
       
        $this->load->view("auth");
    } 

    public function logged_in_check()
    {
        if ($this->session->userdata("logged_in")) {
            redirect("Halaman_awal");
        }
    }
 
    public function logout()
    {
        $this->session->unset_userdata("logged_in");
        $this->session->sess_destroy();
        redirect("Auth");
    }
}
