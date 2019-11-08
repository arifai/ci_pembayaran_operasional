<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Payment_model', 'payment');
		$this->load->library('form_validation');

		if ($this->session->userdata('status') != true) {
			redirect('auth');
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('no_absen', 'Nomor Absen', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Santri', 'required|trim');
		$this->form_validation->set_rules('ortu', 'Nama Orang Tua', 'required|trim');
		$this->form_validation->set_rules('phone', 'Nomor Telfon', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('users', [
			'email' => $this->session->userdata('email')
		])->row_array();

		$data['santri'] = $this->db->get('data_santri')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('partials/_header', $data);
			$this->load->view('admin/index', $data);
			$this->load->view('partials/_footer');
		} else {
			$now = date('Y-m-d H:i-s');

			$data = [
				'no_absen' => htmlspecialchars($this->input->post('no_absen', true)),
				'full_name' => htmlspecialchars($this->input->post('nama', true)),
				'parents_name' => htmlspecialchars($this->input->post('ortu', true)),
				'phone_num' => htmlspecialchars($this->input->post('phone', true)),
				'address' => htmlspecialchars($this->input->post('alamat', true)),
				'class' => htmlspecialchars($this->input->post('kelas', true)),
				// 'payment_name_id' => 3,
				// 'payment_status_id' => 1,
				'ts' => $now
			];

			$this->db->insert('data_santri', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Santri Berhasil Ditambah!</div>');
			redirect('admin');
		}
	}

	public function edit($id = null)
	{
		$this->form_validation->set_rules('no_absen', 'Nomor Absen', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Santri', 'required|trim');
		$this->form_validation->set_rules('ortu', 'Nama Orang Tua', 'required|trim');
		$this->form_validation->set_rules('phone', 'Nomor Telfon', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

		if ($this->form_validation->run() == false) {
			// $data['title'] = 'Ubah tarif';
			$data['user'] = $this->db->get_where('users', [
				'email' => $this->session->userdata('email')
			])->row_array();
			// $data['santri'] = $this->db->get_where('data_santri', ['id' => $id])->row_array();

			$this->load->view('partials/_header', $data);
			$this->load->view('partials/_footer');
		} else {
			$id = $this->input->post('id');
			$no_absen = $this->input->post('no_absen');
			$nama = $this->input->post('nama');
			$ortu = $this->input->post('ortu');
			$phone = $this->input->post('phone');
			$alamat = $this->input->post('alamat');
			$kelas = $this->input->post('kelas');

			$this->db->set('no_absen', $no_absen);
			$this->db->set('full_name', $nama);
			$this->db->set('parents_name', $ortu);
			$this->db->set('phone_num', $phone);
			$this->db->set('address', $alamat);
			$this->db->set('class', $kelas);
			$this->db->where('id', $id);

			$this->db->update('data_santri', ['id' => $id]);

			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Data Santri diperbarui!</div>');
			redirect('admin');
		}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('data_santri');
		$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Santri Berhasil Dihapus!</div>');
		redirect('admin');
	}
}
