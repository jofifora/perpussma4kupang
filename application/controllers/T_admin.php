<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
        $this->load->model('T_admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_admin/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_admin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_admin/index.html';
            $config['first_url'] = base_url() . 't_admin/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_admin_model->total_rows($q);
        $t_admin = $this->T_admin_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_admin_data' => $t_admin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('t_admin/t_admin_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->T_admin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_admin' => $row->id_admin,
		'user_name' => $row->user_name,
		'password' => $row->password,
		'status' => $row->status,
	    );
            $this->load->view('header');
            $this->load->view('t_admin/t_admin_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_admin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_admin/create_action'),
	    'id_admin' => set_value('id_admin'),
	    'user_name' => set_value('user_name'),
	    'password' => set_value('password'),
	    'status' => set_value('status'),
	);
        $this->load->view('header');
        $this->load->view('t_admin/t_admin_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'user_name' => $this->input->post('user_name',TRUE),
		'password' => $this->input->post('password',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->T_admin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_admin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_admin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_admin/update_action'),
		'id_admin' => set_value('id_admin', $row->id_admin),
		'user_name' => set_value('user_name', $row->user_name),
		'password' => set_value('password', $row->password),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('header');
            $this->load->view('t_admin/t_admin_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_admin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_admin', TRUE));
        } else {
            $data = array(
		'user_name' => $this->input->post('user_name',TRUE),
		'password' => $this->input->post('password',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->T_admin_model->update($this->input->post('id_admin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_admin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_admin_model->get_by_id($id);

        if ($row) {
            $this->T_admin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_admin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_name', 'user name', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_admin', 'id_admin', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_admin.xls";
        $judul = "t_admin";
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
	xlsWriteLabel($tablehead, $kolomhead++, "User Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->T_admin_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_admin.doc");

        $data = array(
            't_admin_data' => $this->T_admin_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_admin/t_admin_doc',$data);
    }

}

/* End of file T_admin.php */
/* Location: ./application/controllers/T_admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-27 14:50:50 */
/* http://harviacode.com */