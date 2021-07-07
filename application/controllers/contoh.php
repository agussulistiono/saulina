<?php
public function InsertBerita(){
    // Direktori File "folder-CI->berita"
    $config['upload_path'] = './berita/';
    // Format Image
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['encrypt_name'] = TRUE;
    // Load Libary Uploud
    $this->load->library('upload', $config);
    if ($this->upload->do_upload()) {
        $cekUser = $this->db->get_where('berita', array('judul_berita' => $this->input->post('judul_berita')));
        unlink("berita/".$cekUser->first_row()->cover_berita);
        $data['upload_data'] = $this->upload->data();
        $this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
        $file_gambar = $data['upload_data']['file_name'];
        $insert = $this->db->insert('berita', array(
            'cover_berita' => $file_gambar,
            'ringkasan_berita' => $this->input->post('ringkasan_berita'),
            'judul_berita' => $this->input->post('judul_berita'),
            'isi_berita' => $this->input->post('isi_berita'),
            'tanggal_berita' => date('Y-m-d H:i:s'),
            'id_admin' => '1',
            ));
        sleep(2);
        redirect(base_url('databerita?insertsuccess'));

    }else{
        redirect(base_url('insertberita?failed'));
    }
}

// image manipulasi merisize
public function resize($path,$file){
    $config['image_library']='GD2';
    $config['source_image'] = $path;
    $config['maintain_ratio'] = TRUE;
    $config['create_thumb'] = FALSE;
    // size image
    $config['width'] = 1158;
    $config['height'] = 550;
    // kualitas diturunkan 20%
    $config['quality'] = 20;
    $config["image_sizes"]["square"] = array(1158, 550);
    $this->load->library('image_lib', $config);
    $this->image_lib->fit();
}
?>