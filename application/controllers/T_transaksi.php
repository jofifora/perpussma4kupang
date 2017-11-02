<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
        
        $this->load->model('T_transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id = urldecode($this->input->get('id', TRUE));
        if (trim($id)=='') {
            $this->session->set_flashdata('message', 'Tidak ada anggota perpustakaan yang dipilih');
            redirect(site_url('t_anggota'));
        }

    	$id = urldecode($this->input->get('id', TRUE));
    	$t_transaksi = $this->T_transaksi_model->get_all($id);

        $max_lama_pinjam = 14;
        $denda_per_hari = 50;
        $max_buku_pinjam = 3;

        $konstanta_row = $this->T_transaksi_model->get_konstanta();        
        if ($konstanta_row) {
            $max_lama_pinjam = $konstanta_row->max_lama_pinjam;
            $denda_per_hari = $konstanta_row->denda_per_hari;
            $max_buku_pinjam = $konstanta_row->max_buku_pinjam;
        } 

        $data = array(
        	'id' => $id,
            't_transaksi_data' => $t_transaksi,
            'total_rows' => $this->T_transaksi_model->total_rows($id),
            'max_lama_pinjam' => $max_lama_pinjam,
            'denda_per_hari' => $denda_per_hari,
            'max_buku_pinjam' => $max_buku_pinjam,
        );
        $this->load->view('header');
        $this->load->view('t_transaksi/t_transaksi_list', $data);
        $this->load->view('footer');    
    }

    public function kembalikan_buku() 
    {
        $this->_rules();

        $id_anggota = '';

        if ($this->form_validation->run() == FALSE) {
            $id_anggota = $this->input->post('id_anggota',TRUE);
            $this->session->set_flashdata('message', validation_errors());
            redirect(site_url('t_transaksi?id='.$id_anggota));
        } else {
            $id_anggota = $this->input->post('id_anggota',TRUE);
            $id_peminjaman = $this->input->post('id_peminjaman',TRUE);
            $data = array(
                'id_peminjaman' => $id_peminjaman,
                'tanggal_pengembalian' =>date('Y/m/d'),
                'denda' => $this->denda_pinjaman($id_peminjaman),
        );

            $this->T_transaksi_model->insertPengembalian($data);
            $this->session->set_flashdata('message', 'Berhasil kembalikan buku');
            redirect(site_url('t_transaksi?id='.$id_anggota));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_peminjaman', 'id peminjaman', 'trim|required|is_unique[t_pengembalian.id_peminjaman]');
        $this->form_validation->set_rules('id_anggota', 'id anggota', 'trim|required');
        //$this->form_validation->set_rules('tanggal_pengembalian', 'tanggal pengembalian', 'trim|required');
        //$this->form_validation->set_rules('denda', 'denda', 'trim|required');

        $this->form_validation->set_rules('id_pengembalian', 'id_pengembalian', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function denda_pinjaman($id_peminjaman){
        $date1 = date_create(date('Y/m/d'));
        $pinjaman_row = $this->T_transaksi_model->get_pinjaman_by_id($id_peminjaman);        
        if ($pinjaman_row) {
            $date1 = date_create($pinjaman_row->tanggal_pinjam);
        } 
        $date2 = date_create(date('Y/m/d'));
        $lamaPinjam = 0;
        if ($date1<$date2) {
            $lamaPinjam = date_diff($date1,$date2)->format("%a");
        }

        $max_lama_pinjam = 14;
        $denda_per_hari = 50;

        $konstanta_row = $this->T_transaksi_model->get_konstanta();        
        if ($konstanta_row) {
            $max_lama_pinjam = $konstanta_row->max_lama_pinjam;
            $denda_per_hari = $konstanta_row->denda_per_hari;
        } 

        
        $denda_uang = 0;
        if ($lamaPinjam > $max_lama_pinjam) {
            $denda_hari = $lamaPinjam - $max_lama_pinjam;
            $denda_uang = $denda_hari * $denda_per_hari;
        }
        return $denda_uang;         
    }

}