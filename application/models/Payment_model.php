<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{
    public function showAll()
    {
        return $this->db->get('pembayaran')->result_array();
    }

    public function getPayment()
    {
        $query = "SELECT `data_santri`.*, `status_pembayaran`.`payment_status`, `jenis_pembayaran`.`payment_name` 
        FROM `data_santri` JOIN `status_pembayaran` ON `data_santri`.`payment_status_id` = `status_pembayaran`.`id` 
        JOIN `jenis_pembayaran` ON `data_santri`.`payment_name_id` = `jenis_pembayaran`.`id` ORDER BY `data_santri`.`no_absen`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getPaymentforPembayaran()
    {
        $query = "SELECT `pembayaran`.*, `status_pembayaran`.`payment_status`, `jenis_pembayaran`.`payment_name` 
        FROM `pembayaran` JOIN `status_pembayaran` ON `pembayaran`.`payment_status_id` = `status_pembayaran`.`id` 
        JOIN `jenis_pembayaran` ON `pembayaran`.`payment_name_id` = `jenis_pembayaran`.`id` ORDER BY `pembayaran`.`no_absen`
        ";

        return $this->db->query($query)->result_array();
    }
}
