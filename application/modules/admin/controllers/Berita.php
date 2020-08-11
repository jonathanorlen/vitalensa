<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class berita extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	/*public function __construct()
	{
		parent::__construct();		
		if ($this->session->userdata('astrosession') == FALSE) {
			redirect(base_url('authenticate'));			
		}
	}*/

	public function __construct()
	{
		parent::__construct();		
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));			
		}
	}
	
	public function index()
	{	
		$data['menu'] = 'berita';
		$data['konten'] = $this->load->view('berita/daftar', NULL, TRUE);
		$this->load->view ('main', $data);
	}

	public function daftar()
	{	
		$data['menu'] = 'berita';
		$data['konten'] = $this->load->view('berita/daftar', NULL, TRUE);
		$this->load->view ('main', $data);
	}
	
	public function detail()
	{	
		$data['menu'] = 'berita';
		$data['konten'] = $this->load->view('berita/detail', NULL, TRUE);
		$this->load->view ('main', $data);
	}

	public function ubah()
	{	
		$data['menu'] = 'berita';
		$data['konten'] = $this->load->view('berita/ubah', NULL, TRUE);
		$this->load->view ('main', $data);
	}

	public function tambah()
	{	
		$data['menu'] = 'berita';
		$data['konten'] = $this->load->view('berita/tambah', NULL, TRUE);
		$this->load->view ('main', $data);
	}

	public function hapus() {      
		$id = $this->input->post('id');

		$this->db->delete('berita', array('id' => $id));

		$this->db->delete('komentar', array('id_artikel' => $id,'kategori' => 'berita'));
		
		echo '<div class="alert alert-success"> sudah dihapus.</div>';    
	}

	public function simpan_tambah() {

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul', 'Judul berita', 'required');
		$this->form_validation->set_rules('display', 'Display Berita', 'required');
		$this->form_validation->set_rules('isi', 'Content Berita', 'required');

		if ($this->form_validation->run() == FALSE)
		{
		
			echo '0'; 
		
		}else{
		
		$data['id_creator'] = $this->session->userdata('username')->id;
		$data['judul'] = $this->input->post("judul");
		$data['display'] = $this->input->post("display");
		$data['isi'] = $this->input->post("isi");

		$data['foto'] =$this->input->post('foto');
		$filename = date('dmYhis');

        if(!empty($_FILES['foto']['tmp_name'])){
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                './foto/'.'foto_'.$filename.'.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION)
                );
            $data['foto'] = 'foto_'.$filename.'.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            
        }

        if(!empty($_FILES['banner']['tmp_name'])){
            move_uploaded_file(
                $_FILES['banner']['tmp_name'],
                './foto/'.'banner_'.$filename.'.'.pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION)
                );
            $data['banner'] = 'banner_'.$filename.'.'.pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
            
        }

		$data['time'] = date("H:i");
		$data['tanggal'] = date('Y-m-d');

		$this->db->insert("berita",$data);
		echo '1';
		/*echo '<div class="alert alert-success">Sudah Di simpan.</div>';*/
		/*header('location:'.base_url().'admin/berita/daftar'); */      
		}    
	}

	public function simpan_ubah() {

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul', 'Judul berita', 'required');
		$this->form_validation->set_rules('display', 'Display Berita', 'required');
		$this->form_validation->set_rules('isi', 'Content Berita', 'required');

		if ($this->form_validation->run() == FALSE)
		{
		
			echo '0'; 
		
		}else{
		
		$id = $this->input->post("id");
		
		$data['judul'] = $this->input->post("judul");
		$data['display'] = $this->input->post("display");
		$data['isi'] = $this->input->post("isi");

		$data['foto'] =$this->input->post('foto');
		$filename = date('dmYhis');

        if(!empty($_FILES['foto']['tmp_name'])){
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                './foto/'.'foto_'.$filename.'.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION)
                );
            $data['foto'] = 'foto_'.$filename.'.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            
        }

        if(!empty($_FILES['banner']['tmp_name'])){
            move_uploaded_file(
                $_FILES['banner']['tmp_name'],
                './foto/'.'banner_'.$filename.'.'.pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION)
                );
            $data['banner'] = 'banner_'.$filename.'.'.pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
            
        }

		$this->db->update("berita",$data,'id ='.$id);
		echo '1';
		/*header('location:'.base_url().'admin/berita/daftar');    */       
		}
	}

	

	
}
