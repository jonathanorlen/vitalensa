<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

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

	// public function __construct()
	// {
	// 	parent::__construct();		
	// }

	public function index()
	{	
		$data['menu'] = 'index';
		$data['konten'] = $this->load->view('index', NULL, TRUE);
		$this->load->view('general/main',$data);
	}


//--------------   home   ------------------------


	public function kategori()
	{	
		$data['menu'] = 'kategori';
		$data['konten'] = $this->load->view('kategori', NULL, TRUE);
		$this->load->view('general/main',$data);
		
	}

	public function read()
	{	
		$data['menu'] = 'read';
		$data['konten'] = $this->load->view('read', NULL, TRUE);
		$this->load->view('general/main',$data);
		
	}

	public function renungan()
	{	
		
		$jumlah = $this->db->get('renungan');
		$hasil_data = $jumlah->result();
		$jumlah_data = count($hasil_data);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'web/renungan/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 7;
		$from = $this->uri->segment(3);

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';



		$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';


		$config['next_link'] = '<i class="fa fa-long-arrow-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		$this->db->order_by('tanggal','desc');
		$data['beritane'] = $this->db->get('renungan',$config['per_page'],$from)->result();

		$data['menu'] = 'renungan';
		$data['konten'] = $this->load->view('renungan', $data, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function berita()
	{	
		$data['menu'] = 'berita';
		$jumlah = $this->db->get('berita');
		$hasil_data = $jumlah->result();
		$jumlah_data = count($hasil_data);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'web/berita/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(3);

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';



		$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';


		$config['next_link'] = '<i class="fa fa-long-arrow-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		$this->db->order_by('tanggal','desc');
		$data['beritane'] = $this->db->get('berita',$config['per_page'],$from)->result();

		$data['konten'] = $this->load->view('berita', $data, TRUE);
		$this->load->view('menu',$data);
	}

	public function tambah_view_berita()
	{	
		$kode= $this->input->post("id");
		$get_art = $this->db->get_where("berita",array('id'=>$kode));
		$hasil_get_art = $get_art->row();
		$data['view'] = $hasil_get_art->view + 1;
		$this->db->update("berita", $data,array('id'=>$kode));
		header('location:'.base_url().'web/detail_berita');
	}

	public function detail_berita()
	{	
		
		$kode= $this->uri->segment(3);
		$get_art = $this->db->get_where("berita",array('id'=>$kode));
		$hasil_get_art = $get_art->row();
		$data['view'] = $hasil_get_art->view + 1;
		$this->db->update("berita", $data,array('id'=>$kode));

		$data['menu'] = 'berita';
		$data['konten'] = $this->load->view('detail_berita', NULL, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function tambah_view_renungan()
	{
		
		
	}

	public function detail_renungan()
	{	
		
		$kode= $this->uri->segment(3);
		$get_art = $this->db->get_where("renungan",array('id'=>$kode));
		$hasil_get_art = $get_art->row();

		$data['view'] = $hasil_get_art->view + 1;
		$this->db->update("renungan", $data,array('id'=>$kode));

		$data['menu'] = 'renungan';
		$data['konten'] = $this->load->view('detail_renungan', NULL, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function pemuda()
	{
		$data['konten'] = $this->load->view('pemuda', NULL, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function contact()
	{	
		$data['menu'] = 'contact';
		$data['konten'] = $this->load->view('contact', NULL, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function form_contact()
	{
		$data['nama'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['text'] = $this->input->post('pesan');
		$data['status'] = 'close';
		$data['tanggal'] = date('Y-m-d');

		$this->db->insert('saran',$data);

		// $email = $data['email'];
  //       $pesan = "Kode Verifikasi Anda ".$hasil_client->kode_verifikasi;
  //       $config = Array(
  //           'protocol' => 'smtp',
  //           'smtp_host' => 'ssl://smtp.googlemail.com',
  //           'smtp_port' => 465,
  //           'smtp_user' => 'cloudastro.id@gmail.com', 
  //           'smtp_pass' => 'caus1408@*#', 
  //           'mailtype' => 'html',
  //           'charset' => 'iso-8859-1',
  //           'wordwrap' => TRUE
  //           ;

  //       $this->load->library('email', $config);
  //       $this->email->set_newline("\r\n";
  //       $this->email->from('cloudastro.id@gmail.com');
  //       $this->email->to($email);
  //       $this->email->subject('Kode Verifikasi');
  //       $this->email->message($pesan);
  //       $this->email->send();



		$from_add =  'sukunkppm@gmail.com';

			$to_add = $data['email']; //Email Perusahaan cloudastro.id@gmail.com

			$subject = 'Terimakasih Saran Dan Kritik';
			$message = 'Terimaksih '.$data['nama'].' atas kritik dan saran anda kami sangat menghargai kami sangant mengapresiasi';
			$message2 = '';
			
			$headers = "From: $from_add \r\n";
			$headers .= "Reply-To: $from_add \r\n";
			$headers .= "Return-Path: $from_add\r\n";
			$headers .= "X-Mailer: PHP \r\n";

			if(@mail($to_add,$subject,$message,$data['text'],$headers)) 
			{
				$msg = "Email Terkiirm";
			} 
			else 
			{
				$msg = "Pengiriman Error !";
			}

			header('location:'.base_url().'web/contact');
		}

		public function simpan_ubah()
		{
			$kode = $this->input->post("id_konfirmasi");
			$data['status'] = $this->input->post("status");

			$this->db->update("konfirmasi", $data, array('id' => $kode));

			$ambilkode = $this->db->get_where('konfirmasi', array('id'  => $kode));
			$hasil_ambilkode = $ambilkode->row();



			if ($hasil_ambilkode->status == 'Approved' ) {
				$data1['kode_register'] = $hasil_ambilkode->kode_transfer;


				$insert = $this->db->insert("pendaftaran", $data1);


				$from_add =  'cloudastro.id@gmail.com';

			$to_add = $hasil_ambilkode->email; //Email Perusahaan cloudastro.id@gmail.com

			$subject = 'Link Pendaftaran WCA';
			$message = 'http://192.168.100.17/WCA/web/pendaftaran?reg='.$hasil_ambilkode->kode_tansfer;

			$headers = "From: $from_add \r\n";
			$headers .= "Reply-To: $from_add \r\n";
			$headers .= "Return-Path: $from_add\r\n";
			$headers .= "X-Mailer: PHP \r\n";

			if(@mail($to_add,$subject,$message,$headers)) 
			{
				$msg = "Email Terkiirm";
			} 
			else 
			{
				$msg = "Pengiriman Error !";
			}

		}

		echo '<div class="alert alert-success">Sudah dirubah.</div>';
		header('location:'.base_url().'admin/konfirmasi');




	}

	public function agenda()
	{	
		$data['menu'] = 'agenda';
		$tanggal = date("Y-m-d");

		$jumlah = $this->db->get_where('agenda',array('tanggal >=' => $tanggal));
		$hasil_data = $jumlah->result();
		$jumlah_data = count($hasil_data);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'web/agenda/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 8;
		$from = $this->uri->segment(3);

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';



		$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';


		$config['next_link'] = '<i class="fa fa-long-arrow-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		
		$this->db->order_by('tanggal','asc');
		$data['beritane'] = $this->db->get_where('agenda',array('tanggal >=' => $tanggal),$config['per_page'],$from)->result();


		$data['konten'] = $this->load->view('persekutuan',$data, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function kuis()
	{	
		$data['menu'] = 'kuis';
		$jumlah = $this->db->get('kuis');
		$hasil_data = $jumlah->result();
		$jumlah_data = count($hasil_data);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'web/kuis/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 8;
		$from = $this->uri->segment(3);

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';



		$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';


		$config['next_link'] = '<i class="fa fa-long-arrow-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		$this->db->order_by('tanggal','desc');
		$data['beritane'] = $this->db->get('kuis',$config['per_page'],$from)->result();

		$data['konten'] = $this->load->view('kuis', $data, TRUE);
		$this->load->view('menu',$data);
		
	}
	
	/*public function detail_kuis()
	{	
		$kode= $this->uri->segment(3);
		$get_art = $this->db->get_where("kuis",array('id'=>$kode));
		$hasil_get_art = $get_art->row();

		$tambah['view'] = $hasil_get_art->view + 1;
		$this->db->update("kuis", $tambah,array('id'=>$kode));

		$data['menu'] = 'kuis';
		$data['konten'] = $this->load->view('detail_kuis',NULL, TRUE);
		$this->load->view('menu',$data);
		
	}*/

	public function tambah_data_form()
	{	
		$data= $this->input->post();

		$cari_user = $this->db->get_where('user_quiz',array('email' => $data['email']));
		$hasil_user = $cari_user->row();
		$jumlah_user = count($cari_user->result());

		if(!empty($data['id']) && !empty($data['password']) && !empty($data['email']))
		{

			if($jumlah_user >= 1){

				if($hasil_user->password == $data['password']){


					$cari_pengguna = $this->db->get_where('quiz_user',array('id_quis' => $data['id'],'email' => $data['email']));
					$hasil_pengguna = $cari_pengguna->row();
					if(count($hasil_pengguna) > 0)
					{
						echo '1';
					}else{
						$input['id_quis'] =  $data['id'];
						$input['kode_user'] =  'KUQ_'.date('ymd').'_'.date('his');
						$input['nama'] = $hasil_user->nama;
						$input['email'] = $data['email'];
						$input['login'] = '1';
						$this->db->insert('quiz_user',$input);

						echo $input['kode_user'];
					}


				}else{
					echo '4';
				}

			}else{
				echo '5';
			}

		}else{
			echo '2';
		}
		
	}

	public function tambah_user_quiz()
	{	
		$data= $this->input->post();

		if(!empty($data['email']) && !empty($data['nama']) &&  !empty($data['password'])){

			$cari_email = $this->db->get_where('user_quiz',array('email' => $data['email']));
			$hasil_cari_email = $cari_email->result();

			if(count($hasil_cari_email) >= 1)
			{


				echo '2';
			}else{

				$input['nama'] = $this->input->post('nama');
				$input['email'] = $this->input->post('email');
				$input['password'] = $this->input->post('password');

				$this->db->insert('user_quiz',$input);

				echo '1';
			}

		}else{
			echo '3';
		}
		
	}

	public function detail_kuis()
	{	
		$email= $this->uri->segment(4);
		$kode= $this->uri->segment(3);
		if(!empty($email)){
			$cari_user = $this->db->get_where('quiz_user',array('kode_user' => $email,'login' => '1','id_quis' => $kode));
			$hasil_cari = $cari_user->result();
			// if(count($hasil_cari) <= 1 && count($hasil_cari) > 0){
			if(count($hasil_cari) <= 1 ){
				$detail['login'] = '0';
				$this->db->update('quiz_user', $detail,array('kode_user' => $email));

				$get_art = $this->db->get_where("kuis",array('id'=>$kode));
				$hasil_get_art = $get_art->row();

				// $tambah['view'] = $hasil_get_art->view + 1;
				// $this->db->update("kuis", $tambah,array('id'=>$kode));

				$data['menu'] = 'kuis';
				$this->load->view('detail_kuis');
			}else{
				redirect('web/kuis');
			}
		}else{
			redirect('web/kuis');
		}
		
	}

	public function simpan_nilai() {
		$data = $this->input->post();
		$hasil = explode('|',$data['reaksi']);

		$update['reaksi'] = $hasil[0];
		$update['benar'] = $hasil[1];
		$update['estimasi'] = $hasil[2];

		$cari_user = $this->db->get_where('quiz_user',array('kode_user' => $data['kode_user']));
		$hasil_cari_user = $cari_user->row();

		$cari_email = $this->db->get_where('user_quiz',array('email' => $hasil_cari_user->email));
		$hasil_email = $cari_email->row();

		$user['jumlah_benar'] = $hasil_email->jumlah_benar + $update['benar'];
		$user['jumlah_soal'] = $hasil_email->jumlah_soal + 1;

		$this->db->update('user_quiz', $user, array('email' => $hasil_cari_user->email));
		
		$update['tanggal'] = date('d-m-Y');
		$update['jam'] = date('h:i:s');

		$this->db->update("quiz_user",$update,array('kode_user' => $data['kode_user']));    
	}

	public function detail_kuis_result()
	{	
		$id = $this->uri->segment(4);

		$view = $this->db->get_where("kuis",array('id'=>$id));
		$hasil_view = $view->row();

		$tambah['view'] = $hasil_view->view + 1;
		$this->db->update("kuis", $tambah,array('id'=>$id));

		$data['menu'] = 'kuis';
		$data['konten'] = $this->load->view('detail_kuis_total',NULL, TRUE);
		$this->load->view('menu',$data);
	}

	public function detail_kuis_tambah()
	{	
		$data['menu'] = 'kuis';
		$data['konten'] = $this->load->view('detail_kuis',NULL, TRUE);
		$this->load->view('menu',$data);
	}

	public function tambah_view_kuis()
	{
		
		
	}

	public function acara()
	{
		$data['konten'] = $this->load->view('acara', NULL, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function nominasi()
	{
		$data['konten'] = $this->load->view('nominasi', NULL, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function ulang_tahun()
	{	
		$data['menu'] = 'ulang_tahun';
		$tanggal = date('Y-m-d');
		$this->db->where('tanggal >=',$tanggal);
		$jumlah = $this->db->get('ultah');
		$hasil_data = $jumlah->result();
		$jumlah_data = count($hasil_data);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'web/ulang_tahun/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 8;
		$from = $this->uri->segment(3);

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';



		$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';


		$config['next_link'] = '<i class="fa fa-long-arrow-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		$this->db->where('tanggal >=',$tanggal);
		$this->db->order_by('tanggal','asc');
		$data['beritane'] = $this->db->get('ultah',$config['per_page'],$from)->result();

		$data['konten'] = $this->load->view('ulang_tahun', $data, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function galery()
	{	
		$data['menu'] = 'galery';
		$data['konten'] = $this->load->view('galery', NULL, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function struktur()
	{	
		$data['menu'] = 'struktur';
		$data['konten'] = $this->load->view('struktur', NULL, TRUE);
		$this->load->view('menu',$data);
		
	}

	public function komentar()
	{	
		$data['kategori'] = 'kuis';
		$data['id_artikel'] = $this->input->post("artikel");
		$data['nama'] = $this->input->post("nama");
		$data['email'] = $this->input->post("email");
		$data['komentar'] = $this->input->post("komentar");
		$data['tanggal'] = date("Y-m-d");
		$data['waktu'] = date("h:i:s");
		$data['status'] = 'close';

		$this->db->insert('komentar',$data);

		header('location:'.base_url().'web/detail_kuis/'.$data['id_artikel']);
		
	}

	public function komen_berita()
	{	
		$data['kategori'] = 'berita';
		$data['id_artikel'] = $this->input->post("artikel");
		$data['nama'] = $this->input->post("nama");
		$data['email'] = $this->input->post("email");
		$data['komentar'] = $this->input->post("komentar");
		$data['tanggal'] = date("Y-m-d");
		$data['waktu'] = date("h:i:s");
		$data['status'] = 'close';

		$this->db->insert('komentar',$data);

		header('location:'.base_url().'web/detail_berita/'.$data['id_artikel']);
		
	}

	public function komen_renungan()
	{	
		$data['kategori'] = 'renungan';
		$data['id_artikel'] = $this->input->post("artikel");
		$data['nama'] = $this->input->post("nama");
		$data['email'] = $this->input->post("email");
		$data['komentar'] = $this->input->post("komentar");
		$data['tanggal'] = date("Y-m-d");
		$data['waktu'] = date("h:i:s");
		$data['status'] = 'close';

		$this->db->insert('komentar',$data);

		header('location:'.base_url().'web/detail_renungan/'.$data['id_artikel']);
		
	}

	public function komen_quiz()
	{	
		$data['kategori'] = 'quiz';
		$data['id_artikel'] = $this->input->post("artikel");
		$data['nama'] = $this->input->post("nama");
		$data['email'] = $this->input->post("email");
		$data['komentar'] = $this->input->post("komentar");
		$data['tanggal'] = date("Y-m-d");
		$data['waktu'] = date("h:i:s");
		$data['status'] = 'close';

		$this->db->insert('komentar',$data);

		// header('location:'.base_url().'web/detail_renungan/'.$data['id_artikel']);
		
	}

	public function models()
	{
		$data['key'] = $this->input->post("key");
		$this->load->view ('models');
	}

	public function modal_event()
	{
		$data['key'] = $this->input->post("key");
		$this->load->view ('modal_even');
	}

	public function form_quiz()
	{
		$this->load->view ('modal_kuis_form');
	}

	public function cari_berita()
	{
		$this->load->view('modal_cari_berita');
	}

	public function cari_renungan()
	{
		$this->load->view('modal_cari_renungan');
	}

	public function get_komentar_renungan()
	{

		$start = (10*$this->input->post('page'));
		$id = $this->input->post('id');

		$this->db->limit(10,$start);
		$this->db->order_by('tanggal','desc');
		$this->db->order_by('waktu','desc');
		$hasil=$this->db->get_where('komentar',array('id_artikel' => $id,'kategori' => 'quiz'));
		$hasil_ambil = $hasil->result();
		$nomor = $start+1;
		foreach ($hasil_ambil as $item) {
			$nama = $item->nama;
			?>

			<?php if($nama == 'admin'){?>

			<div class="post-grids" style="padding-bottom:0px;padding-left:5px;margin-bottom:-9px;margin-top:5px">
				<div class="col-md-12 post-right">
					<h4 style="padding:0px;font-size:20px;font-weight:bolder;text-align:right;"><?php echo $item->nama?></h4>
					<p class="comments" style="color:#d7d7d7;font-size:13px;margin: 1em 0;font-style: italic;text-align:right;"><?php echo $item->waktu?>&nbsp<i class="glyphicon glyphicon-time"></i>&nbsp&nbsp&nbsp<?php echo rubah_tanggal($item->tanggal)?></p>
					<p class="text" style=";margin-top:-5px;text-align:right"><?php echo $item->komentar?></p>
				</div>
				<div class="clearfix"> </div>
			</div>

			<?php }else{?>

			<div class="post-grids" style="padding-bottom:0px;padding-right:15px">
				<div class="col-md-12 post-left">
					<h4 style="padding:0px;font-size:20px;font-weight:bolder;"><?php echo $item->nama?></h4>
					<p class="comments" style="color:#d7d7d7;font-size:13px;margin: 1em 0;font-style: italic;"><?php echo rubah_tanggal($item->tanggal)?>&nbsp&nbsp&nbsp<i class="glyphicon glyphicon-time"></i>&nbsp<?php echo $item->waktu?></p>
					<p class="text" style=";margin-top:-5px;"><?php echo $item->komentar?></p>
				</div>
				<div class="clearfix"> </div>
			</div>

			<?php }?>

			<?php

		}
	}


}

/*<div class="sign_main">
                        	<h4 class="side">Sign  Up  </h4>
                        	<div class="sign_up">
                        		<p class="sign">Sign up to Admin</p>
                        		<form action="<?php echo base_url().'login/proses'?>" method="post">
                        			<input type="text" class="text" name="username">
                        			<input type="password" class="text" name="password" >
                        			<input type="submit" value="submit">
                        		</form>
                        		<!-- <p class="spam">We do not spam. We value your privacy!</p> -->
                        	</div>
                        </div>*/