<?php
class LaporanModel extends CI_Model{

	public function lap(){
		return $this->db->query("SELECT *  from pembayaran join sewa_jasa on pembayaran.id_sewa = sewa_jasa.id_sj join jasa on sewa_jasa.id_jasa=jasa.id_jasa where pembayaran.status='2'");
	}
	public function joinsewa(){
		 return $this->db->query("SELECT *, SUM(pembayaran.dp) AS jml_byr from pembayaran join sewa_jasa on pembayaran.id_sewa = sewa_jasa.id_sj join jasa on sewa_jasa.id_jasa=jasa.id_jasa where pembayaran.status='2'");
	}
	public function flap($tanggal1, $tanggal2){
		return $this->db->query("SELECT *  from pembayaran join sewa_jasa on pembayaran.id_sewa = sewa_jasa.id_sj join jasa on sewa_jasa.id_jasa=jasa.id_jasa where  pembayaran.tgl_bayar between '$tanggal1' And '$tanggal2' ");
	}
	public function fjoinsewa($tanggal1, $tanggal2){
		 return $this->db->query("SELECT *, SUM(pembayaran.dp) AS jml_byr from pembayaran join sewa_jasa on pembayaran.id_sewa = sewa_jasa.id_sj join jasa on sewa_jasa.id_jasa=jasa.id_jasa where  pembayaran.tgl_bayar between '$tanggal1' And '$tanggal2' and pembayaran.status='2'");
	}
	// date_format($tanggal1,"Y-m-d");

	// public function view($tanggal1, $tanggal2){
	// return $this->db->query("SELECT * from pembayaran join sewa_jasa on pembayaran.id_sewa = sewa_jasa.id_sj join jasa on sewa_jasa.id_jasa=jasa.id_jasa where tgl_bayar between '$tanggal1' And '$tanggal2' and pembayaran.status='2'");
                   
	// }
	// public function total($tanggal1, $tanggal2){
	// return $this->db->query("SELECT *, SUM(pembayaran.dp) AS jml_byr from pembayaran join sewa_jasa on pembayaran.id_sewa = sewa_jasa.id_sj join jasa on sewa_jasa.id_jasa=jasa.id_jasa where tgl_bayar between '$tanggal1' And 'tanggal2' and pembayaran.status='2'");
                   
	// }

	// public function getPembayaran($tanggal1, $tanggal2){
	// 	return $this->db->query("SELECT * FROM pembayaran  WHERE tgl_bayar between '$tanggal1' AND '$tanggal2' AND status='2' ORDER BY  tgl_bayar DESC");
	// }


}
?>