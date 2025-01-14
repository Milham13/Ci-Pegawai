<?php

class M_pegawai extends CI_Model{
    public function tampil_data(){
        return $this->db->get('tb_pegawai');
    }
    public function input_data($data, $table){
        $this->db->insert($table, $data);
    }
    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function detail_data($no=NULL){
        $query=$this->db->get_where('tb_pegawai', array('no'=>$no))->row();
        return $query;
    }
    public function edit_data($where, $table){
        return $this->db->get_where($table,$where);
    }
    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function getData(){
        return $this->db->get('tb_pegawai')->result_array();
    }

}