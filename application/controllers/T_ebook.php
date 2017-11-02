<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_ebook extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect("Auth");
        }
        $this->load->model('T_ebook_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_ebook/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_ebook/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_ebook/index.html';
            $config['first_url'] = base_url() . 't_ebook/index.html';
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
            'status' => $this->session->userdata("status"),
        );
        $this->load->view('header');
        $this->load->view('t_ebook/t_ebook_list', $data);
        $this->load->view('footer');
    }

    function current_url()
    {
        $CI =& get_instance();

        $url = $CI->config->site_url($CI->uri->uri_string());
        return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
    }

    /*
    public function read($id) 
    {
        $row = $this->T_ebook_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ebook' => $row->id_ebook,
		'nama_ebook' => $row->nama_ebook,
		'tempat_ebook' => $row->tempat_ebook,
	    );
            $this->load->view('header');
            $this->load->view('t_ebook/t_ebook_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ebook'));
        }
    }
    */

    public function read($id) 
    {
        $row = $this->T_ebook_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_ebook' => $row->id_ebook,
            'nama_ebook' => $row->nama_ebook,
            'tempat_ebook' => $row->tempat_ebook,
        );
            $this->load->view('view_pdf', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ebook'));
        }
    }

    public function do_upload($id)
        {

            $referred_from = $this->session->userdata('ebook');
            if (trim($referred_from == '')) {
                $referred_from = site_url('t_ebook');
            }

                $config['upload_path']          = 'ebook/';
                $config['allowed_types']        = 'pdf';
                $config['file_name']            = $id;
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('form_upload'.$id))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $error_string = implode(", ", $error);

                        $this->session->set_flashdata('message', $error_string);

                        //redirect(site_url('t_ebook'));
                        redirect($referred_from);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $data_string = implode(", ", $data);

                        $lokasiFile = "ebook/".$id.".pdf";

                        $this->T_ebook_model->updateLokasiFile($id, $lokasiFile);

                        $this->session->set_flashdata('message', "Upload Success");

                        //redirect(site_url('t_ebook'));
                        redirect($referred_from);
                }
        }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_ebook/create_action'),
	    'id_ebook' => set_value('id_ebook'),
	    'nama_ebook' => set_value('nama_ebook'),
	    'tempat_ebook' => set_value('tempat_ebook'),
	);
        $this->load->view('header');
        $this->load->view('t_ebook/t_ebook_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_ebook' => $this->input->post('nama_ebook',TRUE),
		'tempat_ebook' => $this->input->post('tempat_ebook',TRUE),
	    );

            $this->T_ebook_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_ebook'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_ebook_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_ebook/update_action'),
		'id_ebook' => set_value('id_ebook', $row->id_ebook),
		'nama_ebook' => set_value('nama_ebook', $row->nama_ebook),
		'tempat_ebook' => set_value('tempat_ebook', $row->tempat_ebook),
	    );
            $this->load->view('header');
            $this->load->view('t_ebook/t_ebook_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ebook'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ebook', TRUE));
        } else {
            $data = array(
		'nama_ebook' => $this->input->post('nama_ebook',TRUE),
		'tempat_ebook' => $this->input->post('tempat_ebook',TRUE),
	    );

            $this->T_ebook_model->update($this->input->post('id_ebook', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_ebook'));
        }
    }
    
    public function delete($id) 
    {
        $this->load->helper("file");
        $row = $this->T_ebook_model->get_by_id($id);

        if ($row) {
            $this->T_ebook_model->delete($id);
            $path = $row->tempat_ebook;
            unlink($path);
            $this->session->set_flashdata('message', 'Delete Record Success');            
            redirect(site_url('t_ebook'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ebook'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_ebook', 'nama ebook', 'trim|required');
	$this->form_validation->set_rules('tempat_ebook', 'tempat ebook', 'trim');

	$this->form_validation->set_rules('id_ebook', 'id_ebook', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_ebook.xls";
        $judul = "t_ebook";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ebook");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Ebook");

	foreach ($this->T_ebook_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ebook);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_ebook);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_ebook.doc");

        $data = array(
            't_ebook_data' => $this->T_ebook_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_ebook/t_ebook_doc',$data);
    }

}

/* End of file T_ebook.php */
/* Location: ./application/controllers/T_ebook.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-31 03:55:28 */
/* http://harviacode.com */