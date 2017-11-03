<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_awal extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("siswa_logged_in")) {
            redirect("siswa/Auth");
        }
        $this->load->model('Halaman_awal_model');
    }

	public function index()
	{
		$t_ebook = $this->Halaman_awal_model->get_all();
		$data = array(
		        	'ebook_data' => $t_ebook,
		        	'id_anggota' => $this->session->userdata("id_anggota"),
		        	'no_anggota' => $this->session->userdata("no_anggota"),
		        	'nama' => $this->session->userdata("nama"),
		        	'kelas' => $this->session->userdata("kelas"),
		        	'jurusan' => $this->session->userdata("jurusan"),
		        	'jenis_kelamin' => $this->session->userdata("jenis_kelamin"),
		        	'jumlah_belum_dikembalikan' => $this->Halaman_awal_model->total_pinjaman_belum_dikembalikan_by_id($this->session->userdata("id_anggota")),
		        );
		$this->load->view('siswa/header');
		$this->load->view('siswa/halaman_awal', $data);
		$this->load->view('siswa/footer');
	}
}
