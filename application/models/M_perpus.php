<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class M_perpus extends CI_Model
{
  function edit_data($where,$table){
    return $this->db->get_where($table,$where);
  }

  function get_data($table){
    return $this->db->get($table);
  }

  function insert_data($data,$table){
		$this->db->insert($table,$data);
		return $this->db->affected_rows()>0;
  }

  function update_data($table,$data,$where){
	$this->db->update($table,$data,$where);
	return $this->db->error();
  }

  function delete_data($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
	return $this->db->error();
  }

  public function insert_detail($where)
	{
		$sql ="insert into detail_pinjam (id_pinjam,id_buku,denda) select transaksi.id_pinjam,transaksi.id_buku,
    transaksi.denda from transaksi where transaksi.id_anggota='$where'";
		$this->db->query($sql);
	}

  public function find($where, $table){
	//Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('id_buku', $where)
						  ->limit(1)
						  ->get($table);
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

  public function kosongkan_data($table){
		return $this->db->truncate($table);
	}

	public function kode_otomatis(){
		$this->db->select('right(id_pinjam,3) as kode', false);
		$this->db->order_by('id_pinjam','desc');
		$this->db->limit(1);
		$query=$this->db->get('peminjaman');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}

		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='PJ'.$kodemax;

		return $kodejadi;
	}

}
