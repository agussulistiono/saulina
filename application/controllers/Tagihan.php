<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {
	function __construct()
	    { 
	        parent::__construct();
	        $this->load->helper('url', 'form'); 
    		$this->load->library('form_validation');
    		$this->load->library('upload');
            $this->load->library('cart');
	        $this->load->model('TagihanModel');
	        //$this->load->model('login_user_model');
	         $this->load->model('Jasa_model');
	        // $this->load->model('Produk_model');
	        // $this->load->model('Sewa_jasa_model');
	         $this->load->model('Sewa_produk_model');
	        //$this->load->model('pembayaran_model');
	        // $this->load->library('form_validation');
	        $this->load->library('session');
	    }
	    public function riwayat() 
	    {
	    	$this->load->view('front/login/riwayat'); 
	    }

       public function index()
		{
				$username = $this->session->userdata('email');
		        $where = array('email' => $username );
               
		        if($this->session->userdata('logedin')==true){
		            
		    		$data = array(
		                'a' =>$this->TagihanModel->get_user('user',$where),
		                'container' => 'front/login/tagihan', 
		                'footer' => 'front/footer', 
		                'nav' => 'front/login/nav_user'
		            );
		        	$this->load->view("front/template", $data);
		        } else {
		            redirect(base_url("login"));
		        }
		}
	  
	    public function upload_image(){
        $config['upload_path'] = './user/bukti/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
 
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./user/bukti/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './user/bukti/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar=$gbr['file_name'];
                $data = array(
                            'id_sewa'   => $this->input->post('id_sewa'),
                            'biaya'     => $this->input->post('biaya'),
                            'foto'      => $gambar,
                            'tgl_bayar' => $this->input->post('tgl_bayar'),
                            'status'    => $this->input->post('status'),
                            'status_notif'    => '1'
                        );
                $this->TagihanModel->insert('pembayaran',$data);
                redirect(base_url('tagihan/index'));
                
            }
             
                      
        }else{
            echo "Image yang diupload kosong";
        }
                 
    }

    public function detail_pembayaran(){
        // $username = $this->session->userdata('email');
        // $where = array('email' => $username );
        // $id_user = $this->TagihanModel->get_user('user',$where);
        // $row = $id_user->row();
        // $where1=array('id_user' => $row->id_user );
        if($this->session->userdata('logedin')==TRUE){
            $data = array(
                          "container" => "front/login/invoice",
                          "footer" => "front/footer",
                          "nav" => "front/login/nav_user");
            $this->load->view("front/template", $data);
        }
    }



    public function jasa_tari(){
        if (isset($_POST['submit'])){

            $id_jasa=$this->input->post('id_jasa');
            $stokawal=$this->input->post('stoka');
            $jmlhpenari=$this->input->post('jml_penari');
            
            $id_user= $this->input->post('id_user');

            $id_sj=$this->input->post('id_sj');
            $tempat=$this->input->post('tempat');
            $tglsewa=$this->input->post('now');
            $tgl_acara=$this->input->post('tgl_acara');
            $biaya=$this->input->post('biaya');
            $waktu=$this->input->post('waktu');
            //cek stok dari db dan tanggal booking
            $id_jasa=$this->input->post('id_jasa');
            $data =array('id_jasa' =>$id_jasa );
            $data1 =array('id_user' =>$this->input->post('id_user'));

            $st = $this->TagihanModel->view_where('jasa', $data);
            $sewa = $this->TagihanModel->view_wheresj('sewa_jasa',$data1);
            $jasa = $sewa->row();
            $stk = $st->row();
            $tglacaradb = $jasa->tgl_acara;
            $user = $jasa->id_user;
            $stokupdb  = $stk->stok_penari;
            $sisastok  = $stokupdb - $jmlhpenari;
            $tglnow= $this->input->post('now');


            if($jmlhpenari > $stokawal ){
                $this->session->set_flashdata('gagal','Jumlah penari tidak mencukupi...');
                redirect(base_url('User_login/form_tari/'.$id_jasa));
            }elseif($stokupdb < 3){
                     $this->session->set_flashdata('gagal','penari sudah dibooking, jumlah penari tidak cukup, untuk bisa booking min jumlah penari 3 orang ');
                     redirect(base_url('User_login/form_tari/'.$id_jasa));
            }elseif($jmlhpenari == ""){
                $this->session->set_flashdata('gagal','Jumlah Penari tidak boleh kosong ');
                     redirect(base_url('User_login/form_tari/'.$id_jasa));
            }elseif($jmlhpenari < 3){
                $this->session->set_flashdata('gagal','Jumlah Penari tidak boleh Kurang dari 3 ');
                     redirect(base_url('User_login/form_tari/'.$id_jasa));
            }
            elseif($tgl_acara == $tglacaradb){
                $this->session->set_flashdata('gagal','Anda sudah booking untuk tanggal tersebut ');
               redirect(base_url('User_login/form_tari/'.$id_jasa));
            }elseif($tgl_acara <= $tglnow){
                $this->session->set_flashdata('gagal','Tanggal Tidak boleh Tanggal Sekarang, minimal H-1 ');
               redirect(base_url('User_login/form_tari/'.$id_jasa));
            }
            elseif(($tgl_acara==$tglacaradb )And ($id_user==$user )){
                 $this->session->set_flashdata('gagal','Anda sudah booking penari untuk tanggal tersebut, pilih tanggal lain!  ');
                redirect(base_url('User_login/form_tari/'.$id_jasa));
             }
            else{
                    $data = array('id_sj' =>$id_sj,
                                  'id_jasa'=>$id_jasa,
                                  'id_user'=>$id_user,
                                  'jumlah_penari'=>$jmlhpenari,
                                  'biaya'=>$biaya,
                                  'tgl_sewa'=>$tglsewa,
                                  'alamat'=>$tempat,
                                  'tgl_acara'=>$tgl_acara,
                                  'waktu'=>$waktu 
                              );
                    $data2= array('stok_penari' => $sisastok );
                    $where =array('id_jasa' =>$id_jasa );
                    //insert
                    $this->TagihanModel->insert('sewa_jasa', $data);
                    //update stok sewa
                    $this->TagihanModel->updatejasa('jasa', $data2, $where);
                    //-------------------------Input data detail order-----------------------       
                    if ($cart = $this->cart->contents())
                        {
                            foreach ($cart as $item)
                                {
                                    $data_detail = array('id_sj' =>$id_sj,
                                                     'id_produk' => $item['id']
                                                    );         
                                    $proses = $this->TagihanModel->tambah_detail_order($data_detail);
                                }
                        }
                    //-------------------------Hapus shopping cart--------------------------        
                    $this->cart->destroy();
                   // $data['kategori'] = $this->keranjang_model->get_kategori_all();
                    $this->session->set_flashdata('gagal','data Suksess disimpan');
                    redirect(base_url('tagihan/invoice/'.$id_sj));
            }

        }else{
            $this->session->set_flashdata('gagal','cek ketersediaan gagal');
            redirect(base_url('User_login/form_tari/'.$id));
        }
        
    }

     public function invoice($id){
        $username = $this->session->userdata('email');
        $where = array('email' => $username );
        $id_user = $this->TagihanModel->get_user('user',$where);

        $row = $id_user->row();
        
        $where1=array('id_user' => $row->id_user );
        $field='id_sj';
        $field1='id_sewa';
        $order=$id;
        $table1='pembayaran';
        $table2='sewa_jasa';
        $ordering='ASC';
        $data= array('id_sewa' => $id);
        $data1= array('id_sj' => $id);
        
        if($this->session->userdata('logedin')==TRUE){
            $data = array("id"=>$id,
                          "pembayaran"=> $this->TagihanModel->view_where('pembayaran', $data),
                          "sewa_jasa"=> $this->TagihanModel->view_join_where1('sewa_jasa','jasa','id_jasa', $data1),
                          "joinsewa"=>$this->TagihanModel->view_join_wherejs($table1,$table2,$field,$field1, $where1),
                          "container" => "front/login/invoice",
                          "footer" => "front/footer",
                          "nav" => "front/login/nav_user"
                        );
            $this->load->view("front/template", $data);
        }
    }

    public function cetak_invoice($id){
        $username = $this->session->userdata('email');
        $where = array('email' => $username );
        $id_user = $this->TagihanModel->get_user('user',$where);
        $row = $id_user->row();
        $where1=array('id_user' => $row->id_user );
        $field='id_sj';
        $field1='id_sewa';
        $order=$id;
        $table1='pembayaran';
        $table2='sewa_jasa';
        $ordering='ASC';
        $data= array('id_sewa' => $id);
        $data1= array('id_sj' => $id);
        if($this->session->userdata('logedin')==TRUE){
            $data = array("id"=>$id,
                          "pembayaran"=> $this->TagihanModel->view_where('pembayaran', $data),
                          "sewa_jasa"=> $this->TagihanModel->view_join_where1('sewa_jasa','jasa','id_jasa', $data1),
                          "joinsewa"=>$this->TagihanModel->view_join_wherejs($table1,$table2,$field,$field1, $where1)
                        );
            $this->load->view("front/login/cetak_invoice", $data);
        }
    }

