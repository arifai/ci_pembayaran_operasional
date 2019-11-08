<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Report_model', 'report');
		$this->load->library('pdf');

		if ($this->session->userdata('status') != true) {
			redirect('auth');
		}
	}

	public function index()
	{
		if (isset($_GET['filter']) && !empty($_GET['filter'])) {
			// $filter = $_GET['filter'];
			$filter = $_GET['filter']; // Ambil data filder yang dipilih user
			if ($filter == '1') { // Jika filter nya 1 (per tanggal)
				$tgl = $_GET['tanggal'];

				$url_cetak = 'laporan/print?filter=1&tanggal=' . $tgl;
				$report = $this->report->byDate($tgl); // Panggil fungsi byDate yang ada di report
			} else if ($filter == '2') { // Jika filter nya 2 (per bulan)
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				// $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

				$url_cetak = 'laporan/print?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
				$report = $this->report->byMonth($bulan, $tahun); // Panggil fungsi byMonth yang ada di report
			} else { // Jika filter nya 3 (per tahun)
				$tahun = $_GET['tahun'];

				$url_cetak = 'laporan/print?filter=3&tahun=' . $tahun;
				$report = $this->report->byYear($tahun); // Panggil fungsi byYear yang ada di report
			}
		} else if (isset($_GET['search']) && !empty($_GET['search'])) {
			$absen = $_GET['search'];

			// $ket = 'Data Transaksi Berdasarkan No. Absen ' . $absen;
			$url_cetak = 'laporan/print?search=' . $absen;
			$report = $this->report->byAbsen($absen);
		} else { // Jika user tidak mengklik tombol tampilkan
			$ket = 'Semua Data Transaksi';
			$url_cetak = 'laporan/print';
			$report = $this->report->showAll(); // Panggil fungsi showAll yang ada di report
		}

		$data['title'] = 'Pembayaran';
		$data['user'] = $this->db->get_where('users', [
			'email' => $this->session->userdata('email')
		])->row_array();
		$data['pembayaran'] = $report;
		$data['option_tahun'] = $this->report->optYear();
		$data['url_cetak'] = base_url($url_cetak);
		// $data['pembayaran'] = $this->db->get('jenis_pembayaran')->result_array();

		$this->load->view('partials/_header', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('partials/_footer');
	}

	public function print()
	{
		if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
			$filter = $_GET['filter']; // Ambil data filder yang dipilih user
			if ($filter == '1') { // Jika filter nya 1 (per tanggal)
				$tgl = $_GET['tanggal'];

				$ket = 'Data Transaksi Tanggal ' . date('d-m-y', strtotime($tgl));
				$report = $this->report->byDate($tgl); // Panggil fungsi byDate yang ada di report
			} else if ($filter == '2') { // Jika filter nya 2 (per bulan)
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

				$ket = 'Data Transaksi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
				$report = $this->report->byMonth($bulan, $tahun); // Panggil fungsi byMonth yang ada di report
			} else { // Jika filter nya 3 (per tahun)
				$tahun = $_GET['tahun'];

				$ket = 'Data Transaksi Tahun ' . $tahun;
				$report = $this->report->byYear($tahun); // Panggil fungsi byYear yang ada di report
			}
		} else if (isset($_GET['search']) && !empty($_GET['search'])) {
			$absen = $_GET['search'];

			$ket = 'Data Transaksi Berdasarkan No. Absen: ' . $absen;
			$report = $this->report->byAbsen($absen);
		} else { // Jika user tidak mengklik tombol tampilkan
			$ket = 'Semua Data Transaksi';
			$report = $this->report->showAll(); // Panggil fungsi showAll yang ada di report
		}

		$data['ket'] = $ket;
		$data['report'] = $report;
		$data['title'] = 'Laporan Pembayaran';

		$this->pdf->load_view('laporan/print', $data);
		$this->pdf->setPaper('A4', 'potrait');
	}
}
