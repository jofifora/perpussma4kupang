<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pilih_buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }

        $this->load->model('T_pilih_buku_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        /*
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        */

        $id = urldecode($this->input->get('id', TRUE));
        if (trim($id)=='') {
            $this->session->set_flashdata('message', 'Tidak ada anggota perpustakaan yang dipilih');
            redirect(site_url('t_anggota'));
        }

        $judul_buku = urldecode($this->input->get('judul_buku', TRUE));
        $id_kategori = urldecode($this->input->get('id_kategori', TRUE));
        $id_rak = urldecode($this->input->get('id_rak', TRUE));
        $tahun = urldecode($this->input->get('tahun', TRUE));
        $start = intval($this->input->get('start'));

        $config['base_url'] = base_url() . 't_pilih_buku/index.html';
        $config['first_url'] = base_url() . 't_pilih_buku/index.html';

        $count_parameter = 0;

        
        /*
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_buku/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_buku/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_buku/index.html';
            $config['first_url'] = base_url() . 't_buku/index.html';
        }
        */

        if (trim($id)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'id='.urlencode($id);
            $config['first_url'] = $config['base_url'].$tanda.'id='.urlencode($id);
        } 
        if (trim($judul_buku)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'judul_buku='.urlencode($judul_buku);
            $config['first_url'] = $config['base_url'].$tanda.'judul_buku='.urlencode($judul_buku);
        } 
        if (trim($id_kategori)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'id_kategori='.urlencode($id_kategori);
            $config['first_url'] = $config['base_url'].$tanda.'id_kategori='.urlencode($id_kategori);
        }
        if (trim($id_rak)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'id_rak='.urlencode($id_rak);
            $config['first_url'] = $config['base_url'].$tanda.'id_rak='.urlencode($id_rak);
        } 
        if (trim($tahun)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'tahun='.urlencode($tahun);
            $config['first_url'] = $config['base_url'].$tanda.'tahun='.urlencode($tahun);
        }


        /*
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_buku_model->total_rows($q);
        $t_buku = $this->T_buku_model->get_limit_data($config['per_page'], $start, $q);
        */

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_pilih_buku_model->total_rows($judul_buku, $id_kategori, $id_rak, $tahun);
        $t_buku = $this->T_pilih_buku_model->get_limit_data($config['per_page'], $start, $judul_buku, $id_kategori, $id_rak, $tahun);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'id' => $id,
            't_buku_data' => $t_buku,
            'judul_buku' => $judul_buku,
            'id_kategori' => $id_kategori,
            'id_rak' => $id_rak,
            'tahun' => $tahun,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'data_kategori' => $this->T_pilih_buku_model->get_all_kategori(),
            'data_rak' => $this->T_pilih_buku_model->get_all_rak(),
        );
        $this->load->view('header');
        $this->load->view('t_pilih_buku/t_pilih_buku_list', $data);
        $this->load->view('footer');
    }

    public function createAction() 
    {
        $id = $this->input->post('id_anggota',TRUE);
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors());
            redirect(site_url('t_transaksi?id='.$id));

        } else {
            $data = array(
                'id_buku' => $this->input->post('id_buku',TRUE),
                'id_anggota' => $id,
                //'tanggal_pinjam' => $this->input->post('tanggal_pinjam',TRUE),
                'tanggal_pinjam' => date("Y/m/d"),
        );

            $this->T_pilih_buku_model->insert($data);
            $this->session->set_flashdata('message', 'buku berhasil ditambah..');
            redirect(site_url('t_transaksi?id='.$id));
        }
    }

    /*
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'id_peminjaman' => $this->input->post('id_peminjaman',TRUE),
            'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian',TRUE),
            'denda' => $this->input->post('denda',TRUE),
        );

            $this->T_pilih_buku_model->insert($data);
            $this->session->set_flashdata('message', 'buku berhasil ditambah..');
            redirect(site_url('t_transaksi?'.$this->id));
        }
    }
    */

    public function _rules() 
    {
    $this->form_validation->set_rules('id_buku', 'id buku', 'trim|required');
    $this->form_validation->set_rules('id_anggota', 'id anggota', 'trim|required');
    $this->form_validation->set_rules('tanggal_pinjam', 'tanggal pinjam', 'trim|required');

    $this->form_validation->set_rules('id_peminjaman', 'id_peminjaman', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    /*
    public function _rules() 
    {
    $this->form_validation->set_rules('id_peminjaman', 'id peminjaman', 'trim|required|is_unique[t_pengembalian.id_peminjaman]');
    $this->form_validation->set_rules('tanggal_pengembalian', 'tanggal pengembalian', 'trim|required');
    $this->form_validation->set_rules('denda', 'denda', 'trim|required|integer');

    $this->form_validation->set_rules('id_pengembalian', 'id_pengembalian', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    */
}

/* End of file T_buku.php */
/* Location: ./application/controllers/T_buku.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-31 04:23:05 */
/* http://harviacode.com */