//Keranjang Pemesanan

    public function keranjang($id){
        $idtar=$id;
        if($this->session->userdata('logedin')==TRUE){
           
             $data = array( "idtari" =>$idtar,
                            "container" => "front/login/kostum",
                            "footer" => "front/login/footer",
                            "nav" => "front/login/nav_user"
                        );
            $this->load->view("front/template", $data);
        }
        else{
            redirect(base_url('login'));
        }
    }

    function add_to_cart(){ //fungsi Add To Cart
        if($this->session->userdata('logedin')==TRUE){
        $data = array(
            'id' => $this->input->post('produk_id'), 
            'name' => $this->input->post('produk_nama'), 
            'price' => $this->input->post('produk_harga'),
            'foto' => $this->input->post('foto') 
             
        );
        $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
        }
    }

   function show_cart(){ //Fungsi untuk menampilkan Cart
        if($this->session->userdata('logedin')==TRUE){
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>'.number_format($items['price']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        
        return $output;
      }
    }

///ini ad cart
  function tambah()
    {
        if($this->session->userdata('logedin')==TRUE){
        $data_produk= array('id' => $this->input->post('id'),
                             'idtari' => $this->input->post('idtari'),
                             'name' => $this->input->post('nama'),
                             'price' => $this->input->post('harga'),
                             'foto' => $this->input->post('foto'),
                             'qty' =>$this->input->post('qty')
                            );
        $this->cart->insert($data_produk);
        redirect('Tagihan/Keranjang/'.$this->input->post('idtari'));
       }
    }

    function hapus($idtari, $rowid) 
    {
        if($this->session->userdata('logedin')==TRUE){
        if ($rowid=="all")
            {
                $this->cart->destroy();
            }
        else
            {
                $data = array('rowid' => $rowid,
                              'qty' =>0);
                $this->cart->update($data);
            }
 
         redirect('Tagihan/Keranjang/'.$idtari);
        }
      }




