<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_konstanta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_konstanta_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_konstanta/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_konstanta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_konstanta/index.html';
            $config['first_url'] = base_url() . 't_konstanta/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_konstanta_model->total_rows($q);
        $t_konstanta = $this->T_konstanta_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_konstanta_data' => $t_konstanta,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t_konstanta/t_konstanta_list', $data);
    }

    public function read($id) 
    {
        $row = $this->T_konstanta_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_konstanta' => $row->id_konstanta,
		'denda_per_hari' => $row->denda_per_hari,
		'max_lama_pinjam' => $row->max_lama_pinjam,
		'tanggal_simpan' => $row->tanggal_simpan,
	    );
            $this->load->view('t_konstanta/t_konstanta_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_konstanta'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_konstanta/create_action'),
	    'id_konstanta' => set_value('id_konstanta'),
	    'denda_per_hari' => set_value('denda_per_hari'),
	    'max_lama_pinjam' => set_value('max_lama_pinjam'),
	    'tanggal_simpan' => set_value('tanggal_simpan'),
	);
        $this->load->view('t_konstanta/t_konstanta_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'denda_per_hari' => $this->input->post('denda_per_hari',TRUE),
		'max_lama_pinjam' => $this->input->post('max_lama_pinjam',TRUE),
		'tanggal_simpan' => $this->input->post('tanggal_simpan',TRUE),
	    );

            $this->T_konstanta_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_konstanta'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_konstanta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_konstanta/update_action'),
		'id_konstanta' => set_value('id_konstanta', $row->id_konstanta),
		'denda_per_hari' => set_value('denda_per_hari', $row->denda_per_hari),
		'max_lama_pinjam' => set_value('max_lama_pinjam', $row->max_lama_pinjam),
		'tanggal_simpan' => set_value('tanggal_simpan', $row->tanggal_simpan),
	    );
            $this->load->view('t_konstanta/t_konstanta_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_konstanta'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_konstanta', TRUE));
        } else {
            $data = array(
		'denda_per_hari' => $this->input->post('denda_per_hari',TRUE),
		'max_lama_pinjam' => $this->input->post('max_lama_pinjam',TRUE),
		'tanggal_simpan' => $this->input->post('tanggal_simpan',TRUE),
	    );

            $this->T_konstanta_model->update($this->input->post('id_konstanta', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_konstanta'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_konstanta_model->get_by_id($id);

        if ($row) {
            $this->T_konstanta_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_konstanta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_konstanta'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('denda_per_hari', 'denda per hari', 'trim|required');
	$this->form_validation->set_rules('max_lama_pinjam', 'max lama pinjam', 'trim|required');
	$this->form_validation->set_rules('tanggal_simpan', 'tanggal simpan', 'trim|required');

	$this->form_validation->set_rules('id_konstanta', 'id_konstanta', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_konstanta.xls";
        $judul = "t_konstanta";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Denda Per Hari");
	xlsWriteLabel($tablehead, $kolomhead++, "Max Lama Pinjam");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Simpan");

	foreach ($this->T_konstanta_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->denda_per_hari);
	    xlsWriteNumber($tablebody, $kolombody++, $data->max_lama_pinjam);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_simpan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_konstanta.doc");

        $data = array(
            't_konstanta_data' => $this->T_konstanta_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_konstanta/t_konstanta_doc',$data);
    }

}

/* End of file T_konstanta.php */
/* Location: ./application/controllers/T_konstanta.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-27 14:50:52 */
/* http://harviacode.com */