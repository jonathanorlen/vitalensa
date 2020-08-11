<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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


	public function __construct()
	{
		parent::__construct();		
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));			
		}
	}
	
	public function index()
	{
		redirect(base_url('admin/dasboard'));
		
	}	

	public function dasboard()
	{	
		$data['menu'] = 'dashboard';
		$data['konten'] = $this->load->view('dasboard', NULL, TRUE);
		$this->load->view ('main', $data);		
	}

	public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function home_edit(){
    	$id1 = 1;
    	$data['id_content'] = $this->input->post("id1");
    	$this->db->update("home",$data,'id ='.$id1);

    	$id2 = 2;
    	echo $this->db->last_query();
    	$data2['id_content'] = $this->input->post("id2");
    	$this->db->update("home",$data2,'id ='.$id2);
    	echo $this->db->last_query();
    }

    public function simpan_galery(){
    	$filename = date('dmYhis');
    	if(!empty($_FILES['foto']['tmp_name'])){
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                './foto/'.'galery'.$filename.'.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION)
            );
            $data['foto'] = 'galery'.$filename.'.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            
        }
        $data['judul'] = $this->input->post("judul");
        $data['id_creator'] = $this->session->userdata('username')->id;
        $this->db->insert("galery",$data);
        echo '1';
    }

    public function ubah_profile(){
    	$filename = date('dmYhis');

        if(!empty($_FILES['foto']['tmp_name'])){
            $cari =$this->db->query("SELECT * FROM user WHERE id='$id' ")->row();
            @unlink('foto/'.$cari->foto);
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                './foto/'.'profile'.$filename.'.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION)
            );
            $data['foto'] = 'profile'.$filename.'.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        }
        $data['name'] = $this->input->post("name");
        $data['username'] = $this->input->post("username");


        $this->db->update("user",$data,"id=".$this->session->userdata('username')->id);
        echo '1';
    }

    public function ubah_password(){
      $password1 = passwordEncrypt($this->input->post("password"));
      $data['password'] = $password1;
      $this->db->update("user",$data,"id=".$this->session->userdata('username')->id);
      echo '1';   
  }

  public function hapus_galery(){
   $id = $this->input->post('id');
   $this->db->delete('galery', array('id' => $id));
   echo '<div class="alert alert-success"> sudah dihapus.</div>';    
}

public function modal_image(){
   $this->load->view('galery/modal');
}

public function modal_share(){
   $this->load->view('modal_share');
}
}
