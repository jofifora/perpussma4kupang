<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_awal extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('halaman_awal');
		$this->load->view('footer');
	}
}
