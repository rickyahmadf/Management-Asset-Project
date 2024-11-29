<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{
    public function asset()
    {
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        return $this->db->get()->result();
    }

    public function asset_kategori($id)
    {
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->where('asset.tgl_peroleh' == $id);
        return $this->db->get()->result();
    }
    public function laporan($id){
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->where('YEAR(asset.tgl_peroleh)', $id);
        return $this->db->get()->result();
    }

    public function laporan_pengajuan($id){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('asset_kep', 'asset_kep.id_pengajuan = pengajuan.id_pengajuan', 'left');
        $this->db->where('YEAR(pengajuan.tgl_pengajuan)', $id);
        return $this->db->get()->result();
    }


    public function pengajuan()
    {
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('asset_kep', 'asset_kep.id_pengajuan = pengajuan.id_pengajuan', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mLaporan.php */
