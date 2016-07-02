<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SongList extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('songlist_m');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('auth');		
	}


	public function index(){
		if(isset($_SESSION['user_id']) && $this->auth->logged_in($_SESSION['user_id'])){
			$data['songs'] = $this->songlist_m->get_songs();
			foreach($data['songs'] as $song){
				$data['votes'][$song->id] = $this->songlist_m->get_votes($song->id);
			}		
			$this->load->view('header');
			$this->load->view('partials/songview.php',$data);
			$this->load->view('footer');
		}else{redirect('/user/login');}
	}


	public function view(){
		if(isset($_SESSION['user_id']) && $this->auth->logged_in($_SESSION['user_id'])){
			$data['songs'] = $this->songlist_m->get_songs();
			foreach($data['songs'] as $song){
				$data['votes'][$song->id] = $this->songlist_m->get_votes($song->id);
			}	
			$this->load->view('header');
			$this->load->view('partials/songview.php',$data);
			$this->load->view('footer');
		}else{
			redirect('user/login');
		}
	}

	public function add_song(){
		if(isset($_SESSION['user_id']) && $this->auth->logged_in($_SESSION['user_id'])){
		if($this->input->post('add')){
			$title  = $this->input->post('title');
			$artist = $this->input->post('artist'); 
			$youtube= $this->input->post('youtube_link');
			$this->songlist_m->add_song($title,$artist,$youtube);
		}
			$this->load->view('header');
			$this->load->view('partials/form');
			$this->load->view('footer');
		}else{redirect('/user/login');}
	}

	public function vote($choice,$song_id,$user_id){
		header('Content-Type: application/json');
		switch($choice){
			case 1: $this->songlist_m->like($song_id,$user_id);echo json_encode(true);break;
			case 2: $this->songlist_m->no_feelings($song_id,$user_id);echo json_encode(true);break;
			case 3: $this->songlist_m->dislike($song_id,$user_id);echo json_encode(true);break;
			default: $this->session->set_flashdata('error','Invalid Vote');echo json_encode(false);break;
		}
	}
	
	
}
