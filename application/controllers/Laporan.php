<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */ 
	function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->Model('LaporanModel');
    }
	public function index(){
		if(isset($_POST['submit'])){
			$tanggal1 = $this->input->post('tanggal1');
	     	$tanggal2 = $this->input->post('tanggal2');

	     	$data = array(
					  "joinsewa"=>$this->LaporanModel->fjoinsewa($tanggal1, $tanggal2),
					  "js" => $this->LaporanModel->flap($tanggal1, $tanggal2),
					 );
			$this->load->view("admin/cetak", $data);
			
		}else{
			$data = array("joinsewa"=>$this->LaporanModel->joinsewa(),
						  "js" =>$this->LaporanModel->lap(),
						  "container" => "admin/laporan",
			 			  "footer" => "admin/footer",
			               "nav" => "admin/nav");
			 $this->load->view("admin/template", $data);
			}
	}

	public function cetaklaporan(){
		$data = array("joinsewa"=>$this->LaporanModel->joinsewa(),
						  "js" =>$this->LaporanModel->lap());
						  
		 $this->load->view("admin/cetak", $data);
	}

	// public function cetakBulan(){
	// 	$tanggal1 = $this->input->post('tanggal1');
	// 	$tanggal2 = $this->input->post('tanggal2');

	// 	$data = array("hasil3"=>$this->LaporanModel-> getPembayaran($tanggal1, $tanggal2),
	// 				  "total"=>$this->LaporanModel->total($tanggal1, $tanggal2),
	// 				  "joinsewa"=>$this->LaporanModel->view($tanggal1, $tanggal2),
	// 				  "container" => "admin/cetakBulan",
	// 	 			  "footer" => "admin/footer",
	// 	               "nav" => "admin/nav");
	// 	$this->load->view("admin/template", $data);
	// }

	// public function view($bulan, $tanggal2){
	// 	echo "datang gaessafsdfasdf";
	// }
	
	
}