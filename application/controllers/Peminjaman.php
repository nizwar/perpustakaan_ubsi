<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Peminjaman extends CI_Controller{
	function __construct(){
		parent::__construct();
		// cek login
		if($this->session->userdata('status') != "login"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}

	function index(){
		$data['peminjaman'] = $this->db->query("SELECT * FROM detail_pinjam D, peminjaman P, buku B, anggota A WHERE B.id_buku=D.id_buku and A.id_anggota=P.id_anggota")->result();

		$this->load->view('admin/header');
		$this->load->view('admin/peminjaman',$data);
		$this->load->view('admin/footer');
	}

  //one to many
  	public function tambah_pinjam($id){
  		if($this->session->userdata('status') != "login"){
  			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
  			redirect(base_url());
  		}else{
  			$d = $this->M_perpus->find($id, 'buku');
  			$isi = array(
  				'id_pinjam' => $this->M_perpus->kode_otomatis(),
  				'id_buku' => $id,
  				'id_anggota' => $this->session->userdata('id_agt'),
  				'tgl_pencatatan' => date('Y-m-d'),
  				'tgl_pinjam' => '-',
  				'tgl_kembali' => '-',
  				'denda' => '10000',
  				'tgl_pengembalian' =>'-',
  				'total_denda' =>'0',
  				'status_peminjaman' =>'Belum Selesai',
  				'status_pengembalian' =>'Belum Kembali'
  			);
  			$o = $this->M_perpus->edit_data(array('id_buku'=>$id),'transaksi')->num_rows();
  			if($o>0) {
  				$this->session->set_flashdata('alert','Buku ini sudah ada dikeranjang');
  				redirect(base_url().'member');
  			}
  			$this->M_perpus->insert_data($isi, 'transaksi');
  			$jml_buku = $d->jumlah_buku-1;
  			$w=array('id_buku'=>$id);
  			$data = array('jumlah_buku'=>$jml_buku);
  			$this->M_perpus->update_data('buku', $data,$w);
  			redirect(base_url().'member');
  		}
  	}

    public function lihat_keranjang(){
		$data['anggota'] = $this->M_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'anggota')->result();
		$where = $this->session->userdata('id_agt');
		$data['peminjaman']=$this->db->query("select*from transaksi t,buku b,anggota a where b.id_buku=t.id_buku and a.id_anggota=t.id_anggota and a.id_anggota=$where")->result();
		$d=$this->M_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'transaksi')->num_rows();
		if($d>0){
			$this->load->view('desain');
			$this->load->view('toplayout',$data);
			$this->load->view('keranjang', $data);
		}else{redirect('member');}
	}

  function hapus_keranjang($nomor){
		$w = array('id_buku' => $nomor);
		$data = $this->M_perpus->edit_data($w,'transaksi')->row();
		$ww = array('id_buku' => $data->id_buku);
		$data2 = array('status_buku' => '1');
		$this->M_perpus->update_data('buku',$data2,$ww);
		$this->M_perpus->delete_data($w,'transaksi');
		redirect(base_url().'peminjaman/lihat_keranjang');
	}

  public function selesai_booking($where){
		$d = $this->M_perpus->find($where, 'transaksi');
		$isi = array(
			'id_pinjam' => $this->M_perpus->kode_otomatis(),
			'tanggal_input' => date('Y-m-d H:m:s'),
			'id_anggota' => $where,
			'tgl_pinjam' => '-',
			'tgl_kembali' => '-',
			'totaldenda' => '0',
			'status_peminjaman' => 'Booking',
      'status_pengembalian' => 'Belum Kembali'
		);

		$this->M_perpus->insert_data($isi, 'peminjaman');
		$this->M_perpus->insert_detail($where);
		$this->M_perpus->kosongkan_data('transaksi');

		$data['useraktif'] = $this->M_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'anggota')->result();
		//$data['transaksi'] = $this->M_perpus->edit_data($where, 'transaksi')->result();
		$data['items'] = $this->db->query("select * from peminjaman p,detail_pinjam d, buku b where b.id_buku=d.id_buku and d.id_pinjam=p.id_pinjam and p.id_anggota='$where'")->result();

		$this->load->view('desain');
		$this->load->view('toplayout',$data);
		$this->load->view('info', $data);


	}

	public function pinjam($id)
	{
		$tgl_pinjam=date('Y-m-d');
		$tgl=strtotime($tgl_pinjam);
		$tgl_kembali=date('Y-m-d', strtotime('+6 days', $tgl));
		$status="Belum Selesai";
		$data = array('tgl_pinjam' => $tgl_pinjam,'tgl_kembali'=>$tgl_kembali,'status_peminjaman'=>$status );

		$this->M_perpus->update_data('peminjaman',$data,array('id_pinjam'=>$id));
		redirect(base_url('admin/peminjaman'));
	}
}
