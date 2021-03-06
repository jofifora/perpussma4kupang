<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
        $this->load->model('V_transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        //$q = urldecode($this->input->get('q', TRUE));
        //$start = intval($this->input->get('start'));

        
        $no_a = urldecode($this->input->get('no_a', TRUE));
        $nm = urldecode($this->input->get('nm', TRUE));
        $kl = urldecode($this->input->get('kl', TRUE));
        $jr = urldecode($this->input->get('jr', TRUE));
        $jk = urldecode($this->input->get('jk', TRUE));

        $jd_b = urldecode($this->input->get('jd_b', TRUE));
        $id_kat = urldecode($this->input->get('id_kat', TRUE));
        $id_rk = urldecode($this->input->get('id_rk', TRUE));
        $th = urldecode($this->input->get('th', TRUE));

        $tgl_pj1 = urldecode($this->input->get('tgl_pj1', TRUE));
        $tgl_pj2 = urldecode($this->input->get('tgl_pj2', TRUE));

        if (trim($tgl_pj1) == '') {
        	$tgl_pj2 = '';
        }
        
        $tgl_pb1 = urldecode($this->input->get('tgl_pb1', TRUE));
        $tgl_pb2 = urldecode($this->input->get('tgl_pb2', TRUE));

        if (trim($tgl_pb1) == '') {
        	$tgl_pb2 = '';
        }

        $st_pb = urldecode($this->input->get('st_pb', TRUE));

        $start = intval($this->input->get('start'));

        if (trim($no_a)<>'') {
            $row_anggota = $this->V_transaksi_model->get_anggota_by_no_anggota($no_a);
            if ($row_anggota) {
                $nm = $row_anggota->nama;
                $kl = $row_anggota->kelas;
                $jr = $row_anggota->jurusan;
                $jk = $row_anggota->jenis_kelamin;
            }
        }

        $config['base_url'] = base_url() . 'v_transaksi/index.html';
        $config['first_url'] = base_url() . 'v_transaksi/index.html';

        $count_parameter = 0;

        /*
        if ($q <> '') {
            $config['base_url'] = base_url() . 'v_transaksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'v_transaksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'v_transaksi/index.html';
            $config['first_url'] = base_url() . 'v_transaksi/index.html';
        }
        */

        if (trim($no_a)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'no_a='.urlencode($no_a);
            $config['first_url'] = $config['base_url'].$tanda.'no_a='.urlencode($no_a);
        } 
        if (trim($nm)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'nm='.urlencode($nm);
            $config['first_url'] = $config['base_url'].$tanda.'nm='.urlencode($nm);
        }
        if (trim($kl)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'kl='.urlencode($kl);
            $config['first_url'] = $config['base_url'].$tanda.'kl='.urlencode($kl);
        } 
        if (trim($jr)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'jr='.urlencode($jr);
            $config['first_url'] = $config['base_url'].$tanda.'jr='.urlencode($jr);
        }
        if (trim($jk)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'jk='.urlencode($jk);
            $config['first_url'] = $config['base_url'].$tanda.'jk='.urlencode($jk);
        }
        if (trim($jd_b)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'jd_b='.urlencode($jd_b);
            $config['first_url'] = $config['base_url'].$tanda.'jd_b='.urlencode($jd_b);
        } 
        if (trim($id_kat)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'id_kat='.urlencode($id_kat);
            $config['first_url'] = $config['base_url'].$tanda.'id_kat='.urlencode($id_kat);
        }
        if (trim($id_rk)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'id_rk='.urlencode($id_rk);
            $config['first_url'] = $config['base_url'].$tanda.'id_rk='.urlencode($id_rk);
        } 
        if (trim($th)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'th='.urlencode($th);
            $config['first_url'] = $config['base_url'].$tanda.'th='.urlencode($th);
        }

        if (trim($tgl_pj1)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'tgl_pj1='.urlencode($tgl_pj1);
            $config['first_url'] = $config['base_url'].$tanda.'tgl_pj1='.urlencode($tgl_pj1);
        } 
        if (trim($tgl_pj2)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'tgl_pj2='.urlencode($tgl_pj2);
            $config['first_url'] = $config['base_url'].$tanda.'tgl_pj2='.urlencode($tgl_pj2);
        }
        if (trim($tgl_pb1)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'tgl_pb1='.urlencode($tgl_pb1);
            $config['first_url'] = $config['base_url'].$tanda.'tgl_pb1='.urlencode($tgl_pb1);
        } 
        if (trim($tgl_pb2)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'tgl_pb2='.urlencode($tgl_pb2);
            $config['first_url'] = $config['base_url'].$tanda.'tgl_pb2='.urlencode($tgl_pb2);
        }
        if (trim($st_pb)<>"") {
            $count_parameter = $count_parameter + 1;
            $tanda = ($count_parameter > 1) ? '&' : '?' ;
            $config['base_url'] = $config['base_url'].$tanda.'st_pb='.urlencode($st_pb);
            $config['first_url'] = $config['base_url'].$tanda.'st_pb='.urlencode($st_pb);
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->V_transaksi_model->total_rows($no_a, $nm, $kl, $jr, $jk, $jd_b, $id_kat, $id_rk, $th, $tgl_pj1, $tgl_pj2, $tgl_pb1, $tgl_pb2, $st_pb);
        $v_transaksi = $this->V_transaksi_model->get_limit_data($config['per_page'], $start, $no_a, $nm, $kl, $jr, $jk, $jd_b, $id_kat, $id_rk, $th, $tgl_pj1, $tgl_pj2, $tgl_pb1, $tgl_pb2, $st_pb);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'v_transaksi_data' => $v_transaksi,
            'no_anggota' => $no_a,
            'nama' => $nm,
            'kelas' => $kl,
            'jurusan' => $jr,
            'jenis_kelamin' => $jk,
            'judul_buku' => $jd_b,
            'id_kategori' => $id_kat,
            'id_rak' => $id_rk,
            'tahun' => $th,
            'tgl_pj1' => $tgl_pj1,
            'tgl_pj2' => $tgl_pj2,
            'tgl_pb1' => $tgl_pb1,
            'tgl_pb2' => $tgl_pb2,
            'st_pb' => $st_pb,
            'data_kategori' => $this->V_transaksi_model->get_all_kategori(),
            'data_rak' => $this->V_transaksi_model->get_all_rak(),
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('v_transaksi/v_transaksi_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->V_transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id_peminjaman' => $row->id_peminjaman,
				'id_buku' => $row->id_buku,
				'judul_buku' => $row->judul_buku,
				'id_kategori' => $row->id_kategori,
				'nama_kategori' => $row->nama_kategori,
				'deskripsi_kategori' => $row->deskripsi_kategori,
				'id_rak' => $row->id_rak,
				'nama_rak' => $row->nama_rak,
				'deskripsi_rak' => $row->deskripsi_rak,
				'tahun' => $row->tahun,
				'stok' => $row->stok,
				'eksemplar' => $row->eksemplar,
				'id_anggota' => $row->id_anggota,
				'no_anggota' => $row->no_anggota,
				'nama' => $row->nama,
				'kelas' => $row->kelas,
				'jurusan' => $row->jurusan,
				'jenis_kelamin' => $row->jenis_kelamin,
				'tanggal_pinjam' => $row->tanggal_pinjam,
				'id_pengembalian' => $row->id_pengembalian,
				'tanggal_pengembalian' => $row->tanggal_pengembalian,
				'denda' => $row->denda,
			    );
            $this->load->view('header');
            $this->load->view('v_transaksi/v_transaksi_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_transaksi'));
        }
    }

    /*

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('v_transaksi/create_action'),
	    'id_peminjaman' => set_value('id_peminjaman'),
	    'id_buku' => set_value('id_buku'),
	    'judul_buku' => set_value('judul_buku'),
	    'id_kategori' => set_value('id_kategori'),
	    'nama_kategori' => set_value('nama_kategori'),
	    'deskripsi_kategori' => set_value('deskripsi_kategori'),
	    'id_rak' => set_value('id_rak'),
	    'nama_rak' => set_value('nama_rak'),
	    'deskripsi_rak' => set_value('deskripsi_rak'),
	    'tahun' => set_value('tahun'),
	    'stok' => set_value('stok'),
	    'eksemplar' => set_value('eksemplar'),
	    'id_anggota' => set_value('id_anggota'),
	    'no_anggota' => set_value('no_anggota'),
	    'nama' => set_value('nama'),
	    'kelas' => set_value('kelas'),
	    'jurusan' => set_value('jurusan'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tanggal_pinjam' => set_value('tanggal_pinjam'),
	    'id_pengembalian' => set_value('id_pengembalian'),
	    'tanggal_pengembalian' => set_value('tanggal_pengembalian'),
	    'denda' => set_value('denda'),
	);
        $this->load->view('v_transaksi/v_transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_peminjaman' => $this->input->post('id_peminjaman',TRUE),
		'id_buku' => $this->input->post('id_buku',TRUE),
		'judul_buku' => $this->input->post('judul_buku',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'deskripsi_kategori' => $this->input->post('deskripsi_kategori',TRUE),
		'id_rak' => $this->input->post('id_rak',TRUE),
		'nama_rak' => $this->input->post('nama_rak',TRUE),
		'deskripsi_rak' => $this->input->post('deskripsi_rak',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'eksemplar' => $this->input->post('eksemplar',TRUE),
		'id_anggota' => $this->input->post('id_anggota',TRUE),
		'no_anggota' => $this->input->post('no_anggota',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_pinjam' => $this->input->post('tanggal_pinjam',TRUE),
		'id_pengembalian' => $this->input->post('id_pengembalian',TRUE),
		'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian',TRUE),
		'denda' => $this->input->post('denda',TRUE),
	    );

            $this->V_transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('v_transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->V_transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('v_transaksi/update_action'),
		'id_peminjaman' => set_value('id_peminjaman', $row->id_peminjaman),
		'id_buku' => set_value('id_buku', $row->id_buku),
		'judul_buku' => set_value('judul_buku', $row->judul_buku),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
		'deskripsi_kategori' => set_value('deskripsi_kategori', $row->deskripsi_kategori),
		'id_rak' => set_value('id_rak', $row->id_rak),
		'nama_rak' => set_value('nama_rak', $row->nama_rak),
		'deskripsi_rak' => set_value('deskripsi_rak', $row->deskripsi_rak),
		'tahun' => set_value('tahun', $row->tahun),
		'stok' => set_value('stok', $row->stok),
		'eksemplar' => set_value('eksemplar', $row->eksemplar),
		'id_anggota' => set_value('id_anggota', $row->id_anggota),
		'no_anggota' => set_value('no_anggota', $row->no_anggota),
		'nama' => set_value('nama', $row->nama),
		'kelas' => set_value('kelas', $row->kelas),
		'jurusan' => set_value('jurusan', $row->jurusan),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tanggal_pinjam' => set_value('tanggal_pinjam', $row->tanggal_pinjam),
		'id_pengembalian' => set_value('id_pengembalian', $row->id_pengembalian),
		'tanggal_pengembalian' => set_value('tanggal_pengembalian', $row->tanggal_pengembalian),
		'denda' => set_value('denda', $row->denda),
	    );
            $this->load->view('v_transaksi/v_transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_peminjaman' => $this->input->post('id_peminjaman',TRUE),
		'id_buku' => $this->input->post('id_buku',TRUE),
		'judul_buku' => $this->input->post('judul_buku',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'deskripsi_kategori' => $this->input->post('deskripsi_kategori',TRUE),
		'id_rak' => $this->input->post('id_rak',TRUE),
		'nama_rak' => $this->input->post('nama_rak',TRUE),
		'deskripsi_rak' => $this->input->post('deskripsi_rak',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'eksemplar' => $this->input->post('eksemplar',TRUE),
		'id_anggota' => $this->input->post('id_anggota',TRUE),
		'no_anggota' => $this->input->post('no_anggota',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_pinjam' => $this->input->post('tanggal_pinjam',TRUE),
		'id_pengembalian' => $this->input->post('id_pengembalian',TRUE),
		'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian',TRUE),
		'denda' => $this->input->post('denda',TRUE),
	    );

            $this->V_transaksi_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('v_transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->V_transaksi_model->get_by_id($id);

        if ($row) {
            $this->V_transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('v_transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_peminjaman', 'id peminjaman', 'trim|required');
	$this->form_validation->set_rules('id_buku', 'id buku', 'trim|required');
	$this->form_validation->set_rules('judul_buku', 'judul buku', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');
	$this->form_validation->set_rules('deskripsi_kategori', 'deskripsi kategori', 'trim|required');
	$this->form_validation->set_rules('id_rak', 'id rak', 'trim|required');
	$this->form_validation->set_rules('nama_rak', 'nama rak', 'trim|required');
	$this->form_validation->set_rules('deskripsi_rak', 'deskripsi rak', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('eksemplar', 'eksemplar', 'trim|required');
	$this->form_validation->set_rules('id_anggota', 'id anggota', 'trim|required');
	$this->form_validation->set_rules('no_anggota', 'no anggota', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tanggal_pinjam', 'tanggal pinjam', 'trim|required');
	$this->form_validation->set_rules('id_pengembalian', 'id pengembalian', 'trim|required');
	$this->form_validation->set_rules('tanggal_pengembalian', 'tanggal pengembalian', 'trim|required');
	$this->form_validation->set_rules('denda', 'denda', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    */

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "v_transaksi.xls";
        $judul = "v_transaksi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Peminjaman");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Buku");
	xlsWriteLabel($tablehead, $kolomhead++, "Judul Buku");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Rak");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Rak");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi Rak");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");
	xlsWriteLabel($tablehead, $kolomhead++, "Eksemplar");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Anggota");
	xlsWriteLabel($tablehead, $kolomhead++, "No Anggota");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Jurusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pinjam");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pengembalian");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pengembalian");
	xlsWriteLabel($tablehead, $kolomhead++, "Denda");

	foreach ($this->V_transaksi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_peminjaman);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_buku);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul_buku);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi_kategori);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_rak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_rak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi_rak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stok);
	    xlsWriteNumber($tablebody, $kolombody++, $data->eksemplar);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_anggota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_anggota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jurusan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pinjam);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pengembalian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pengembalian);
	    xlsWriteNumber($tablebody, $kolombody++, $data->denda);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=v_transaksi.doc");

        $data = array(
            'v_transaksi_data' => $this->V_transaksi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('v_transaksi/v_transaksi_doc',$data);
    }

}

/* End of file V_transaksi.php */
/* Location: ./application/controllers/V_transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-31 03:56:24 */
/* http://harviacode.com */