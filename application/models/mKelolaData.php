<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKelolaData extends CI_Model
{
    //kategori
    public function select_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->join('barang', 'barang.id_kategori = kategori.id_kategori', 'left');
        return $this->db->get()->result();
    }
    public function select_id_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get()->result();
    }
    public function insert_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function updatekategori($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }
    public function deletekategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    //barang
    public function select_barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('pengajuan', 'pengajuan.nama_barang = barang.nama_barang', 'left');
        return $this->db->get()->result();
    }

    public function insert_barang($data)
    {
        $this->db->insert('barang', $data);
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('pengajuan', 'pengajuan.id_pengajuan = barang.id_pengajuan', 'left');

    }
    public function updatebarang($id, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }
    public function deletebarang($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }



    //user
    public function select_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }
    public function insert_user($data)
    {
        $this->db->insert('user', $data);
    }
    public function updateuser($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}

/* End of file mKelolaData.php */
