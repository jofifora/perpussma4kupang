<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_peminjaman_model extends CI_Model
{

    public $table = 't_peminjaman';
    public $tablePengembalian = 't_pengembalian';
    public $view = 'v_transaksi';
    public $id = 'id_peminjaman';
    public $order = 'DESC';
    public $order2 = 'DESC';
    public $order_by = "CASE WHEN tanggal_pengembalian IS NULL THEN 'Z' ELSE tanggal_pengembalian END";
    public $order_by2 = 'tanggal_pinjam';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($limit, $start = 0, $id_anggota = NULL)
    {
        $this->db->order_by($this->order_by, $this->order);
        $this->db->order_by($this->order_by2, $this->order2);
        $this->db->where('id_anggota', $id_anggota);
        $this->db->limit($limit, $start);
        return $this->db->get($this->view)->result();
    }

    function total_rows($id_anggota) {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->from($this->view);
        return $this->db->count_all_results();
    }

    function get_pinjaman_by_id($id)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->get('t_peminjaman')->row();
    }

    function get_anggota_by_id($id)
    {
        $this->db->where('id_anggota', $id);
        return $this->db->get('t_anggota')->row();
    }

    function get_konstanta() {
        $this->db->order_by('tanggal_simpan', 'ASC');
        $this->db->limit(1);
        return $this->db->get('t_konstanta')->row();
    }
}