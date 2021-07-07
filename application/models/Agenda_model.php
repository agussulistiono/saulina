<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agenda_model extends CI_Model 
{

    public $table = 'agenda';
    public $id = 'id_agenda';
    public $order = 'DESC';

    function __construct() 
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_agenda', $q);
	$this->db->or_like('judul_agenda', $q);
	$this->db->or_like('isi_agenda', $q);
	$this->db->or_like('tempat_agenda', $q);
	$this->db->or_like('tgl_agenda', $q);
	$this->db->or_like('waktu_agenda', $q);
	$this->db->or_like('foto_agenda', $q);
	$this->db->or_like('tglinput_agenda', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_agenda', $q);
	$this->db->or_like('judul_agenda', $q);
	$this->db->or_like('isi_agenda', $q);
	$this->db->or_like('tempat_agenda', $q);
	$this->db->or_like('tgl_agenda', $q);
	$this->db->or_like('waktu_agenda', $q);
	$this->db->or_like('foto_agenda', $q);
	$this->db->or_like('tglinput_agenda', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->_deleteImage($id);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    private function _deleteImage($id){
        $row = $this->get_by_id($id);
        if ($row->foto != "default.jpg") {
            $filename = explode(".", $row->foto)[0];
		return array_map('unlink', glob(FCPATH."hal_admin/galeri/$filename.*"));
    }
    }

}

/* End of file Agenda_model.php */
/* Location: ./application/models/Agenda_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-25 06:49:33 */
/* http://harviacode.com */