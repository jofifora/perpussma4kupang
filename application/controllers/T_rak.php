<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_rak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
        $this->load->model('T_rak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_rak/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_rak/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_rak/index.html';
            $config['first_url'] = base_url() . 't_rak/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_rak_model->total_rows($q);
        $t_rak = $this->T_rak_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_rak_data' => $t_rak,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'status' => $this->session->userdata("status"),
        );
        $this->load->view('header');
        $this->load->view('t_rak/t_rak_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->T_rak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_rak' => $row->id_rak,
		'nama_rak' => $row->nama_rak,
		'deskripsi_rak' => $row->deskripsi_rak,
	    );
            $this->load->view('header');
            $this->load->view('t_rak/t_rak_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_rak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_rak/create_action'),
	    'id_rak' => set_value('id_rak'),
	    'nama_rak' => set_value('nama_rak'),
	    'deskripsi_rak' => set_value('deskripsi_rak'),
	);
        $this->load->view('header');
        $this->load->view('t_rak/t_rak_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_rak' => $this->input->post('nama_rak',TRUE),
		'deskripsi_rak' => $this->input->post('deskripsi_rak',TRUE),
	    );

            $this->T_rak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_rak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_rak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_rak/update_action'),
		'id_rak' => set_value('id_rak', $row->id_rak),
		'nama_rak' => set_value('nama_rak', $row->nama_rak),
		'deskripsi_rak' => set_value('deskripsi_rak', $row->deskripsi_rak),
	    );
            $this->load->view('header');
            $this->load->view('t_rak/t_rak_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_rak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rak', TRUE));
        } else {
            $data = array(
		'nama_rak' => $this->input->post('nama_rak',TRUE),
		'deskripsi_rak' => $this->input->post('deskripsi_rak',TRUE),
	    );

            $this->T_rak_model->update($this->input->post('id_rak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_rak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_rak_model->get_by_id($id);

        if ($row) {
            $this->T_rak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_rak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_rak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_rak', 'nama rak', 'trim|required');
	$this->form_validation->set_rules('deskripsi_rak', 'deskripsi rak', 'trim|required');

	$this->form_validation->set_rules('id_rak', 'id_rak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_rak.xls";
        $judul = "t_rak";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Rak");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi Rak");

	foreach ($this->T_rak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_rak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi_rak);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_rak.doc");

        $data = array(
            't_rak_data' => $this->T_rak_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_rak/t_rak_doc',$data);
    }

}

/* End of file T_rak.php */
/* Location: ./application/controllers/T_rak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-27 14:50:53 */
/* http://harviacode.com */