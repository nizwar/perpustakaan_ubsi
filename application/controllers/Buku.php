<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Buku extends CI_Controller{
	function __construct(){
		parent::__construct();
		// cek login
		if($this->session->userdata('status') != "login"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}
	function index()
	{
		$this->load->view('desain');
		$this->load->view('toplayout');
		$this->load->view('detail_buku', $data);
	}
	public function katalog_detail(){
		$id = $this->uri->segment(3);
		$buku = $this->db->query('select*from buku b, kategori k where b.id_kategori=k.id_kategori')->result();

		foreach ($buku as $fields) {
			$data['judul'] = $fields->judul_buku;
			$data['pengarang'] = $fields->pengarang;
			$data['penerbit'] = $fields->penerbit;
			$data['kategori'] = $fields->nama_kategori;
			$data['tahun'] = $fields->thn_terbit;
			$data['isbn'] = $fields->isbn;
			$data['gambar'] = $fields->gambar;
			$data['id'] = $id;
		}
		$this->load->view('desain');
		$this->load->view('toplayout');
		$this->load->view('detail_buku', $data);
	}
  }
