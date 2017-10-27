<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pengembalian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_pengembalian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_pengembalian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_pengembalian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_pengembalian/index.html';
            $config['first_url'] = base_url() . 't_pengembalian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_pengembalian_model->total_rows($q);
        $t_pengembalian = $this->T_pengembalian_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_pengembalian_data' => $t_pengembalian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t_pengembalian/t_pengembalian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->T_pengembalian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengembalian' => $row->id_pengembalian,
		'id_peminjaman' => $row->id_peminjaman,
		'tanggal_pengembalian' => $row->tanggal_pengembalian,
		'denda' => $row->denda,
	    );
            $this->load->view('t_pengembalian/t_pengembalian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_pengembalian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_pengembalian/create_action'),
	    'id_pengembalian' => set_value('id_pengembalian'),
	    'id_peminjaman' => set_value('id_peminjaman'),
	    'tanggal_pengembalian' => set_value('tanggal_pengembalian'),
	    'denda' => set_value('denda'),
	);
        $this->load->view('t_pengembalian/t_pengembalian_form', $data);
    }
    
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

            $this->T_pengembalian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_pengembalian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_pengembalian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_pengembalian/update_action'),
		'id_pengembalian' => set_value('id_pengembalian', $row->id_pengembalian),
		'id_peminjaman' => set_value('id_peminjaman', $row->id_peminjaman),
		'tanggal_pengembalian' => set_value('tanggal_pengembalian', $row->tanggal_pengembalian),
		'denda' => set_value('denda', $row->denda),
	    );
            $this->load->view('t_pengembalian/t_pengembalian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_pengembalian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengembalian', TRUE));
        } else {
            $data = array(
		'id_peminjaman' => $this->input->post('id_peminjaman',TRUE),
		'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian',TRUE),
		'denda' => $this->input->post('denda',TRUE),
	    );

            $this->T_pengembalian_model->update($this->input->post('id_pengembalian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_pengembalian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_pengembalian_model->get_by_id($id);

        if ($row) {
            $this->T_pengembalian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_pengembalian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_pengembalian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_peminjaman', 'id peminjaman', 'trim|required');
	$this->form_validation->set_rules('tanggal_pengembalian', 'tanggal pengembalian', 'trim|required');
	$this->form_validation->set_rules('denda', 'denda', 'trim|required');

	$this->form_validation->set_rules('id_pengembalian', 'id_pengembalian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_pengembalian.xls";
        $judul = "t_pengembalian";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pengembalian");
	xlsWriteLabel($tablehead, $kolomhead++, "Denda");

	foreach ($this->T_pengembalian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_peminjaman);
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
        header("Content-Disposition: attachment;Filename=t_pengembalian.doc");

        $data = array(
            't_pengembalian_data' => $this->T_pengembalian_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_pengembalian/t_pengembalian_doc',$data);
    }

}

/* End of file T_pengembalian.php */
/* Location: ./application/controllers/T_pengembalian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-27 14:50:53 */
/* http://harviacode.com */