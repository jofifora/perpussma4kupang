<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_awal extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
        $this->load->model('Halaman_awal_model');
    }

	public function index()
	{
		$t_ebook = $this->Halaman_awal_model->get_all();
		$data = array(
		        	'ebook_data' => $t_ebook,
		        	'status' => $this->session->userdata("status"),
		        );
		$this->load->view('header');
		$this->load->view('halaman_awal', $data);
		$this->load->view('footer');
	}
}
