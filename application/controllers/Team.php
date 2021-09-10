<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team extends CI_Controller
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('Team_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'team/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'team/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'team/index.html';
            $config['first_url'] = base_url() . 'team/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Team_model->total_rows($q);
        $team = $this->Team_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'team_data' => $team,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/team/team_list", 
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
        $row = $this->Team_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_tema' => $row->id_team,
                'nama' => $row->nama,
                'alamat' => $row->alamat,
                'umur' => $row->umur,
                'status' => $row->status,
                'foto' => $row->foto,
                "container" => "admin/team/team_read", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/team'));
        }
    }

    public function create() 
    {
        $data = array( 
            'button' => 'Create',
            'action' => site_url('team/create_action'),
            'id_team' => set_value('id_team'),
            'nama' => set_value('nama'),
            'alamat' => set_value('alamat'),
            'umur' => set_value('umur'),
            'status' => set_value('status'),
            'foto' => set_value('foto'),
            "container" => "admin/team/team_form", 
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
            if(!empty($_FILES['foto']['name'])){
     
                if ($this->upload->do_upload('foto')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./user/galeri/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 2048;
                    $config['height']= 1024;
                    $config['new_image']= './user/galeri/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar=$gbr['file_name'];
                    $data = array(
                        'nama' => $this->input->post('nama',TRUE),
                        'alamat' => $this->input->post('alamat',TRUE),
                        'umur' => $this->input->post('umur',TRUE),
                        'status' => $this->input->post('status',TRUE),
                        'foto' => $gambar,
                        
                    );

                    $this->Team_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('admin/team'));
                }
            }else{
                 $data = array(
                        
                        'nama' => $this->input->post('nama',TRUE),
                        'alamat' => $this->input->post('alamat',TRUE),
                        'umur' => $this->input->post('umur',TRUE),
                        'status' => $this->input->post('status',TRUE)
                        
                    );

                    $this->Team_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('admin/foto'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Team_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Team/update_action'),
                'id_team' => set_value('id_team', $row->id_team),
                'nama' => set_value('nama', $row->nama),
                'alamat' => set_value('alamat', $row->alamat),
                'umur' => set_value('umur', $row->umur),
                'status' => set_value('umur', $row->status),
                'foto' => set_value('foto', $row->foto),
                "container" => "admin/team/team_form", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
                );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/team'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_team', TRUE));
        } else {
            $config['upload_path'] = './user/galeri/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
     
            $this->upload->initialize($config);
            if(!empty($_FILES['foto']['name'])){
     
                if ($this->upload->do_upload('foto')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./user/galeri/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 2048;
                    $config['height']= 1028;
                    $config['new_image']= './user/galeri/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar=$gbr['file_name'];
                    $data = array(
                        'nama' => $this->input->post('nama',TRUE),
                        'alamat' => $this->input->post('alamat',TRUE),
                        'umur' => $this->input->post('umur',TRUE),
                        'status' => $this->input->post('status',TRUE),
                        'foto' => $gambar
                    );
                    $this->Team_model->update($this->input->post('id_team',TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('admin/team'));      
                }
                          
            }else{
                $data = array(
                        'nama' => $this->input->post('nama',TRUE),
                        'alamat' => $this->input->post('alamat',TRUE),
                        'umur' => $this->input->post('umur',TRUE),
                        'status' => $this->input->post('status',TRUE)
                    );
                   $this->Team_model->update($this->input->post('id_team', TRUE), $data);
                   $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('admin/team'));
            }

            
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Team_model->get_by_id($id);

        if ($row) {
            $this->Team_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/team'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/team'));
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
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('umur', 'umur', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Foto.php */
/* Location: ./application/controllers/Foto.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-24 15:36:56 */
/* http://harviacode.com */