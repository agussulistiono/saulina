<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {
	function __construct()
	    { 
	        parent::__construct();
	        $this->load->helper('url', 'form'); 
    		$this->load->library('form_validation');
	        $this->load->model('TagihanModel');
	        //$this->load->model('login_user_model');
	        // $this->load->model('Jasa_model');
	        // $this->load->model('Produk_model');
	        // $this->load->model('Sewa_jasa_model');
	        // $this->load->model('Sewa_produk_model');
	        // $this->load->model('pembayaran_model');
	        // $this->load->library('form_validation');
	        $this->load->library('session');
	    }
	public function index()
	{
			$username = $this->session->userdata('email');
	        $where = array('email' => $username );
	        if($this->session->userdata('logedin')==true){
	            
	    		$data = array(
	                'a' =>$this->TagihanModel->get_user('user',$where),
	                'container' => 'front/login/invoice', 
	                'footer' => 'front/footer', 
	                'nav' => 'front/login/nav_user'
	            );
	        	$this->load->view("front/template", $data);
	        } else {
	            redirect(base_url("home/login"));
	        }
	}


	public function riwayat() 
    {
    	$this->load->view('front/login/riwayat'); 
    }
    public function aksiupload(){
    	$config['upload_path'] = './assets/img/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
 
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/img/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './assets/img/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
                $data = array(
                            'id_sewa'   => $this->input->post('id_sewa'),
                            'biaya'     => $this->input->post('biaya'),
                            'foto'      => $gambar,
                            'tgl_bayar' => $this->input->post('tgl_bayar'),
                            'status'    => $this->input->post('status')
                            
                        );
                $this->pembayaran_model->insert($data);
             	redirect(site_url('tagihan/index'));
                echo "Image berhasil diupload";
            }
                      
        }else{
            echo "Image yang diupload kosong";
        }
		

	} 


	public function aksiupload1(){
		if (isset($_POST['upload'])){
            $config['upload_path'] = './bukti/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '10000000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('uploadgambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                echo'gagal karna kosong';
            }else{
            	echo "rposess";
            }
        }else{
            echo "ini bukan ditekan upload";
        }
	}


}
