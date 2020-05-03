<?php
	class model_admin extends CI_Model{
		function __construct(){
			parent:: __construct();

		}
		function qw($table,$prop){
			return $this->db->query("SELECT * FROM $table $prop");
		}
		function s_masuk(){
			return $this->db->get('surat_masuk');
		}
		function s_fm(){
			return $this->db->get('fax_masuk');
		}
		function s_fk(){
			return $this->db->get('fax_keluar');
		}
		function s_keluar(){
			return $this->db->get('surat_keluar');
		}
		function simpan_sm($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_sm($table,$where,$value){
			$this->db->where('ID_SM',$where);
			return $this->db->update($table,$value);
		}
		function hapus_sm($table,$where){
			$this->db->where('ID_SM',$where);
			return $this->db->delete($table);
		}
		function simpan_fm($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_fm($table,$where,$value){
			$this->db->where('ID_FM',$where);
			return $this->db->update($table,$value);
		}
		function hapus_fm($table,$where){
			$this->db->where('ID_FM',$where);
			return $this->db->delete($table);
		}
		function simpan_fk($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_fk($table,$where,$value){
			$this->db->where('ID_FK',$where);
			return $this->db->update($table,$value);
		}
		function hapus_fk($table,$where){
			$this->db->where('ID_FK',$where);
			return $this->db->delete($table);
		}
		function simpan_sk($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_sk($table,$where,$value){
			$this->db->where('ID_SK',$where);
			return $this->db->update($table,$value);
		}
		function hapus_sk($table,$where){
			$this->db->where('ID_SK',$where);
			return $this->db->delete($table);
		}
	}
?>
