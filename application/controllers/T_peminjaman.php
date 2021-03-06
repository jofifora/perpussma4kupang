<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
        $this->load->model('T_peminjaman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_peminjaman/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_peminjaman/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_peminjaman/index.html';
            $config['first_url'] = base_url() . 't_peminjaman/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_peminjaman_model->total_rows($q);
        $t_peminjaman = $this->T_peminjaman_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_peminjaman_data' => $t_peminjaman,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('t_peminjaman/t_peminjaman_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->T_peminjaman_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_peminjaman' => $row->id_peminjaman,
		'id_buku' => $row->id_buku,
		'id_anggota' => $row->id_anggota,
		'tanggal_pinjam' => $row->tanggal_pinjam,
	    );
            $this->load->view('header');
            $this->load->view('t_peminjaman/t_peminjaman_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_peminjaman'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_peminjaman/create_action'),
    	    'id_peminjaman' => set_value('id_peminjaman'),
    	    'id_buku' => set_value('id_buku'),
    	    'id_anggota' => set_value('id_anggota'),
    	    'tanggal_pinjam' => set_value('tanggal_pinjam'),
	);
        $this->load->view('header');
        $this->load->view('t_peminjaman/t_peminjaman_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_buku' => $this->input->post('id_buku',TRUE),
        		'id_anggota' => $this->input->post('id_anggota',TRUE),
        		'tanggal_pinjam' => $this->input->post('tanggal_pinjam',TRUE),
	    );

            $this->T_peminjaman_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_peminjaman'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_peminjaman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_peminjaman/update_action'),
		'id_peminjaman' => set_value('id_peminjaman', $row->id_peminjaman),
		'id_buku' => set_value('id_buku', $row->id_buku),
		'id_anggota' => set_value('id_anggota', $row->id_anggota),
		'tanggal_pinjam' => set_value('tanggal_pinjam', $row->tanggal_pinjam),
	    );
            $this->load->view('header');
            $this->load->view('t_peminjaman/t_peminjaman_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_peminjaman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_peminjaman', TRUE));
        } else {
            $data = array(
		'id_buku' => $this->input->post('id_buku',TRUE),
		'id_anggota' => $this->input->post('id_anggota',TRUE),
		'tanggal_pinjam' => $this->input->post('tanggal_pinjam',TRUE),
	    );

            $this->T_peminjaman_model->update($this->input->post('id_peminjaman', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_peminjaman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_peminjaman_model->get_by_id($id);

        if ($row) {
            $this->T_peminjaman_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_peminjaman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_peminjaman'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_buku', 'id buku', 'trim|required');
	$this->form_validation->set_rules('id_anggota', 'id anggota', 'trim|required');
	$this->form_validation->set_rules('tanggal_pinjam', 'tanggal pinjam', 'trim|required');

	$this->form_validation->set_rules('id_peminjaman', 'id_peminjaman', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_peminjaman.xls";
        $judul = "t_peminjaman";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Buku");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Anggota");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pinjam");

	foreach ($this->T_peminjaman_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_buku);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_anggota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pinjam);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_peminjaman.doc");

        $data = array(
            't_peminjaman_data' => $this->T_peminjaman_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_peminjaman/t_peminjaman_doc',$data);
    }

}

/* End of file T_peminjaman.php */
/* Location: ./application/controllers/T_peminjaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-27 14:50:52 */
/* http://harviacode.com */