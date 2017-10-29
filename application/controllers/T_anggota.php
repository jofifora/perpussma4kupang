<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
        $this->load->model('T_anggota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_anggota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_anggota/index.html';
            $config['first_url'] = base_url() . 't_anggota/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_anggota_model->total_rows($q);
        $t_anggota = $this->T_anggota_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_anggota_data' => $t_anggota,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('t_anggota/t_anggota_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->T_anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_anggota' => $row->id_anggota,
		'no_anggota' => $row->no_anggota,
		'nama' => $row->nama,
		'kelas' => $row->kelas,
		'jurusan' => $row->jurusan,
		'jenis_kelamin' => $row->jenis_kelamin,
		'password' => $row->password,
	    );
            $this->load->view('header');
            $this->load->view('t_anggota/t_anggota_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_anggota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_anggota/create_action'),
	    'id_anggota' => set_value('id_anggota'),
	    'no_anggota' => set_value('no_anggota'),
	    'nama' => set_value('nama'),
	    'kelas' => set_value('kelas'),
	    'jurusan' => set_value('jurusan'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'password' => set_value('password'),
	);
        $this->load->view('header');
        $this->load->view('t_anggota/t_anggota_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_anggota' => $this->input->post('no_anggota',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->T_anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_anggota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_anggota/update_action'),
		'id_anggota' => set_value('id_anggota', $row->id_anggota),
		'no_anggota' => set_value('no_anggota', $row->no_anggota),
		'nama' => set_value('nama', $row->nama),
		'kelas' => set_value('kelas', $row->kelas),
		'jurusan' => set_value('jurusan', $row->jurusan),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'password' => set_value('password', $row->password),
	    );
            $this->load->view('header');
            $this->load->view('t_anggota/t_anggota_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_anggota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_anggota', TRUE));
        } else {
            $data = array(
		'no_anggota' => $this->input->post('no_anggota',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->T_anggota_model->update($this->input->post('id_anggota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_anggota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_anggota_model->get_by_id($id);

        if ($row) {
            $this->T_anggota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_anggota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_anggota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_anggota', 'no anggota', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_anggota.xls";
        $judul = "t_anggota";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Anggota");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Jurusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");

	foreach ($this->T_anggota_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_anggota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jurusan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_anggota.doc");

        $data = array(
            't_anggota_data' => $this->T_anggota_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_anggota/t_anggota_doc',$data);
    }

}

/* End of file T_anggota.php */
/* Location: ./application/controllers/T_anggota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-27 14:50:51 */
/* http://harviacode.com */