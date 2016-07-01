c<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('user_m','user');
		$this->load->helper('url');
	}

	public function login(){
		if(isset($_SESSION['user_id']) && $this->user->test($_SESSION['user_id'])){
			redirect('/songlist/view');
		}else{
			if($this->input->post('login')){
				$password = $this->input->post('password');
				$username = trim($this->input->post('username'));
				if($id = $this->user->check_login($username,$password)){
					$this->session->set_userdata('user_id',$id);
					$this->session->set_flashdata('success',"Logged In");
					redirect('/songlist/view');
				}
			}
			else{
				$this->load->view('header');
				$this->load->view('partials/login');
				$this->load->view('footer');

			}
		}
	}

	public function create($username,$password){
		if(isset($_SESSION['user_id']) && $this->user->test($_SESSION['user_id'])){
			$this->user->create($username,$password);
		}else{redirect('/user/login');}
	}

}
