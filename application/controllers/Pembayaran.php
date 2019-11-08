<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('TypePayment_model', 'payment');

		if ($this->session->userdata('status') != true) {
			redirect('auth');
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('no_absen', 'No Absen', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Pembayaran';
			$data['user'] = $this->db->get_where('users', [
				'email' => $this->session->userdata('email')
			])->row_array();
			$data['santri'] = $this->db->get('data_santri')->result_array();
			$data['pembayaran'] = $this->db->get('jenis_pembayaran')->result_array();
			$data['status'] = $this->db->get('status_pembayaran')->result_array();

			$this->load->view('partials/_header', $data);
			$this->load->view('pembayaran/index', $data);
			$this->load->view('partials/_footer');
		} else {
			$now = date('Y-m-d');
			// $id = $this->input->post('nama_p');

			$data = [
				'no_absen' => htmlspecialchars($this->input->post('no_absen', true)),
				'full_name' => htmlspecialchars($this->input->post('nama', true)),
				'class' => htmlspecialchars($this->input->post('kelas', true)),
				'payment_name_id' => htmlspecialchars($this->input->post('nama_p', true)),
				'pay_rate' => htmlspecialchars($this->input->post('tarif', true)),
				'payment_status_id' => 1,
				'ts' => $now
			];

			// $this->db->where('id', $id);
			$this->db->insert('pembayaran', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Pembayaran Berhasil Ditambah!</div>');
			redirect('pembayaran');
		}
	}

	public function searchSantri()
	{
		$no_absen = $this->input->get('no_absen');
		$cari = $this->payment->getSantri($no_absen)->result();
		echo json_encode($cari);
	}

	public function searchESantri()
	{
		$no_absen = $this->input->get('e_no_absen');
		$cari = $this->payment->getESantri($no_absen)->result();
		echo json_encode($cari);
	}


	public function searchPayment()
	{
		$nama_p = $this->input->get('nama_p');
		$cari = $this->payment->getPayment($nama_p)->result();
		echo json_encode($cari);
	}

	public function editStatusPayment()
	{
		if (isset($_POST['e_nama_p']) && !empty($_POST['e_nama_p'])) {
			$now = date('Y-m-d');
			$no_absen = $this->input->post('e_no_absen');
			$p_status = $this->input->post('e_nama_p');
			$array = array('no_absen' => $no_absen, 'payment_name_id' => $p_status);

			$data = [
				'no_absen' => htmlspecialchars($this->input->post('e_no_absen', true)),
				'full_name' => htmlspecialchars($this->input->post('e_nama', true)),
				'class' => htmlspecialchars($this->input->post('e_kelas', true)),
				'payment_status_id' => htmlspecialchars($this->input->post('status', true)),
				'ts' => $now
			];

			$this->db->where($array);
			$this->db->update('pembayaran', $data);

			$this->session->set_flashdata('emessage', '<div class="alert alert-success font-weight-light" role="alert">Status Pembayaran Berhasil Diubah!</div>');
			redirect('pembayaran');
		} else {
			$this->session->set_flashdata('emessage', '<div class="alert alert-danger font-weight-light" role="alert">Pembayaran Tidak Ditemukan!</div>');
			redirect('pembayaran');
		}
	}
}
