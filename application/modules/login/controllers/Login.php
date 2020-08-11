<?php
class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('m_login'));
  }
  public function index() {
    $this->load->view('index');
  }
  public function proses() {
   $username = $this->input->post('username');
   $password = passwordEncrypt($this->input->post('password'));

   $get = $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
   $hasil = $get->row();
   $where = array(
    'username' => $username,
    'password' => $password
  );
   $cek = $this->m_login->cek_login("user",$where)->num_rows();
   if($hasil->status != 'aktif')
   {
    redirect(base_url("login"));
  }else{
   if($cek > 0){
    $data_session = array(
      'username' => $hasil,
      'status' => "login",
    );
    $this->session->set_userdata($data_session);
    redirect(base_url("admin/dasboard"));
  }else{
    redirect(
      base_url("login")

    );
  }
}
}

public function logout() {
  $this->session->sess_destroy();
  redirect(base_url('login'));
}
}
?>