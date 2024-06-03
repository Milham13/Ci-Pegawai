<?php

class M_home extends CI_Model{
    public function jumlah_pegawai(){
		$sql="SELECT count(nip) as jumlah_pegawai FROM tb_pegawai";
		$result=$this->db->query($sql);
		return $result->row()->jumlah_pegawai;
	}
}