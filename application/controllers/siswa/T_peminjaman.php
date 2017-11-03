<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("siswa_logged_in")) {
            redirect("siswa/Auth");
        }
        
        $this->load->model('siswa/T_peminjaman_model','db_pinjam');
    }

    public function index()
    {

        $no_a = '';
        $nm = '';
        $kl = '';
        $jr = '';
        $jk = '';

        $start = intval($this->input->get('start'));

        $id = $this->session->userdata("id_anggota");
        if (trim($id)=='') {
            $this->session->set_flashdata('error', 'Tidak ada anggota perpustakaan yang dipilih');
            redirect(site_url('siswa/auth/logout'));
        }


        $anggota_row = $this->db_pinjam->get_anggota_by_id($id);        
        if ($anggota_row) {
            $no_a = $anggota_row->no_anggota;
            $nm = $anggota_row->nama;
            $kl = $anggota_row->kelas;
            $jr = $anggota_row->jurusan;
            $jk = $anggota_row->jenis_kelamin;
        }

        $config['base_url'] = base_url() . 'siswa/t_peminjaman/index.html';
        $config['first_url'] = base_url() . 'siswa/t_peminjaman/index.html';
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->db_pinjam->total_rows($id); 

        $t_peminjaman = $this->db_pinjam->get_all($config['per_page'], $start,$id);

        $max_lama_pinjam = 14;
        $denda_per_hari = 50;
        $max_buku_pinjam = 3;

        $konstanta_row = $this->db_pinjam->get_konstanta();        
        if ($konstanta_row) {
            $max_lama_pinjam = $konstanta_row->max_lama_pinjam;
            $denda_per_hari = $konstanta_row->denda_per_hari;
            $max_buku_pinjam = $konstanta_row->max_buku_pinjam;
        } 

        $this->load->library('pagination');
        $this->pagination->initialize($config);


        $data = array(
            'id' => $id,
            't_peminjaman_data' => $t_peminjaman,
            'no_a' => $no_a,
            'nm' => $nm,
            'kl' => $kl,
            'jr' => $jr,
            'jk' => $jk,
            'total_rows' => $this->db_pinjam->total_rows($id),
            'max_lama_pinjam' => $max_lama_pinjam,
            'denda_per_hari' => $denda_per_hari,
            'max_buku_pinjam' => $max_buku_pinjam,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('siswa/header');
        $this->load->view('siswa/t_peminjaman/t_peminjaman_list', $data);
        $this->load->view('siswa/footer');    
    }

}