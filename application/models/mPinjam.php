<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPinjam extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('peminjam', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('peminjam');
        $this->db->join('asset', 'asset.merk = peminjam.merk', 'left');
        $this->db->join('user', 'user.id_user = peminjam.id_user', 'left');
        return $this->db->get()->result();
    }

    public function datapeminjam(){
        $this->db->select('*');
        $this->db->from('peminjam');
        $this->db->join('asset', 'asset.merk = peminjam.merk', 'left');
        $this->db->join('user', 'user.id_user = peminjam.id_user', 'left');
        $this->db->where('peminjam.id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }


    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('asset', 'asset.merk = peminjam.merk', 'left');
        $this->db->where('id_peminjam', $id);
        return $this->db->get()->row();
    }
    public function update($id, $data)
    {
        $this->db->where('id_peminjam', $id);
        $this->db->update('asset', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_peminjam', $id);
        $this->db->delete('asset');
    }


      //keputusan kepala Lab
      public function keputusan($id, $data)
      {
          $this->db->where('id_peminjam', $id);
          $this->db->update('peminjam', $data);
      }
      public function pengembalian($id, $data)
      {
          $this->db->where('id_peminjam', $id);
          $this->db->update('peminjam', $data);
      }
      public function tgl_pengembalian($id, $data)
      {
          $this->db->where('id_peminjam', $id);
          $this->db->update('peminjam', $data);
      }
      public function asset_kep($data)
      {
          $this->db->insert('kep_peminjam', $data);
      }
      public function info_keputusan()
      {
          $this->db->select('*');
          $this->db->from('peminjam');
          $this->db->join('kep_peminjam', 'kep_peminjam.id_peminjam = peminjam.id_peminjam', 'left');
          return $this->db->get()->result();
      }
}

/* End of file mAsset.php */
