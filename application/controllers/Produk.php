<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        if(isset($_SESSION['username'])){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'produk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'produk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'produk/index.html';
            $config['first_url'] = base_url() . 'produk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Produk_model->total_rows($q);
        $produk = $this->Produk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'produk_data' => $produk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/produk/produk_list", 
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
        $row = $this->Produk_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_produk' => $row->id_produk,
            'judul' => $row->judul,
            'stok' => $row->stok,
            'harga' => $row->harga,
            'foto' => $row->foto,
            'tglinput' => $row->tglinput,
            "container" => "admin/produk/produk_read", 
            "footer" => "admin/footer",
            "nav" => "admin/nav"
	    );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/produk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produk/create_action'),
            'id_produk' => set_value('id_produk'),
            'judul' => set_value('judul'),
            'deskripsi' => set_value('deskripsi'),
            'stok' => set_value('stok'),
            'harga' => set_value('harga'),
            'foto' => set_value('foto'),
            'tglinput' => set_value('tglinput'),
            "container" => "admin/produk/produk_form", 
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
        } else {
            $config['upload_path'] = './user/produk_dan_jasa/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
     
            $this->upload->initialize($config);
            if(!empty($_FILES['filefoto']['name'])){
     
                if ($this->upload->do_upload('filefoto')){
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
                        'id_produk' => $this->input->post('id_produk',TRUE),
                        'judul' => $this->input->post('judul',TRUE),
                        'deskripsi' => $this->input->post('deskripsi',TRUE),
                        'stok' => $this->input->post('stok',TRUE),
                        'harga' => $this->input->post('harga',TRUE),
                        'foto' => $gambar,
                        'tglinput' => $this->input->post('tglinput',TRUE)
                    );

            $this->Produk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/produk'));
                }  
             }else{
                $data = array(
                        'id_produk' => $this->input->post('id_produk',TRUE),
                        'judul' => $this->input->post('judul',TRUE),
                        'deskripsi' => $this->input->post('deskripsi',TRUE),
                        'stok' => $this->input->post('stok',TRUE),
                        'harga' => $this->input->post('harga',TRUE),
                        'tglinput' => $this->input->post('tglinput',TRUE)
                    );

            $this->Produk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/produk'));
             }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produk/update_action'),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'judul' => set_value('judul', $row->judul),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'stok' => set_value('stok', $row->stok),
                'harga' => set_value('harga', $row->harga),
                'foto' => set_value('foto', $row->foto),
                'tglinput' => set_value('tglinput', $row->tglinput),
                "container" => "admin/produk/produk_form", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
	    );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/produk'));
        } 
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk', TRUE));
        } else {

            $config['upload_path'] = './user/produk_dan_jasa/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
     
            $this->upload->initialize($config);
            if(!empty($_FILES['filefoto']['name'])){
     
                if ($this->upload->do_upload('filefoto')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./user/produk_dan_jasa/'.$gbr['file_name'];
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
                        'judul' => $this->input->post('judul',TRUE),
                        'deskripsi' => $this->input->post('deskripsi',TRUE),
                        'stok' => $this->input->post('stok',TRUE),
                        'harga' => $this->input->post('harga',TRUE),
                        'foto' => $gambar,
                        'tglinput' => $this->input->post('tglinput',TRUE)
                    );
                    $this->Produk_model->update($this->input->post('id_produk', TRUE),$data);
                    redirect(base_url('admin/produk'));
                    
                }
          }else{
            $data = array(
                        'judul' => $this->input->post('judul',TRUE),
                        'deskripsi' => $this->input->post('deskripsi',TRUE),
                        'stok' => $this->input->post('stok',TRUE),
                        'harga' => $this->input->post('harga',TRUE),
                        'tglinput' => $this->input->post('tglinput',TRUE)
                    );
                    $this->Produk_model->update($this->input->post('id_produk', TRUE),$data);
                    redirect(base_url('admin/produk'));
          }
    }
}
    
    public function delete($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $this->Produk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/produk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/produk'));
        }
    }

    private function _uploadImage(){
         
        $liatdata=$this->db->query("SELECT * FROM produk");
        $idsementara=$liatdata->num_rows()+1;
        $id_produk="$idsementara";
        $id_produk=substr($id_produk,-8);
                
        $config['upload_path']          = './user/produk_dan_jasa/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $id_produk;
        $config['overwrite']		    = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
                return $this->upload->data("file_name");
        }
                return "default.jpg";
        }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');

	$this->form_validation->set_rules('id_produk', 'id_produk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-25 07:58:24 */
/* http://harviacode.com */