<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jasa extends CI_Controller 
{
    function __construct()
    { 
        parent::__construct();
        $this->load->model('Jasa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jasa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jasa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jasa/index.html';
            $config['first_url'] = base_url() . 'jasa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jasa_model->total_rows($q);
        $jasa = $this->Jasa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jasa_data' => $jasa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/jasa/jasa_list", 
            "footer" => "admin/footer",
            "nav" => "admin/nav"
        );
        $this->load->view('admin/template', $data);
        } else {
            redirect(base_url("admin/index"));
        }
    }

    public function read($id) 
    {
        $row = $this->Jasa_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_jasa' => $row->id_jasa,
            'nama' => $row->nama,
            'harga' => $row->harga,
            'deskripsi' => $row->deskripsi,
            'foto_jasa' => $row->foto_jasa,
            'tgl_input' => $row->tgl_input,
            "container" => "admin/jasa/jasa_read", 
            "footer" => "admin/footer",
            "nav" => "admin/nav"
	        );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/jasa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jasa/create_action'),
            'id_jasa' => set_value('id_jasa'),
            'nama' => set_value('nama'),
            'stok_penari' => set_value('stok_penari'),
            'harga' => set_value('harga'),
            'deskripsi' => set_value('deskripsi'),
            'foto_jasa' => set_value('foto_jasa'),
            'tgl_input' => set_value('tgl_input'),
            "container" => "admin/jasa/jasa_form", 
            "footer" => "admin/footer",
            "nav" => "admin/nav"
        );
        $this->load->view('admin/template', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

          if ($this->form_validation->run() == FALSE) { 
            $this->create();
            }else{
    
                $config['upload_path'] = './user/produk_dan_jasa/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
         
                $this->upload->initialize($config);
                if(!empty($_FILES['foto_jasa']['name'])){
         
                    if ($this->upload->do_upload('foto_jasa')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='./user/produk_dan_jasa/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        $config['width']= 600;
                        $config['height']= 400;
                        $config['new_image']= './user/produk_dan_jasa/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $gambar=$gbr['file_name'];
                        $data = array(
                            'id_jasa' => $this->input->post('id_jasa',TRUE),
                            'nama' => $this->input->post('nama',TRUE),
                            'stok_penari' => $this->input->post('stok_penari',TRUE),
                            'harga' => $this->input->post('harga',TRUE),
                            'deskripsi' => $this->input->post('deskripsi',TRUE),
                            'foto_jasa' => $gambar,
                            'tgl_input' => $this->input->post('tgl_input',TRUE),
                        );
                             
                        $this->Jasa_model->insert($data);
                        $this->session->set_flashdata('message', 'Create Record Success');
                        redirect(site_url('admin/jasa'));
                        
                     }
                        
                             
                }else{
                    $data = array(
                            'id_jasa' => $this->input->post('id_jasa',TRUE),
                            'nama' => $this->input->post('nama',TRUE),
                            'stok_penari' => $this->input->post('stok_penari',TRUE),
                            'harga' => $this->input->post('harga',TRUE),
                            'deskripsi' => $this->input->post('deskripsi',TRUE),
                            'tgl_input' => $this->input->post('tgl_input',TRUE),
                        );
                             
                        $this->Jasa_model->insert($data);
                        $this->session->set_flashdata('message', 'Create Record Success');
                        redirect(site_url('admin/jasa'));
                }
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
                            'nama' => $this->input->post('nama',TRUE),
                            'stok_penari' => $this->input->post('stok_penari',TRUE),
                            'harga' => $this->input->post('harga',TRUE),
                            'deskripsi' => $this->input->post('deskripsi',TRUE),
                            'foto_jasa' => $gambar,
                            'tgl_input' => $this->input->post('tgl_input',TRUE),
                        );
                $this->TagihanModel->insert('pembayaran',$data);
                redirect(base_url('tagihan/index'));
                
            }
             
                      
        }else{
            echo "Image yang diupload kosong";
        }
                 
    }
    
    public function update($id) 
    {
        $row = $this->Jasa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jasa/update_action'),
                'id_jasa' => set_value('id_jasa', $row->id_jasa),
                'nama' => set_value('nama', $row->nama),
                'stok_penari'=>set_value('stok_penari',$row->stok_penari),
                'harga' => set_value('harga', $row->harga),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'foto_jasa' => set_value('foto_jasa', $row->foto_jasa),
                'tgl_input' => set_value('tgl_input', $row->tgl_input),
                "container" => "admin/jasa/jasa_form", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
                );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jasa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jasa', TRUE));
        } else {
                $config['upload_path'] = './user/produk_dan_jasa/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
         
                $this->upload->initialize($config);
                if(!empty($_FILES['foto_jasa']['name'])){
         
                    if ($this->upload->do_upload('foto_jasa')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='./user/produk_dan_jasa/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        $config['width']= 600;
                        $config['height']= 400;
                        $config['new_image']= './user/produk_dan_jasa/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $gambar=$gbr['file_name'];
                        $data = array(
                            'nama' => $this->input->post('nama',TRUE),
                            'stok_penari' => $this->input->post('stok_penari',TRUE),
                            'harga' => $this->input->post('harga',TRUE),
                            'deskripsi' => $this->input->post('deskripsi',TRUE),
                            'foto_jasa' => $gambar,
                            'tgl_input' => $this->input->post('tgl_input',TRUE),
                        );

                        $this->Jasa_model->update($this->input->post('id_jasa', TRUE), $data);
                        $this->session->set_flashdata('message', 'Update Record Success');
                        redirect(site_url('admin/jasa'));
                    }
                }else{
                    $data = array(
                            'nama' => $this->input->post('nama',TRUE),
                            'stok_penari' => $this->input->post('stok_penari',TRUE),
                            'harga' => $this->input->post('harga',TRUE),
                            'deskripsi' => $this->input->post('deskripsi',TRUE),
                            'tgl_input' => $this->input->post('tgl_input',TRUE),
                        );

                        $this->Jasa_model->update($this->input->post('id_jasa', TRUE), $data);
                        $this->session->set_flashdata('message', 'Update Record Success');
                        redirect(site_url('admin/jasa'));
                }
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jasa_model->get_by_id($id);

        if ($row) {
            $this->Jasa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/jasa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/jasa'));
        }
    }

    private function _uploadImage(){
         
        $liatdata=$this->db->query("SELECT * FROM jasa");
        $idsementara=$liatdata->num_rows();
        $id_jasa="$idsementara";
        // $id_jasa=substr($id_jasa,-8);
                
        $config['upload_path']          = './user/produk_dan_jasa/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $id_jasa;
        $config['overwrite']		    = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_jasa')) {
                return $this->upload->data("file_name");
        }
                return "default.jpg";
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('stok_penari', 'stok_penari', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	// $this->form_validation->set_rules('foto_jasa', 'foto_jasa', 'trim|required');
	$this->form_validation->set_rules('tgl_input', 'tgl input', 'trim|required');

	$this->form_validation->set_rules('id_jasa', 'id_jasa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jasa.php */
/* Location: ./application/controllers/Jasa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-25 07:58:32 */
/* http://harviacode.com */