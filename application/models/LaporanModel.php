<?php
class LaporanModel extends CI_Model{

	public function view($bulan, $tahun){
	return $this->db->query("SELECT * from pembayaran join sewa_jasa on pembayaran.id_sewa = sewa_jasa.id_sj join jasa on sewa_jasa.id_jasa=jasa.id_jasa where pembayaran.status='2'And month(pembayaran.tgl_bayar)='$bulan' And year(pembayaran.tgl_bayar)='$tahun'");
                   
	}
	public function total($bulan, $tahun){
	return $this->db->query("SELECT *, SUM(pembayaran.dp) AS jml_byr from pembayaran join sewa_jasa on pembayaran.id_sewa = sewa_jasa.id_sj join jasa on sewa_jasa.id_jasa=jasa.id_jasa where pembayaran.status='2'And month(pembayaran.tgl_bayar)='$bulan' And year(pembayaran.tgl_bayar)='$tahun'");
                   
	}

	public function getPembayaran($bulan, $tahun){
		return $this->db->query("SELECT * from pembayaran where month(tgl_bayar)='$bulan' AND year(tgl_bayar)='$tahun' AND status='2'");
	}
}
?>
