<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		if ($this->session->userdata('status') != true) {
			redirect('auth');
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('pos', 'POS', 'required|trim');
		$this->form_validation->set_rules('nama_p', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('tarif', 'Tarif', 'required|trim');
		$this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');

		$data['title'] = 'Jenis Pembayaran';
		$data['user'] = $this->db->get_where('users', [
			'email' => $this->session->userdata('email')
		])->row_array();
		$data['jenis'] = $this->db->get('jenis_pembayaran')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('partials/_header', $data);
			$this->load->view('jenis/index', $data);
			$this->load->view('partials/_footer');
		} else {
			$data = [
				'pos' => htmlspecialchars($this->input->post('pos', true)),
				'payment_name' => htmlspecialchars($this->input->post('nama_p', true)),
				'type' => htmlspecialchars($this->input->post('tipe', true)),
				'pay_rate' => htmlspecialchars($this->input->post('tarif', true)),
				'date' => $this->input->post('tanggal', true),
			];

			$this->db->insert('jenis_pembayaran', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Jenis Pembayaran Berhasil Ditambah!</div>');
			redirect('jenis');
		}
	}

	public function edit_tarif($id = null)
	{
		$this->form_validation->set_rules('tarif', 'Tarif', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah tarif';
			$data['user'] = $this->db->get_where('users', [
				'email' => $this->session->userdata('email')
			])->row_array();
			// $data['jenis'] = $this->db->get_where('jenis_pembayaran', ['id' => $id])->row_array();

			$this->load->view('partials/_header', $data);
			$this->load->view('partials/_footer');
		} else {
			$id = $this->input->post('id');
			$pay_rate = $this->input->post('tarif');
			$type = $this->input->post('tipe');
			$date = $this->input->post('tanggal');

			$this->db->set('pay_rate', $pay_rate);
			$this->db->set('type', $type);
			$this->db->set('date', $date);
			$this->db->where('id', $id);

			$this->db->update('jenis_pembayaran', ['id' => $id]);

			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Tarif berhasil diperbarui!</div>');
			redirect('jenis');
		}
	}

	public function tambah_jenis()
	{
		$this->form_validation->set_rules('pos', 'POS', 'required|trim');
		$this->form_validation->set_rules('nama_p', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('tarif', 'Tarif', 'required|trim');
		$this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Jenis Pembayaran';
			$data['user'] = $this->db->get_where('users', [
				'email' => $this->session->userdata('email')
			])->row_array();

			$this->load->view('partials/_header', $data);
			// $this->load->view('jenis/tambah_jenis_pembayaran');
			$this->load->view('partials/_footer');
		} else {
			$data = [
				'pos' => htmlspecialchars($this->input->post('pos', true)),
				'payment_name' => htmlspecialchars($this->input->post('nama_p', true)),
				'type' => htmlspecialchars($this->input->post('tipe', true)),
				'pay_rate' => htmlspecialchars($this->input->post('tarif', true)),
				'date' => $this->input->post('tanggal', true),
			];

			$this->db->insert('jenis_pembayaran', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Jenis Pembayaran Berhasil Ditambah!</div>');
			redirect('jenis');
		}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('jenis_pembayaran');
		$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Jenis Pembayaran Berhasil Dihapus!</div>');
		redirect('jenis');
	}
}
