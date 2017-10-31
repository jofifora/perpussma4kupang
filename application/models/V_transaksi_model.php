<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_transaksi_model extends CI_Model
{

    public $table = 'v_transaksi';
    public $id = '';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('', $q);
	$this->db->or_like('id_peminjaman', $q);
	$this->db->or_like('id_buku', $q);
	$this->db->or_like('judul_buku', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->or_like('nama_kategori', $q);
	$this->db->or_like('deskripsi_kategori', $q);
	$this->db->or_like('id_rak', $q);
	$this->db->or_like('nama_rak', $q);
	$this->db->or_like('deskripsi_rak', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('stok', $q);
	$this->db->or_like('eksemplar', $q);
	$this->db->or_like('id_anggota', $q);
	$this->db->or_like('no_anggota', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('kelas', $q);
	$this->db->or_like('jurusan', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('tanggal_pinjam', $q);
	$this->db->or_like('id_pengembalian', $q);
	$this->db->or_like('tanggal_pengembalian', $q);
	$this->db->or_like('denda', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
	$this->db->or_like('id_peminjaman', $q);
	$this->db->or_like('id_buku', $q);
	$this->db->or_like('judul_buku', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->or_like('nama_kategori', $q);
	$this->db->or_like('deskripsi_kategori', $q);
	$this->db->or_like('id_rak', $q);
	$this->db->or_like('nama_rak', $q);
	$this->db->or_like('deskripsi_rak', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('stok', $q);
	$this->db->or_like('eksemplar', $q);
	$this->db->or_like('id_anggota', $q);
	$this->db->or_like('no_anggota', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('kelas', $q);
	$this->db->or_like('jurusan', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('tanggal_pinjam', $q);
	$this->db->or_like('id_pengembalian', $q);
	$this->db->or_like('tanggal_pengembalian', $q);
	$this->db->or_like('denda', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file V_transaksi_model.php */
/* Location: ./application/models/V_transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-31 03:56:24 */
/* http://harviacode.com */