<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('SliderModel');
        $this->load->model('SliderModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'slider/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'slider/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'slider/index.html';
            $config['first_url'] = base_url() . 'slider/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->SliderModel->total_rows($q);
        $foto = $this->SliderModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'foto_data' => $foto,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/slider/slider_list", 
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
        $row = $this->SliderModel->get_by_id($id);
        if ($row) {
            $data = array(
                'id_slider' => $row->id_slider,
                 'judul_slider' => $row->judul_slider,
                'deskripsi' => $row->deskripsi,
                'foto_slider' => $row->foto_slider,
                'tglinput_slider' => $row->tglinput_slider,
                "container" => "admin/slider/readdetail", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/slider'));
        }
    }
    public function readdetail($id) 
    {
        $row = $this->SliderModel->get_by_id($id);
        if ($row) {
            $data = array(
                'id_slider' => $row->id_slider,
                 'judul_slider' => $row->judul_slider,
                'deskripsi' => $row->deskripsi,
                'foto_slider' => $row->foto_slider,
                'tglinput_slider' => $row->tglinput_slider,
                "container" => "admin/slider/readdetail", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/slider'));
        }
    }

    public function create() 
    {
        $data = array( 
            'button' => 'Create',
            'action' => site_url('slider/create_action'),
            'id_slider' => set_value('id_slider'),
            'judul_slider' => set_value('judul_slider'),
            'deskripsi' => set_value('deskripsi'),
            'foto_slider' => set_value('foto_slider'),
            'tglinput_slider' => set_value('tglinput_slider'),
            'status' => set_value('status'),
            "container" => "admin/slider/slider_form", 
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
            $config['upload_path'] = './user/slider/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
     
            $this->upload->initialize($config);
            if(!empty($_FILES['foto_slider']['name'])){
     
                if ($this->upload->do_upload('foto_slider')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./user/slider/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 2048;
                    $config['height']= 1024;
                    $config['new_image']= './user/slider/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar=$gbr['file_name'];
                    $data = array(
                        'judul_slider' => $this->input->post('judul_slider',TRUE),
                        'deskripsi' => $this->input->post('deskripsi',TRUE),
                        'foto_slider' => $gambar,
                        'tglinput_slider' => $this->input->post('tglinput_slider',TRUE),
                        'status' => $this->input->post('status',TRUE)
                    );

                    $this->SliderModel->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('admin/slider'));
                    
                }
                 
                          
            }else{
                $data = array(
                        'judul_slider' => $this->input->post('judul_slider',TRUE),
                        'deskripsi' => $this->input->post('deskripsi',TRUE),
                        'tglinput_slider' => $this->input->post('tglinput_slider',TRUE),
                        'status' => $this->input->post('status',TRUE)
                    );

                    $this->SliderModel->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('admin/slider'));
            }
            
        }
    }
    
    public function update($id) 
    {
        $row = $this->SliderModel->get_by_id($id);

        if ($row) {

            $data = array(
                'button' => 'Update',
                'action' => site_url('slider/update_action'),
                'id_slider' => set_value('id_slider', $row->id_slider),
                'judul_slider' => set_value('judul_slider', $row->judul_slider),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'foto_slider' => set_value('foto_slider', $row->foto_slider),
                'tglinput_slider' => set_value('tglinput_slider', $row->tglinput_slider),
                'status' => set_value('status', $row->status),
                "container" => "admin/slider/slider_form", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
                );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/slider'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_slider', TRUE));
        } else {
                $config['upload_path'] = './user/slider/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
         
                $this->upload->initialize($config);
                if(!empty($_FILES['foto_slider']['name'])){
         
                    if ($this->upload->do_upload('foto_slider')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='./user/slider/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        $config['width']= 2048;
                        $config['height']= 1024;
                        $config['new_image']= './user/slider/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $gambar=$gbr['file_name'];
                        $data = array(
                            'judul_slider' => $this->input->post('judul_slider',TRUE),
                            'deskripsi' => $this->input->post('deskripsi',TRUE),
                            'foto_slider' => $gambar,
                            'tglinput_slider' => $this->input->post('tglinput_slider',TRUE),
                            'status' => $this->input->post('status',TRUE)
                        );
                    $this->SliderModel->update($this->input->post('id_slider', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('admin/slider'));
                        
                    }
                     
                              
                }else{
                    echo "Image yang diupload kosong";
                }
                $data = array(
                            'judul_slider' => $this->input->post('judul_slider',TRUE),
                            'deskripsi' => $this->input->post('deskripsi',TRUE),
                            'tglinput_slider' => $this->input->post('tglinput_slider',TRUE),
                            'status' => $this->input->post('status',TRUE)
                        );
                $this->SliderModel->update($this->input->post('id_slider', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('admin/slider'));
        }
        
    }
    
    public function delete($id) 
    {
        $row = $this->SliderModel->get_by_id($id);

        if ($row) {
            $this->SliderModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/slider'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/slider'));
        }
    }
    private function _uploadImage(){
         
        $liatdata=$this->db->query("SELECT * FROM slider");
        $idsementara=$liatdata->num_rows()+1;
        $id_slider="$idsementara";
        $id_slider=substr($id_slider,-8);
                
        $config['upload_path']          = './user/slider/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $id_slider;
        $config['overwrite']		    = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_slider')) {
                return $this->upload->data("file_name");
        }
                return "default.jpg";
        }

    public function _rules() 
    {
	$this->form_validation->set_rules('deskripsi', 'ket slider', 'trim|required');
	 //$this->form_validation->set_rules('foto_slider', 'foto slider', 'trim|required');
	$this->form_validation->set_rules('tglinput_slider', 'tglinput slider', 'trim|required');
    $this->form_validation->set_rules('judul_slider', 'id_slider', 'trim');
	$this->form_validation->set_rules('id_slider', 'id_slider', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
 
    public function detailslider($id){
        $data = $this->SliderModel->detailslider($id);
        $data = array(
                "slider" =>$data,
                "container" => "front/detailslider", 
                "footer" => "front/footer",
                "nav" => "front/nav"
            );
        $this->load->view('front/template', $data);

    }
}

/* End of file Foto.php */
/* Location: ./application/controllers/Foto.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-24 15:36:56 */
/* http://harviacode.com */