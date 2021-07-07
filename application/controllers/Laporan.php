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

		$data = array("container" => "admin/laporan",
		 			  "footer" => "admin/footer",
		               "nav" => "admin/nav");
		 $this->load->view("admin/template", $data);
	}

	public function cetakBulan(){
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array("hasil3"=>$this->LaporanModel-> getPembayaran($bulan, $tahun),
					  "total"=>$this->LaporanModel->total($bulan, $tahun),
					  "joinsewa"=>$this->LaporanModel->view($bulan, $tahun),
					  "container" => "admin/cetakBulan",
		 			  "footer" => "admin/footer",
		               "nav" => "admin/nav");
		$this->load->view("admin/template", $data);
	}

	public function view($bulan, $tahun){
		echo "datang gaessafsdfasdf";
	}
	
	
}