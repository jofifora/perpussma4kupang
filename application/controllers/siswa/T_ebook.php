<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_ebook extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("siswa_logged_in")) {
            redirect("siswa/Auth");
        }
        $this->load->model('T_ebook_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'siswa/t_ebook/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'siswa/t_ebook/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'siswa/t_ebook/index.html';
            $config['first_url'] = base_url() . 'siswa/t_ebook/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_ebook_model->total_rows($q);
        $t_ebook = $this->T_ebook_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_ebook_data' => $t_ebook,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('siswa/header');
        $this->load->view('siswa/t_ebook/t_ebook_list', $data);
        $this->load->view('siswa/footer');
    }

    public function read($id) 
    {
        $row = $this->T_ebook_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_ebook' => $row->id_ebook,
            'nama_ebook' => $row->nama_ebook,
            'tempat_ebook' => $row->tempat_ebook,
        );
            $this->load->view('siswa/t_ebook/t_ebook_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa/t_ebook'));
        }
    }

}

/* End of file T_ebook.php */
/* Location: ./application/controllers/T_ebook.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-31 03:55:28 */
/* http://harviacode.com */