<?php
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('logins'));
    }
    public function index() {
        $this->load->view('index');
    }
    public function proses() {
        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');

            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = mysql_real_escape_string($usr);
            $p = md5(mysql_real_escape_string($psw));
            $cek = $this->logins->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //lOGIN BERHASIL, BUAT SESSIONS
                foreach ($cek->result() as $qad) {
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['role'] = $qad->role;
                    $this->session->set_userdata($sess_data);
                }
                redirect('web/dasboard');
            }else{
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }        
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>