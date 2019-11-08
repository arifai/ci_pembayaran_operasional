<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
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
        $this->form_validation->set_rules('info', 'Informasi', 'required|trim');

        $data['title'] = 'Informasi';
        $data['user'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['info'] = $this->db->get('informasi')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('partials/_header', $data);
            $this->load->view('info/index', $data);
            $this->load->view('partials/_footer');
        } else {
            $now = date('Y-m-d H:i-s');

            $data = [
                'content' => htmlspecialchars($this->input->post('info', true)),
                'ts' => $now
            ];

            $this->db->insert('informasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Informasi Berhasil Ditambah!</div>');
            redirect('info');
        }
    }

    public function edit($id = null)
    {
        $this->form_validation->set_rules('info', 'Informasi', 'required|trim');

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
            $info = $this->input->post('info');

            $this->db->set('content', $info);
            $this->db->where('id', $id);

            $this->db->update('informasi', ['id' => $id]);

            $this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Informasi Berhasil diperbarui!</div>');
            redirect('info');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('informasi');
        $this->session->set_flashdata('message', '<div class="alert alert-success font-weight-light" role="alert">Informasi Berhasil Dihapus!</div>');
        redirect('info');
    }
}
