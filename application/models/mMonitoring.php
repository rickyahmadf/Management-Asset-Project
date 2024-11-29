<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mMonitoring extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('monitoring', $data);
    }
    public function histori($data)
    {
        $this->db->insert('histori_pengecekan', $data);
    }
    public function select_histori($id)
    {
        $this->db->select('*');
        $this->db->from('histori_pengecekan');
        $this->db->join('monitoring', 'monitoring.id_monitoring = histori_pengecekan.id_monitoring', 'left');
        $this->db->where('histori_pengecekan.id_monitoring', $id);

        return $this->db->get()->result();
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('monitoring');
        $this->db->join('asset', 'monitoring.id_asset = asset.id_asset', 'left');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');

        return $this->db->get()->result();
    }

    public function getpengecekan($id){
        $this->db->select('*');
        $this->db->from('monitoring');
        $this->db->where('monitoring.id_monitoring', $id);
        return $this->db->get()->row();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('monitoring');
        $this->db->join('asset', 'monitoring.id_asset = asset.id_asset', 'left');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->where('monitoring.id_monitoring', $id);
        return $this->db->get()->row();
    }
    public function update($id, $data)
    {
        $this->db->where('id_monitoring', $id);
        $this->db->update('monitoring', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_monitoring', $id);
        $this->db->delete('monitoring');
    }

    public function getMonitoring($id)
    {
        $this->db->select('monitoring.*, asset.merk');
        $this->db->from('monitoring');
        $this->db->join('asset', 'monitoring.id_asset = asset.id_asset', 'left');
        $this->db->where('monitoring.id_monitoring', $id);
        return $this->db->get()->row();
        
    }
}

/* End of file mMonitoring.php */