// form tari
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
            redirect(base_url("home/login"));
        }
    }


    //sewasekaranga
    public function proses_order()
    {
        //-------------------------Input data pelanggan--------------------------
        $data_pelanggan = array('nama' => $this->input->post('nama'),
                            'email' => $this->input->post('email'),
                            'alamat' => $this->input->post('alamat'),
                            'telp' => $this->input->post('telp'));
        $id_pelanggan = $this->keranjang_model->tambah_pelanggan($data_pelanggan);
        //-------------------------Input data order------------------------------
        $data_order = array('tanggal' => date('Y-m-d'),
                            'pelanggan' => $id_pelanggan);
        $id_order = $this->keranjang_model->tambah_order($data_order);
        //-------------------------Input data detail order-----------------------       
        if ($cart = $this->cart->contents())
            {
                foreach ($cart as $item)
                    {
                        $data_detail = array('order_id' =>$id_order,
                                        'produk' => $item['id'],
                                        'qty' => $item['qty'],
                                        'harga' => $item['price']);         
                        $proses = $this->keranjang_model->tambah_detail_order($data_detail);
                    }
            }
        //-------------------------Hapus shopping cart--------------------------        
        $this->cart->destroy();
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $this->load->view('themes/header',$data);
        $this->load->view('shopping/sukses',$data);
        $this->load->view('themes/footer');
    }
}