<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->model('Agenda_model');
		$this->load->model('User_model');
        $this->load->library('form_validation');
    }
	public function index(){
		if($this->session->userdata('logedin')==TRUE){
			  $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
		}else{
			$data = array("container" => "front/index", "footer" => "front/footer", "nav" => "front/nav");
			$this->load->view("front/template", $data);
		}
	}
	public function berita(){ 
		if($this->session->userdata('logedin')==TRUE){
			  $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
		}else{
		$data = array("container" => "front/berita", "footer" => "front/footer", "nav" => "front/nav");
		$this->load->view("front/template", $data);
		}
	}
	public function bacaberita($id){
        $row = $this->Agenda_model->get_by_id($id);
            $data = array(
            'id_agenda' => $row->id_agenda,
            'judul_agenda' => $row->judul_agenda,
            'isi_agenda' => $row->isi_agenda,
			'tempat_agenda' => $row->tempat_agenda,
			'tgl_agenda' => $row->tgl_agenda,
			'waktu_agenda' => $row->waktu_agenda,
            'foto_agenda' => $row->foto_agenda,
            'berita' => $this->db->query("SELECT * from agenda Limit 4"),
            "container" => "front/baca_berita",
             "footer" => "front/footer",
             "nav" => "front/nav"
	        );
        $this->load->view("front/template", $data);
        
	}
	public function profil(){
		if($this->session->userdata('logedin')==TRUE){
			  $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
		}else{
		$data = array("container" => "front/profil", "footer" => "front/footer", "nav" => "front/nav");
		$this->load->view("front/template", $data);
	   }
	}
	public function kontak(){
		if($this->session->userdata('logedin')==TRUE){
			  $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
		}else{
		$data = array("container" => "front/kontak", "footer" => "front/footer", "nav" => "front/nav");
		$this->load->view("front/template", $data);
	   }
	}
	public function produk(){
		$data = array("container" => "front/produk", "footer" => "front/footer", "nav" => "front/nav");
		$this->load->view("front/template", $data);
	}
	public function jasa(){
		if($this->session->userdata('logedin')==TRUE){
			  $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
		}else{
		$data = array("container" => "front/jasa", "footer" => "front/footer", "nav" => "front/nav");
		$this->load->view("front/template", $data);
	   }
	}
	public function galeri(){
		if($this->session->userdata('logedin')==TRUE){
			  $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
		}else{
		$data = array("container" => "front/galeri", "footer" => "front/footer", "nav" => "front/nav");
		$this->load->view("front/template", $data);
 	   }
	}
	public function login(){
		if($this->session->userdata('logedin')==TRUE){
			  $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
		}else{
		$data = array("container" => "front/login", "footer" => "front/footer", "nav" => "front/nav");
		$this->load->view("front/template", $data);
	   }
	}
	public function formDaftar(){
		if($this->session->userdata('logedin')==TRUE){
			  $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
		}else{
		$data = array("container" => "front/daftar", "footer" => "front/footer", "nav" => "front/nav");
		$this->load->view("front/template", $data);
	   }
	}
	public function daftar() 
    {  
    	if($this->session->userdata('logedin')==TRUE){
			  $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
		}else{
        $data = array(
            'button' => 'Daftar',
            'action' => site_url('home/create_action'),
            'id_user' => set_value('id_user'),
            'nama' => set_value('nama'),
            'email' => set_value('email'),
            'password' => set_value('password'),
            'alamat' => set_value('alamat'),
            'no_hp' => set_value('no_hp'),
			"container" => "front/login", 
			"footer" => "front/footer", 
			"nav" => "front/nav"
        );
        $this->load->view("front/template", $data);
       }
    }
    
    public function daftar_action() 
    {
    	if($this->session->userdata('logedin')==TRUE){
			  $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
		}else{
	        $this->_rules();
	        $Email = $this->input->post('email');
	        $sql_cek=$this->db->query("SELECT * FROM user WHERE email='".$Email."'");
            $r_cek = $sql_cek->num_rows();
	        if ($this->form_validation->run() == FALSE) {
	            $this->daftar();
	        } else if($r_cek>0){
	        	echo "alert('Email Sudah terdaftar!')";
	        }else {
	        	$token= hash('sha256', md5(date('Y-m-d'))) ;
	            $data = array(
	                'id_user' => $this->input->post('id_user',TRUE),
	                'nama_user' => $this->input->post('nama',TRUE),
	                'email' => $this->input->post('email',TRUE),
	                'password' => $this->input->post('password',TRUE),
	                'alamat_user' => $this->input->post('alamat',TRUE),
	                'no_hp' => $this->input->post('no_hp',TRUE),
	                'token'=> $token,
	                'aktif'=>0
	            );

	            $this->User_model->insert($data);
				  $this->session->set_flashdata('message', 'Create Record Success');
				  redirect(base_url('login'));
				//echo "<script>alert('Daftar Berhasil');location='login';</script>";
	        }
        }
	}
	public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
	
}
