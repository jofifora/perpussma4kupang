<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_transaksi_model extends CI_Model
{

    public $table = 'v_transaksi';
    public $id = 'id_peminjaman';
    public $order = 'DESC';
    public $order_by = 'id_peminjaman';

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

    function get_anggota_by_no_anggota($no_anggota)
    {
        $this->db->where('no_anggota', $no_anggota);
        return $this->db->get('t_anggota')->row();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($no_anggota = NULL, $nama = NULL, $kelas = NULL, $jurusan = NULL, $jenis_kelamin = NULL, $judul_buku = NULL, $id_kategori = NULL, $id_rak = NULL, $tahun = NULL, $tgl_pj1 = NULL, $tgl_pj2 = NULL, $tgl_pb1 = NULL, $tgl_pb2 = NULL, $st_pb = NULL) {

        if(trim($no_anggota)<>""){
            $this->db->where("no_anggota", $no_anggota);  
        }
        if(trim($nama)<>""){
            $where =  "(`nama` LIKE '%".$nama."%')";
            $this->db->where($where);
        }
        if(trim($kelas)<>""){
            $this->db->where("kelas", $kelas);  
        }
        if(trim($jurusan)<>""){
            $this->db->where("jurusan", $jurusan);
        }            
        if(trim($jenis_kelamin)<>""){
            $this->db->where("jenis_kelamin", $jenis_kelamin);
        }

        if(trim($judul_buku)<>""){
            $where =  "(`judul_buku` LIKE '%".$judul_buku."%')";
            $this->db->where($where);
        }
        if(trim($id_kategori)<>""){
            $this->db->where("id_kategori", $id_kategori);  
        }
        if(trim($id_rak)<>""){
            $this->db->where("id_rak", $id_rak);  
        }
        if(trim($tahun)<>""){
            $this->db->where("tahun", $tahun);
        }

        if((trim($tgl_pj1)<>"") and (trim($tgl_pj2)<>"")){
            $this->db->where("tanggal_pinjam BETWEEN '".$tgl_pj1."' AND '".$tgl_pj2."'");
        } elseif (trim($tgl_pj1)<>"") {
            $this->db->where("tanggal_pinjam", $tgl_pj1);  
        }

        if((trim($tgl_pb1)<>"") and (trim($tgl_pb2)<>"")){
            $this->db->where("tanggal_pengembalian BETWEEN '".$tgl_pb1."' AND '".$tgl_pb2."'");
        } elseif (trim($tgl_pb1)<>"") {
            $this->db->where("tanggal_pengembalian", $tgl_pb1);  
        }
          
        if(trim($st_pb)<>""){
            if (trim($st_pb)=='2') {
                $this->db->where("id_pengembalian IS NULL");
            } else {
                $this->db->where("id_pengembalian IS NOT NULL");
            }     
        }
        
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $no_anggota = NULL, $nama = NULL, $kelas = NULL, $jurusan = NULL, $jenis_kelamin = NULL, $judul_buku = NULL, $id_kategori = NULL, $id_rak = NULL, $tahun = NULL, $tgl_pj1 = NULL, $tgl_pj2 = NULL, $tgl_pb1 = NULL, $tgl_pb2 = NULL, $st_pb = NULL) 
    {

        $this->db->order_by($this->order_by, $this->order);
        if(trim($no_anggota)<>""){
            $this->db->where("no_anggota", $no_anggota);  
        }
        if(trim($nama)<>""){
            $where =  "(`nama` LIKE '%".$nama."%')";
            $this->db->where($where);
        }
        if(trim($kelas)<>""){
            $this->db->where("kelas", $kelas);  
        }
        if(trim($jurusan)<>""){
            $this->db->where("jurusan", $jurusan);
        }            
        if(trim($jenis_kelamin)<>""){
            $this->db->where("jenis_kelamin", $jenis_kelamin);
        }

        if(trim($judul_buku)<>""){
            $where =  "(`judul_buku` LIKE '%".$judul_buku."%')";
            $this->db->where($where);
        }
        if(trim($id_kategori)<>""){
            $this->db->where("id_kategori", $id_kategori);  
        }
        if(trim($id_rak)<>""){
            $this->db->where("id_rak", $id_rak);  
        }
        if(trim($tahun)<>""){
            $this->db->where("tahun", $tahun);
        }  

        if((trim($tgl_pj1)<>"") and (trim($tgl_pj2)<>"")){
            $this->db->where("tanggal_pinjam BETWEEN '".$tgl_pj1."' AND '".$tgl_pj2."'");
        } elseif (trim($tgl_pj1)<>"") {
            $this->db->where("tanggal_pinjam", $tgl_pj1);  
        }

        if((trim($tgl_pb1)<>"") and (trim($tgl_pb2)<>"")){
            $this->db->where("tanggal_pengembalian BETWEEN '".$tgl_pb1."' AND '".$tgl_pb2."'");
        } elseif (trim($tgl_pb1)<>"") {
            $this->db->where("tanggal_pengembalian", $tgl_pb1);  
        }
          
        if(trim($st_pb)<>""){
            if (trim($st_pb)=='2') {
                $this->db->where("id_pengembalian IS NULL");
            } else {
                $this->db->where("id_pengembalian IS NOT NULL");
            }     
        }


        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_all_kategori()
    {
        $this->db->order_by('nama_kategori');
        return $this->db->get('t_kategori')->result();
    }

    function get_all_rak()
    {
        $this->db->order_by('nama_rak');
        return $this->db->get('t_rak')->result();
    }

    /*

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
    */

}

/* End of file V_transaksi_model.php */
/* Location: ./application/models/V_transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-31 03:56:24 */
/* http://harviacode.com */