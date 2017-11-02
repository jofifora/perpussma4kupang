<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_transaksi_model extends CI_Model
{

    public $table = 't_peminjaman';
    public $tablePengembalian = 't_pengembalian';
    public $view = 'v_peminjaman_belum_dikembalikan';
    public $id = 'id_peminjaman';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($id_anggota = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('id_anggota', $id_anggota);
        return $this->db->get($this->view)->result();
    }

    function total_rows($id_anggota = NULL) {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->from($this->view);
        return $this->db->count_all_results();
    }

    function get_pinjaman_by_id($id)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->get('t_peminjaman')->row();
    }

    function get_konstanta() {
        $this->db->order_by('tanggal_simpan', 'ASC');
        $this->db->limit(1);
        return $this->db->get('t_konstanta')->row();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function insertPengembalian($data)
    {
        $this->db->insert($this->tablePengembalian, $data);
    }
}