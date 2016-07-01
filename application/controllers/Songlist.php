<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SongList extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('songlist_m');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		
	}


	public function index(){
		if(isset($_SESSION['user_id']) && $this->songlist_m->test($_SESSION['user_id'])){
			$data['songs'] = $this->songlist_m->get_songs();	
			$this->load->view('header');
			$this->load->view('partials/songview.php',$data);
			$this->load->view('footer');
		}
	}
	public function view(){
		if(isset($_SESSION['user_id']) && $this->songlist_m->test($_SESSION['user_id'])){
			$data['songs'] = $this->songlist_m->get_songs();	
			$this->load->view('header');
			$this->load->view('partials/songview.php',$data);
			$this->load->view('footer');
		}else{
			redirect('user/login');
		}
	}

	public function add_song(){
		if($this->input->post('add')){
			$title  = $this->input->post('title');
			$artist = $this->input->post('artist'); 
			$youtube= $this->input->post('youtube_link');
			$this->songlist_m->add_song($title,$artist,$youtube);
		}
			$this->load->view('header');
			$this->load->view('partials/form');
			$this->load->view('footer');
	}
	
}
