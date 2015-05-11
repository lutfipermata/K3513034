<?php
class Buku extends CI_Controller{
    private $limit=20;
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template','form_validation','pagination','upload'));
        $this->load->model('m_buku');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index($offset=0,$order_column='kode_buku',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='kode_buku';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['buku']=$this->m_buku->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Buku";
        
        $data['pagination']=$this->pagination->create_links();
        
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
            $this->template->display('buku/index',$data);
    }
	
	
	
	function detail($id){
        $data['title']="Detail";
        
        
            $kode=$this->input->post('kode_buku');
            
            
                
                $gambar=$this->upload->file_name;
            
            
            $info=array(
					
					'judul_buku'=>$this->input->post('judul_buku'),
                    'pengarang'=>$this->input->post('pengarang'),
                    'tahun_terbit'=>$this->input->post('tahun_terbit'),
					'kategori'=>$this->input->post('kategori'),
					'keterangan_stok'=>$this->input->post('keterangan_stok'),
					'deskripsi'=>$this->input->post('deskripsi'),
                    'gambar'=>$gambar
            );
			$data['buku']=$this->m_buku->cek($id)->row_array();
            $this->template->display('buku/detail',$data);
        
    }
	
    
    
    function tambah(){
        $data['title']="Tambah Buku";
        $this->_set_rules();
        if($this->form_validation->run()==true){//jika validasi dijalankan dan benar
            $kode=$this->input->post('kode_buku'); // mendapatkan input dari kode
            $cek=$this->m_buku->cek($kode); // cek kode di database
            if($cek->num_rows()>0){ // jika kode sudah ada, maka tampilkan pesan
                $data['message']="<div class='alert alert-danger'>Kode Buku sudah ada</div>";
                $this->template->display('buku/tambah',$data);
            }else{ // jika kode buku belum ada, maka simpan
                
                //setting konfiguras upload image
                $config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '2000';
		$config['max_height']  = '1024';
                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="";
                }else{
                    $gambar=$this->upload->file_name;
                }
                
                $info=array(
                    'kode_buku'=>$this->input->post('kode_buku'),
                    'judul_buku'=>$this->input->post('judul_buku'),
                    'pengarang'=>$this->input->post('pengarang'),
                    'tahun_terbit'=>$this->input->post('tahun_terbit'),
					'kategori'=>$this->input->post('kategori'),
					'keterangan_stok'=>$this->input->post('keterangan_stok'),
					'deskripsi'=>$this->input->post('deskripsi'),
                    'gambar'=>$gambar
                );
                $this->m_buku->simpan($info);
                redirect('buku/index/add_success');

            }
        }else{
            $data['message']="";
            $this->template->display('buku/tambah',$data);
        }
    }
    
    function edit($id){
        $data['title']="Edit data Buku";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $kode=$this->input->post('kode_buku');
            
            //setting konfiguras upload image
            $config['upload_path'] = './assets/img/';
	    $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '1000';
	    $config['max_width']  = '2000';
	    $config['max_height']  = '1024';
                
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar')){
                $gambar="";
            }else{
                $gambar=$this->upload->file_name;
            }
            
            $info=array(
					
					'judul_buku'=>$this->input->post('judul_buku'),
                    'pengarang'=>$this->input->post('pengarang'),
                    'tahun_terbit'=>$this->input->post('tahun_terbit'),
					'kategori'=>$this->input->post('kategori'),
					'keterangan_stok'=>$this->input->post('keterangan_stok'),
					'deskripsi'=>$this->input->post('deskripsi'),
                    'gambar'=>$gambar
            );
            $this->m_buku->update($kode,$info);
            
            $data['buku']=$this->m_buku->cek($id)->row_array();
            $data['message']="<div class='alert alert-success'>Data berhasil diupdate</div>";
            $this->template->display('buku/edit',$data);
        }else{
            $data['message']="";
            $data['buku']=$this->m_buku->cek($id)->row_array();
            $this->template->display('buku/edit',$data);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode_buku');
        $detail=$this->m_buku->cek($kode)->result();
	foreach($detail as $det):
	    unlink("assets/img/".$det->gambar);
	endforeach;
        $this->m_buku->hapus($kode);
    }
    
    function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->m_buku->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['buku']=$cek->result();
            $this->template->display('buku/cari',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['buku']=$cek->result();
            $this->template->display('buku/cari',$data);
        }
    }
	
	
    
	
	
    function _set_rules(){
        $this->form_validation->set_rules('kode_buku','Kode Buku','required|max_length[5]');
        $this->form_validation->set_rules('judul_buku','Judul Buku','required|max_length[100]');
        $this->form_validation->set_rules('pengarang','Pengarang','required|max_length[50]');
		$this->form_validation->set_rules('tahun_terbit','Tahun Terbit','required|max_length[5]');
		$this->form_validation->set_rules('kategori','Kategori','required|max_length[100]');
		$this->form_validation->set_rules('keterangan_stok','Keterangan Stok','required|max_length[100]');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required|max_length[1000]');
        
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}