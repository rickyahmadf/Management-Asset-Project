<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAsset extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('asset', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        return $this->db->get()->result();
    }
    public function getasset($id)
    {
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        return $this->db->get()->row();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->where('id_asset', $id);
        return $this->db->get()->row();
    }
    public function update($id, $data)
    {
        $this->db->where('merk', $id);
        $this->db->update('asset', $data);
    }
    public function update_asset($id, $data) {
        $this->db->where('id_asset', $id);
        $this->db->update('asset', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_asset', $id);
        $this->db->delete('asset');
    }
}

/* End of file mAsset.php */
