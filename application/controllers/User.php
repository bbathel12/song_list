<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('user_m','user');
	}

	public function login(){
		if($this->input->post('login')){
			$password = password_hash($this->input->post('password'));
			$username = trim($this->input->post('username'));
			if($id = $this->user->check_login($username,$password)){
				$this->session->set_userdata('id',$id);
				$this->redirect('/index.php');
			}
		}
		else{
			$this->load->view('header');
			$this->load->view('partials/login');
			$this->load->view('footer');

		}
	}

	public function create(){

	}

}