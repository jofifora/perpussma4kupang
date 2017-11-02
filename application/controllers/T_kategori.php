<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
        $this->load->model('T_kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_kategori/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_kategori/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_kategori/index.html';
            $config['first_url'] = base_url() . 't_kategori/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_kategori_model->total_rows($q);
        $t_kategori = $this->T_kategori_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_kategori_data' => $t_kategori,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'status' => $this->session->userdata("status"),
        );
        $this->load->view('header');
        $this->load->view('t_kategori/t_kategori_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->T_kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori' => $row->id_kategori,
		'nama_kategori' => $row->nama_kategori,
		'deskripsi_kategori' => $row->deskripsi_kategori,
	    );
            $this->load->view('header');
            $this->load->view('t_kategori/t_kategori_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_kategori'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_kategori/create_action'),
	    'id_kategori' => set_value('id_kategori'),
	    'nama_kategori' => set_value('nama_kategori'),
	    'deskripsi_kategori' => set_value('deskripsi_kategori'),
	);
        $this->load->view('header');
        $this->load->view('t_kategori/t_kategori_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'deskripsi_kategori' => $this->input->post('deskripsi_kategori',TRUE),
	    );

            $this->T_kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_kategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kategori/update_action'),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
		'deskripsi_kategori' => set_value('deskripsi_kategori', $row->deskripsi_kategori),
	    );
            $this->load->view('header');
            $this->load->view('t_kategori/t_kategori_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_kategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'deskripsi_kategori' => $this->input->post('deskripsi_kategori',TRUE),
	    );

            $this->T_kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_kategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_kategori_model->get_by_id($id);

        if ($row) {
            $this->T_kategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_kategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');
	$this->form_validation->set_rules('deskripsi_kategori', 'deskripsi kategori', 'trim|required');

	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_kategori.xls";
        $judul = "t_kategori";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi Kategori");

	foreach ($this->T_kategori_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi_kategori);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_kategori.doc");

        $data = array(
            't_kategori_data' => $this->T_kategori_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_kategori/t_kategori_doc',$data);
    }

}

/* End of file T_kategori.php */
/* Location: ./application/controllers/T_kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-27 14:50:51 */
/* http://harviacode.com */