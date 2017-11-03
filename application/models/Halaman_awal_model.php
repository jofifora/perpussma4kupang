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

    function total_pinjaman_belum_dikembalikan_by_id($id) {
        $this->db->where('id_anggota', $id);
        $this->db->from('v_peminjaman_belum_dikembalikan');
        return $this->db->count_all_results();
    }
}