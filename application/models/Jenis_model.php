<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_model extends CI_Model
{
    private $_table = "jenis_pembayaran";

    public $id;
    public $payment_name;
    public $type;
    public $pay_rate;
    public $date;

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function update()
    {
        // $id = $this->input->get('id');
        $pay_rate = $this->input->post('tarif');
        $type = $this->input->post('tipe');
        $date = $this->input->post('tanggal');

        $this->set('pay_rate', $pay_rate);
        $this->set('type', $type);
        $this->set('date', $date);
        // $this->where('id', $id);

        $this->db->update($this->_table);
    }
}
