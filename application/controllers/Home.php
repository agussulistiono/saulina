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
	
	//Module daftar kirim email
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
	        	echo "<script>alert('Email Sudah terdaftar!');history.go(-1);</script>";
	        }else {
	        	$token= hash('sha256', md5(date('Y-m-d'))) ;
	        	$this->load->library('mailer');

				//$email_penerima = $this->input->post('email_penerima');
				//$subjek = $this->input->post('subjek');
				//$pesan = $this->input->post('pesan');
				//$attachment = $_FILES['attachment'];
				//$content = $this->load->view('content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
				$sendmail = array(
					'email_penerima'=>$this->input->post('email',TRUE),
					'subjek'=>"Aktivasi pendaftaran Member",
					'content'=>"Selemat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
 <a href='http://localhost/saulina_ci/aktivasi?t=".$token."'>http://localhost/saulina_ci/aktivasi?t=".$token."</a>"
					
				);

				
				$send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
				
	            $data = array(
	                'id_user' => $this->input->post('id_user',TRUE),
	                'nama_user' => $this->input->post('nama',TRUE),
	                'email' => $this->input->post('email',TRUE),
	                'password' => $this->input->post('password',TRUE),
	                'alamat_user' => $this->input->post('alamat',TRUE),
	                'no_hp' => $this->input->post('no_hp',TRUE),
	                'token'=> $token,
	                'aktif'=>'0'
	            );

	            $this->User_model->insert($data);
				  $this->session->set_flashdata('message', 'Create Record Success');
				  $this->load->view('front/verifikasiemail');
				//echo "<script>alert('Daftar Berhasil');location='login';</script>";
	        }
        }
	}
	public function aktivasi(){
		$token=$_GET['t'];
		 $sql_cek= $this->db->query("SELECT * FROM user WHERE token='".$token."' and aktif='0'");
		 $jml_data=$sql_cek->num_rows();
		 if ($jml_data>0) {
		 	//update data users aktif
		 	$this->db->query("UPDATE user SET aktif='1' WHERE token='".$token."' and aktif='0'");
		 	echo '<div class="alert alert-success">
                        Akun anda sudah aktif, silahkan <a href="'.base_url('login').'">Login</a>
                        </div>';
		 }else{
                    //data tidak di temukan
                     echo '<div class="alert alert-warning">
                        Invalid Token!
                        </div>';
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

	// resetpassword
	public function resetPassword(){
		$this->load->view('reset_password');
	}
	public function reset_action(){
		    $Email = $this->input->post('email');
	        $sql_cek=$this->db->query("SELECT * FROM user WHERE email='".$Email."'");
	        $row =$sql_cek->row_array();
	        $id= $row['id_user'];
	        $r_cek = $sql_cek->num_rows();
	        if($r_cek > 0){
	        	$token= hash('sha256', md5(date('Y-m-d'))) ;
	        	$this->load->library('mailer');
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $code=substr(str_shuffle($set), 0, 15);
				$sendmail = array(
					'email_penerima'=>$this->input->post('email',TRUE),
					'subjek'=>"Aktivasi pendaftaran Member",
					'content'=>"<h2>Password Reset</h2>
					<p>Your Account:</p>
					<p>Email: ".$Email."</p>
					<p>Please click the link below to reset your password.</p>
					<a href='https://localhost/saulina_ci/resetpass?code=".$code."&user=".$id."'>Reset Password</a>"
					
				);

				$send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
	            $data = array(
	                'code'=>$code
	            );
	          
	            $this->User_model->update($id, $data);
				$this->load->view('front/template_email');
	        }else{
	        	echo "<script>alert('Email Tidak terdaftar, Silahkan Daftar Terlebih dahulu!!');history.go(-1);</script>";
	        }
	}

	public function resetpass(){
		$code=$_GET['code'];
		$user=$_GET['user'];
		if(!isset($_GET['code']) OR !isset($_GET['user'])){
		  redirect(base_url());
		}else{
			$this->load->view('resetpassword');
		}
	}

	public function resetnew(){
		$code=$_GET['code'];
		$user=$_GET['user'];
		 if(!isset($_GET['code']) OR !isset($_GET['user'])){
		   redirect(base_url());
		 }else{
		 	$path = 'password_reset.php?code='.$_GET['code'].'&user='.$_GET['user'];
		 	if(isset($_POST['reset'])){
				$password = $this->input->post('password');
				$repassword = $this->input->post('repassword');
				if($password != $repassword){
					echo "<script>alert('Password tidak sama, silahkan cek kembali!');history.go(-1);</script>";
				}
				else{
					 $sql_cek=$this->db->query("SELECT * FROM user WHERE code='".$code."' and id_user='".$user."'");
	       			 $row =$sql_cek->row_array();
	       			 $numrows= $sql_cek->num_rows();
	       			 if($numrows >0 ){
	       			 	$password = $this->input->post('password');
	       			 	$cekpass = $this->db->query("UPDATE user SET password='".$password."' WHERE id_user='".$user."'");
	       			 	if($cekpass){
	       			 		echo "<script>alert('Reset password berhasil, Silahkan Login!!');</script>";
	       			 		header('Location: https://localhost/saulina_ci/login'); 
	       			 	}else{
	       			 		echo "gagal update password";
	       			 	}
	       			 }
	       			 // if($row['numrows'] > 0){
	       			 // 	echo "lanjutkan";
	       			 // }

				}
		 	}

		 }
	 
	}
}
