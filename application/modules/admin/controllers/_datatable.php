<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class _datatable extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{
		redirect('master');
	}

    public function daftar_berita()
    {   
        $this->datatables->select('id,title,date,status')
        ->add_column('actions', get_detail_edit_delete('$1'),'id')
        ->edit_column('status', '$1', 'cek_status(status)')
        ->from('view_berita');        
        
        echo $this->datatables->generate();
    }   
    
}
