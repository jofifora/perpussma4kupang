<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
        $this->load->model('T_buku_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        /*
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        */

        $judul_buku = urldecode($this->input->get('judul_buku', TRUE));
        $id_kategori = urldecode($this->input->get('id_kategori', TRUE));
        $id_rak = urldecode($this->input->get('id_rak', TRUE));
        $tahun = urldecode($this->input->get('tahun', TRUE));
        $start = intval($this->input->get('start'));

        $config['base_url'] = base_url() . 't_buku/index.html';
        $config['first_url'] = base_url() . 't_buku/index.html';

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
        $config['total_rows'] = $this->T_buku_model->total_rows($judul_buku, $id_kategori, $id_rak, $tahun);
        $t_buku = $this->T_buku_model->get_limit_data($config['per_page'], $start, $judul_buku, $id_kategori, $id_rak, $tahun);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_buku_data' => $t_buku,
            'judul_buku' => $judul_buku,
            'id_kategori' => $id_kategori,
            'id_rak' => $id_rak,
            'tahun' => $tahun,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'data_kategori' => $this->T_buku_model->get_all_kategori(),
            'data_rak' => $this->T_buku_model->get_all_rak(),
            'status' => $this->session->userdata("status"),
        );
        $this->session->set_userdata('buku', $this->current_url());
        $this->load->view('header');
        $this->load->view('t_buku/t_buku_list', $data);
        $this->load->view('footer');
    }

    function current_url()
    {
        $CI =& get_instance();

        $url = $CI->config->site_url($CI->uri->uri_string());
        return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
    }

    public function read($id) 
    {
        $referred_from = $this->session->userdata('buku');
        if (trim($referred_from == '')) {
            $referred_from = site_url('t_buku');
        }
        $row = $this->T_buku_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_buku' => $row->id_buku,
            'judul_buku' => $row->judul_buku,
            'id_kategori' => $row->id_kategori,
            'id_rak' => $row->id_rak,
            'tahun' => $row->tahun,
            'stok' => $row->stok,
            'eksemplar' => $row->eksemplar,
            'link_kembali' => $referred_from,
        );
            $this->load->view('header');
            $this->load->view('t_buku/t_buku_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            //redirect(site_url('t_buku'));
            redirect($referred_from);
        }
    }

    public function create() 
    {
        $referred_from = $this->session->userdata('buku');
        if (trim($referred_from == '')) {
            $referred_from = site_url('t_buku');
        }
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_buku/create_action'),
            'id_buku' => set_value('id_buku'),
            'judul_buku' => set_value('judul_buku'),
            'id_kategori' => set_value('id_kategori'),
            'id_rak' => set_value('id_rak'),
            'tahun' => set_value('tahun'),
            'stok' => set_value('stok'),
            'eksemplar' => set_value('eksemplar'),
            'data_kategori' => $this->T_buku_model->get_all_kategori(),
            'data_rak' => $this->T_buku_model->get_all_rak(),
            'link_kembali' => $referred_from,
    );
        $this->load->view('header');
        $this->load->view('t_buku/t_buku_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $referred_from = $this->session->userdata('buku');
        if (trim($referred_from == '')) {
            $referred_from = site_url('t_buku');
        }
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'judul_buku' => $this->input->post('judul_buku',TRUE),
        'id_kategori' => $this->input->post('id_kategori',TRUE),
        'id_rak' => $this->input->post('id_rak',TRUE),
        'tahun' => $this->input->post('tahun',TRUE),
        'stok' => $this->input->post('stok',TRUE),
        'eksemplar' => $this->input->post('eksemplar',TRUE),
        );

            $this->T_buku_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            //redirect(site_url('t_buku'));
            redirect($referred_from);
        }
    }
    
    public function update($id) 
    {
        $referred_from = $this->session->userdata('buku');
        if (trim($referred_from == '')) {
            $referred_from = site_url('t_buku');
        }
        $row = $this->T_buku_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_buku/update_action'),
                'id_buku' => set_value('id_buku', $row->id_buku),
                'judul_buku' => set_value('judul_buku', $row->judul_buku),
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'id_rak' => set_value('id_rak', $row->id_rak),
                'tahun' => set_value('tahun', $row->tahun),
                'stok' => set_value('stok', $row->stok),
                'eksemplar' => set_value('eksemplar', $row->eksemplar),
                'data_kategori' => $this->T_buku_model->get_all_kategori(),
                'data_rak' => $this->T_buku_model->get_all_rak(),
                'link_kembali' => $referred_from,
        );
            $this->load->view('header');
            $this->load->view('t_buku/t_buku_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            //redirect(site_url('t_buku'));
            redirect($referred_from);
        }
    }
    
    public function update_action() 
    {
        $referred_from = $this->session->userdata('buku');
        if (trim($referred_from == '')) {
            $referred_from = site_url('t_buku');
        }
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_buku', TRUE));
        } else {
            $data = array(
                'judul_buku' => $this->input->post('judul_buku',TRUE),
                'id_kategori' => $this->input->post('id_kategori',TRUE),
                'id_rak' => $this->input->post('id_rak',TRUE),
                'tahun' => $this->input->post('tahun',TRUE),
                'stok' => $this->input->post('stok',TRUE),
                'eksemplar' => $this->input->post('eksemplar',TRUE),
        );

            $this->T_buku_model->update($this->input->post('id_buku', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            //redirect(site_url('t_buku'));
            redirect($referred_from);
        }
    }
    
    public function delete($id) 
    {
        $referred_from = $this->session->userdata('buku');
                if (trim($referred_from == '')) {
                    $referred_from = site_url('t_buku');
                }

        $row = $this->T_buku_model->get_by_id($id);

        if ($row) {
            $this->T_buku_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            //redirect(site_url('t_buku'));
            redirect($referred_from);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            //redirect(site_url('t_buku'));
            redirect($referred_from);
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('judul_buku', 'judul buku', 'trim|required|is_unique[t_buku.judul_buku]');
    $this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
    $this->form_validation->set_rules('id_rak', 'id rak', 'trim|required');
    $this->form_validation->set_rules('tahun', 'tahun', 'trim|required|integer');
    $this->form_validation->set_rules('stok', 'stok', 'trim|required|integer');
    $this->form_validation->set_rules('eksemplar', 'eksemplar', 'trim|required|integer');

    $this->form_validation->set_rules('id_buku', 'id_buku', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_buku.xls";
        $judul = "t_buku";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Judul Buku");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Rak");
        xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
        xlsWriteLabel($tablehead, $kolomhead++, "Stok");
        xlsWriteLabel($tablehead, $kolomhead++, "Eksemplar");

    foreach ($this->T_buku_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->judul_buku);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_kategori);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_rak);
        xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
        xlsWriteNumber($tablebody, $kolombody++, $data->stok);
        xlsWriteNumber($tablebody, $kolombody++, $data->eksemplar);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_buku.doc");

        $data = array(
            't_buku_data' => $this->T_buku_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_buku/t_buku_doc',$data);
    }

}

/* End of file T_buku.php */
/* Location: ./application/controllers/T_buku.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-31 04:23:05 */
/* http://harviacode.com */