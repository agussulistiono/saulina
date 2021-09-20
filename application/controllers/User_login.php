<?php 
class User_login extends CI_Controller{
    function __construct()
    { 
        parent::__construct();
        $this->load->helper('form', 'url');
        $this->load->model('login_user_model');
        $this->load->model('Jasa_model');
        $this->load->model('Produk_model'); 
        $this->load->model('Sewa_jasa_model');
        $this->load->model('Sewa_produk_model');
        $this->load->model('pembayaran_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index(){
        if($this->session->userdata('logedin')==TRUE){
    		$data = array("container" => "front/login", "footer" => "front/footer", "nav" => "front/nav");
    		$this->load->view("front/template", $data);
        }
	}
  
	function aksi_login(){
		$email= $this->input->post('email');
		$password = $this->input->post('password');
        
        $cek= $this->db->query("select * from user where email='$email' and password='$password'");
        $rq=$cek->row_array();
        $a=$cek->num_rows();
        
        if($a==TRUE){

            $data_session = array(
                 'email' => $email,
                 'password' => $password,
                 'logedin' =>true,
                 'id_user'=>'id_user'
                 );
            $this->session->set_userdata($data_session);
            $query= $this->db->query("select * from user where email='$email' and password='$password'");
            $row = $query->row();
            if($row->aktif == 0 ){
                echo "<script>alert('Akun anda blum di verifikasi');history.go(-2);</script>";
            }elseif($this->session->userdata('email')== $row->email) {
                 $data_session = array(
                 'id_user'=>'id_user',
                 'email' => $row->email,
                 'password' => $row->password,
                 'nama' =>$row->nama_user,
                 'alamat'=>$row->alamat_user,
                 'no_hp'=>$row->no_hp,
                 'logedin' =>true
                 );
                $this->session->set_userdata($data_session);
                redirect(base_url("user_login/home"));
            }else{
                $this->session->set_flashdata('gagal','Anda Gagal Login, cek Username dan Password atau link belum di aktivasi');
                redirect(base_url("login"));
            }
        }else{ 

            echo "<script>alert('Anda Gagal Login, cek Username dan Password');history.go(-1);</script>";
        }
	}
        function home(){
            if($this->session->userdata('logedin')==TRUE){
              $data = array("container" => "front/login/home", "footer" => "front/footer", "nav" => "front/login/nav_user");
              $this->load->view("front/template", $data);
             } else {
                 redirect(base_url("login"));
            }
        }
                
	function logout(){
            $this->session->unset_userdata(array('email'=>''));
            $this->session->sess_destroy();
            redirect(base_url("Home"));
    }
    
    public function detail_jasa($id) 
    {
        if(isset($_SESSION['email'])){
        $row = $this->Jasa_model->get_by_id($id);
            $data = array(
                'id_jasa' => $row->id_jasa,
                'nama' => $row->nama,
                'harga' => $row->harga,
                'deskripsi' => $row->deskripsi,
                'foto_jasa' => $row->foto_jasa,
                'tgl_input' => $row->tgl_input,
                "container" => "front/login/detail_tari", "footer" => "front/footer", "nav" => "front/login/nav_user"
	        );
            $this->load->view('front/template', $data);
        } else {
            redirect(base_url("login"));
        }
    }
    public function form_tari($id) 
    {
        if(isset($_SESSION['email'])){
        $row = $this->Jasa_model->get_by_id($id);
        $data = array(
            'id_sj' => set_value('id_sj'),
            'id_jasa' => set_value('id_jasa', $row->id_jasa),
            'id_user' => set_value('id_user'),
            'biaya' => set_value('biaya', $row->harga),
            'tgl_sewa' => set_value('tgl_sewa'),
            'alamat' => set_value('alamat'),
            'tgl_acara' => set_value('tgl_acara'),
            "container" => "front/login/form_sewa_tari", "footer" => "front/footer", "nav" => "front/login/nav_user"
	);
        $this->load->view('front/template', $data);
    } else {
        redirect(base_url("login"));
    }
    }

                      
    public function bayaran() 
    {
            $data = array(
                'id_sewa' => $this->input->post('id_sewa',TRUE),
                'biaya' => $this->input->post('biaya',TRUE),
                'foto' => $this->_uploadImage(),
                'tgl_bayar' => $this->input->post('tgl_bayar',TRUE),
                'status' => $this->input->post('status',TRUE),
            );

            $this->pembayaran_model->insert($data);
            redirect(site_url('user_login/tagihan'));
    }
    
    private function _uploadImage(){
         
        
        // $liatdata=$this->db->query("SELECT * FROM pembayaran");
        // $idsementara=$liatdata->num_rows()+1;
        // $id_pembayaran="P$idsementara";
        // $id_pembayaran=$this->id_pem = uniqid();
                
        $config['upload_path']          = './user/bukti/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_pembayaran;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
                return $this->upload->data("file_name");
        }
                return "default.jpg";
        }
    public function jasa_action($id) 
    {
           $row = $this->Jasa_model->get_by_id($id);
       
            $data = array(
                'id_sj' => $this->input->post('id_sj',TRUE),
                'id_jasa' => $this->input->post('id_jasa',TRUE),
                'id_user' => $this->input->post('id_user',TRUE),
                'biaya' => $this->input->post('biaya',TRUE),
                'tgl_sewa' => $this->input->post('tgl_sewa',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'tgl_acara' => $this->input->post('tgl_acara',TRUE),
            );
            $z=$this->input->post('tgl_acara',TRUE);
            $cek= $this->db->query("select tgl_acara from sewa_jasa where tgl_acara='$z'");  
            $a=$cek->num_rows();
            if($a==FALSE){
                $this->Sewa_jasa_model->insert($data);
                redirect(base_url("user_login/tagihan"));
            }else{
                $this->session->set_flashdata('message', 'Maaf Tanggal Sudah Ada yang booking');
                redirect(site_url('user_login/form_jasa/'.$id));
            }
    }

    public function bayaran2(){
        if($this->session->userdata('logedin')==true){
                $ukuran_gambar=$_FILES['userfile']['size'];
                $config['upload_path']          = './user/bukti';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|';
                //$config['file_name']            = ['foto']['file_name'];
                $config['overwrite']            = true;
                $config['max_size']             = 2000000; // 2MB
                $config['max_width']            = 2048;
                $config['max_height']           = 1024;
                $this->load->library('upload');
                $this->upload->initialize($config);
                    if($this->upload->do_upload('userfile')){
                        $hasil=$this->upload->data();  
                         echo $hasil['file_name'];
                        $data = array(
                            'id_sewa'   => $this->input->post('id_sewa'),
                            'biaya'     => $this->input->post('biaya'),
                            'foto'      => $hasil['file_name'],
                            'tgl_bayar' => $this->input->post('tgl_bayar'),
                            'status'    => $this->input->post('status'),
                            'status_notif'=> '1'
                        );
                        $this->pembayaran_model->insert($data);
                     redirect(site_url('user_login/tagihan'));
                    }else{
                        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png  dan Ukuran Kurang dari 2MB";
                    }
        }else{
            echo "silahkan login";
        }

    } 

    public function bayaran1() 
    {
        if($this->session->userdata('logedin')==true){
                
                $config['upload_path']          = './user/bukti';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|';
                //$config['file_name']            = ['foto']['file_name'];
                $config['overwrite']            = true;
                $config['max_size']             = 2000000; // 2MB
                // $config['max_width']            = 2048;
                // $config['max_height']           = 1024;
                $this->load->library('upload');
                $this->upload->initialize($config);
                    if($this->upload->do_upload('userfile')){
                        //$hasil=$this->upload->data();  
                        //echo $hasil['file_name'];
                        // $data = array(
                        //     'id_sewa'   => $this->input->post('id_sewa'),
                        //     'biaya'     => $this->input->post('biaya'),
                        //     'foto'      => $hasil['file_name'],
                        //     'tgl_bayar' => $this->input->post('tgl_bayar'),
                        //     'status'    => $this->input->post('status'),
                        //     'status_notif'=> '1'
                        // );
                        // $this->pembayaran_model->insert($data);
                        // redirect(site_url('user_login/tagihan'));
                        echo "Berhasil";
                    }else{
                        echo "gagal upload";
                    }
        }else{
            echo "silahkan login";
        }          
    }


        public function form_kostum($id) 
        {
            if(isset($_SESSION['email'])){
            $row = $this->Produk_model->get_by_id($id);
            $data = array(
                'id_sp' => set_value('id_sp'),
                'id_user' => set_value('id_user'),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'tgl_sewa' => set_value('tgl_sewa'),
                'biaya' => set_value('biaya', $row->harga),
                'alamat' => set_value('alamat'),
                'tgl_acara' => set_value('tgl_acara'),
                'jml_pesan' => set_value('jml_pesan'),
                "container" => "front/login/form_sewa_kostum", "footer" => "front/footer", "nav" => "front/login/nav_user"
            );
                $this->load->view('front/template', $data);
            } else {
                redirect(base_url("login"));
            }
        }

         public function _rules() 
        {
        $this->form_validation->set_rules('id_sewa', 'Id Sewa', 'trim|required');
        // $this->form_validation->set_rules('foto_galeri', 'foto galeri', 'trim|required');
        $this->form_validation->set_rules('tgl_bayar', 'tgl Bayar', 'trim|required');

        $this->form_validation->set_rules('status', 'status', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        }

        public function detail_kostum($id) 
        {
           if($this->session->userdata('logedin')==true){
            $row = $this->Produk_model->get_by_id($id);
                $data = array(
                    'id_kostum' => $row->id_produk,
                    'judul' => $row->judul,
                    'harga' => $row->harga,
                    'deskripsi' => $row->deskripsi,
                    'foto_produk' => $row->foto,
                    'stock' => $row->stok,
                    'tgl_input' => $row->tglinput,
                    'container' => "front/login/detail_kostum", "footer" => "front/footer", "nav" => "front/login/nav_user"
                );
                $this->load->view('front/template', $data);
            } else {
                redirect(base_url("login"));
            }
        }
    public function produk_action($id) 
    {

         $row = $this->Produk_model->get_by_id($id);
         
            $data = array(
                'id_sp' => $this->input->post('id_sp',TRUE),
                'id_user' => $this->input->post('id_user',TRUE),
                'id_produk' => $this->input->post('id_produk',TRUE),
                'tgl_sewa' => $this->input->post('tgl_sewa',TRUE),
                'biaya' => $this->input->post('biaya',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'tgl_acara' => $this->input->post('tgl_acara',TRUE),
                'jml_pesan' => $this->input->post('jml_pesan',TRUE),
            );
            $z=$this->input->post('jml_pesan',TRUE);
            $cek= $this->db->query("select * from produk where id_produk='$id'");  
            $a=$cek->row();
            if($z > $a->stok){
                $this->session->set_flashdata('success', 'Maaf Stok Tidak Cukup');
                redirect(site_url('user_login/form_kostum/'.$id));
            }else{
                $this->Sewa_produk_model->insert($data);
                redirect(base_url("user_login/tagihan"));
            }
    }
    // public function re(){
	// 	$this->load->view("user/login/reload");
	// }
        
    }
?>
