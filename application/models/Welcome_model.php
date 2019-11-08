<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('data_santri')->result_array();
    }

    public function getDetail($id = NULL)
    {
        $query = $this->db->get_where('data_santri', array('no_absen' => $id))->row();
        return $query;
    }

    public function getPayment($id = NULL)
    {
        $query = "SELECT `pembayaran`.*, `status_pembayaran`.`payment_status`, `jenis_pembayaran`.`payment_name`
        FROM `pembayaran` JOIN `status_pembayaran` ON `pembayaran`.`payment_status_id` = `status_pembayaran`.`id` 
        JOIN `jenis_pembayaran` ON `pembayaran`.`payment_name_id` = `jenis_pembayaran`.`id`
        WHERE `pembayaran`.`no_absen` = $id ";

        return $this->db->query($query)->result_array();
    }
}