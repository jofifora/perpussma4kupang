<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Halaman_awal_model extends CI_Model
{

    public $table = 't_ebook';
    public $id = 'id_ebook';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->limit(3);
        return $this->db->get($this->table)->result();
    }
}