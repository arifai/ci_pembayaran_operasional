<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

    public function showAll()
    {
        $query = "SELECT `pembayaran`.*, `status_pembayaran`.`payment_status`, `jenis_pembayaran`.`payment_name`
        FROM `pembayaran` JOIN `status_pembayaran` ON `pembayaran`.`payment_status_id` = `status_pembayaran`.`id` 
        JOIN `jenis_pembayaran` ON `pembayaran`.`payment_name_id` = `jenis_pembayaran`.`id` ORDER BY `pembayaran`.`no_absen` ASC";

        return $this->db->query($query)->result_array();
    }

    public function byDate($date)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('status_pembayaran', 'pembayaran.payment_status_id = status_pembayaran.id', 'left');
        $this->db->join('jenis_pembayaran', 'pembayaran.payment_name_id = jenis_pembayaran.id', 'left');
        $this->db->where('DATE(pembayaran.ts)', $date);
        $this->db->order_by('pembayaran.full_name', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function byMonth($month, $year)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('status_pembayaran', 'pembayaran.payment_status_id = status_pembayaran.id', 'left');
        $this->db->join('jenis_pembayaran', 'pembayaran.payment_name_id = jenis_pembayaran.id', 'left');
        $this->db->where('MONTH(pembayaran.ts)', $month);
        $this->db->where('YEAR(pembayaran.ts)', $year);
        $this->db->order_by('pembayaran.full_name', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function byYear($year)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('status_pembayaran', 'pembayaran.payment_status_id = status_pembayaran.id', 'left');
        $this->db->join('jenis_pembayaran', 'pembayaran.payment_name_id = jenis_pembayaran.id', 'left');
        $this->db->where('YEAR(pembayaran.ts)', $year);
        $this->db->order_by('pembayaran.full_name', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function byAbsen($absen)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('status_pembayaran', 'pembayaran.payment_status_id = status_pembayaran.id', 'left');
        $this->db->join('jenis_pembayaran', 'pembayaran.payment_name_id = jenis_pembayaran.id', 'left');
        $this->db->like('pembayaran.no_absen', $absen);
        // $this->db->order_by('pembayaran.full_name', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function optYear()
    {
        $this->db->select('YEAR(ts) AS tahun');
        $this->db->from('pembayaran');
        $this->db->order_by('YEAR(ts)');
        $this->db->group_by('YEAR(ts)');

        return $this->db->get()->result();
    }
}
