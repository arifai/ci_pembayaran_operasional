<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TypePayment_model extends CI_Model
{
    public function getSantri($no_absen)
    {
        $query = $this->db->get_where('data_santri', array('no_absen' => $no_absen));
        return $query;
    }

    public function getPayment($id)
    {
        $query = $this->db->get_where('jenis_pembayaran', array('id' => $id));
        return $query;
    }

    public function getEditPayment($id)
    {
        $query = $this->db->get_where('pembayaran', array('id' => $id));
        return $query;
    }

    public function getESantri($no_absen)
    {
        $query = $this->db->get_where('pembayaran', array('no_absen' => $no_absen));
        return $query;
    }
}
