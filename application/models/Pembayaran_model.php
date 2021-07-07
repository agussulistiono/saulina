<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{

    public $table = 'pembayaran';
    public $id = 'id_sewa';
    public $order = 'DESC';
    public $id_pem = 'id_pem';

    function __construct()
    {
        parent::__construct();
    }
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    // insert
    function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }
    public function upload(){
        if(!empty($_FILES['foto'])){
            
            $config['upload_path'] = './bukti/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
            $config['max_size'] = 2048;
            $config['remove_space'] = TRUE; 
            
            $this->load->library('upload', $config);
           if ( $this->upload->do_upload('foto'))
                {
                    echo "berhasil prosess";
                }else{
                    echo "gagal upload";
                }

        }else{
            echo "gambar kosong";
        }
    }
    
    

}
