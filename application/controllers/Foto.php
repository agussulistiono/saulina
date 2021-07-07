<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Foto extends CI_Controller
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('Foto_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'foto/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'foto/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'foto/index.html';
            $config['first_url'] = base_url() . 'foto/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Foto_model->total_rows($q);
        $foto = $this->Foto_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'foto_data' => $foto,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/foto/foto_list", 
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
        $row = $this->Foto_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_galeri' => $row->id_galeri,
                'ket_galeri' => $row->ket_galeri,
                'foto_galeri' => $row->foto_galeri,
                'tglinput_galeri' => $row->tglinput_galeri,
                "container" => "admin/foto/foto_read", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/foto'));
        }
    }

    public function create() 
    {
        $data = array( 
            'button' => 'Create',
            'action' => site_url('foto/create_action'),
            'id_galeri' => set_value('id_galeri'),
            'ket_galeri' => set_value('ket_galeri'),
            'foto_galeri' => set_value('foto_galeri'),
            'tglinput_galeri' => set_value('tglinput_galeri'),
            "container" => "admin/foto/foto_form", 
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
            $config['upload_path'] = './user/galeri/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
     
            $this->upload->initialize($config);
            if(!empty($_FILES['foto_galeri']['name'])){
     
                if ($this->upload->do_upload('foto_galeri')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./user/galeri/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 600;
                    $config['height']= 400;
                    $config['new_image']= './user/galeri/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar=$gbr['file_name'];
                    $data = array(
                        'id_galeri' => $this->input->post('id_galeri',TRUE),
                        'ket_galeri' => $this->input->post('ket_galeri',TRUE),
                        'foto_galeri' => $gambar,
                        'tglinput_galeri' => $this->input->post('tglinput_galeri',TRUE),
                    );

                    $this->Foto_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('admin/foto'));
                }
            }else{
                 $data = array(
                        'id_galeri' => $this->input->post('id_galeri',TRUE),
                        'ket_galeri' => $this->input->post('ket_galeri',TRUE),
                        'tglinput_galeri' => $this->input->post('tglinput_galeri',TRUE),
                    );

                    $this->Foto_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('admin/foto'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Foto_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('foto/update_action'),
                'id_galeri' => set_value('id_galeri', $row->id_galeri),
                'ket_galeri' => set_value('ket_galeri', $row->ket_galeri),
                'foto_galeri' => set_value('foto_galeri', $row->foto_galeri),
                'tglinput_galeri' => set_value('tglinput_galeri', $row->tglinput_galeri),
                "container" => "admin/foto/foto_form", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
                );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/foto'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_galeri', TRUE));
        } else {
            $config['upload_path'] = './user/galeri/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
     
            $this->upload->initialize($config);
            if(!empty($_FILES['foto_galeri']['name'])){
     
                if ($this->upload->do_upload('foto_galeri')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./user/galeri/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 600;
                    $config['height']= 400;
                    $config['new_image']= './user/galeri/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar=$gbr['file_name'];
                    $data = array(
                        'ket_galeri' => $this->input->post('ket_galeri',TRUE),
                        'foto_galeri' => $gambar,
                        'tglinput_galeri' => $this->input->post('tglinput_galeri',TRUE),
                    );
            
                    $this->Foto_model->update($this->input->post('id_galeri',TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('admin/foto'));
                    
                }
                          
            }else{
                 $data = array(
                        'ket_galeri' => $this->input->post('ket_galeri',TRUE),
                        'foto_galeri' => $this->_uploadImage(),
                        'tglinput_galeri' => $this->input->post('tglinput_galeri',TRUE),
                );

                   $this->Foto_model->update($this->input->post('id_galeri', TRUE), $data);
                   $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('admin/foto'));
            }

            
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Foto_model->get_by_id($id);

        if ($row) {
            $this->Foto_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/foto'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/foto'));
        }
    }
    private function _uploadImage(){
         
        $liatdata=$this->db->query("SELECT * FROM foto");
        $idsementara=$liatdata->num_rows()+1;
        $id_foto="$idsementara";
        $id_foto=substr($id_foto,-8);
                
        $config['upload_path']          = './user/galeri/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $id_foto;
        $config['overwrite']		    = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_galeri')) {
                return $this->upload->data("file_name");
        }
                return "default.jpg";
        }

    public function _rules() 
    {
	$this->form_validation->set_rules('ket_galeri', 'ket galeri', 'trim|required');
	// $this->form_validation->set_rules('foto_galeri', 'foto galeri', 'trim|required');
	$this->form_validation->set_rules('tglinput_galeri', 'tglinput galeri', 'trim|required');

	$this->form_validation->set_rules('id_galeri', 'id_galeri', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Foto.php */
/* Location: ./application/controllers/Foto.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-24 15:36:56 */
/* http://harviacode.com */