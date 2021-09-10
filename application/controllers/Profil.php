<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/profil/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/profil/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/profil/index.html';
            $config['first_url'] = base_url() . 'admin/profil/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Profil_model->total_rows($q);
        $profil = $this->Profil_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'profil_data' => $profil,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/profil/profil_list", 
            "footer" => "admin/footer",
            "nav" => "admin/nav"
        );
        $this->load->view('admin/template', $data);
        } else {
            redirect(base_url("admin/index"));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Profil_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profil/update_action'),
                'id_profil' => set_value('id_profil', $row->id_profil),
                'judul' => set_value('judul', $row->judul),
                'isi_profil' => set_value('isi_profil', $row->isi_profil),
                'foto_profil' => set_value('foto_profil', $row->foto_profil),
                "container" => "admin/profil/profil_form", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
	    );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/profil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_profil', TRUE));
        } else {
            
            $config['upload_path'] = './user/profil/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
     
            $this->upload->initialize($config);
            if(!empty($_FILES['foto_profil']['name'])){
     
                if ($this->upload->do_upload('foto_profil')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./user/profil/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 2048;
                    $config['height']= 1024;
                    $config['new_image']= './user/profil/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar=$gbr['file_name'];
                    $judul = $this->input->post('judul');
                    $isi_profil = $this->input->post('isi_profil');
                    $foto = $this->db->get_where('profil','id_profil');
                     $data= array(
                        'judul'=>$judul,
                        'isi_profil'=>$isi_profil,
                        'foto_profil'=>$gambar
                        );
                   
                    $this->Profil_model->update($this->input->post('id_profil', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('admin/profil'));
                    
                }
                 
                          
            }else{
                echo "Image yang diupload kosong";
            }


           
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('isi_profil', 'isi profil', 'trim|required');

	$this->form_validation->set_rules('id_profil', 'id_profil', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    private function _uploadImage(){
               
        $config['upload_path']          = './user/slider/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'profil';
        $config['overwrite']		    = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_profil')) {
                    return $this->upload->data("file_name");
            }
                    return "default.jpg";
            }

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-24 10:45:26 */
/* http://harviacode.com */