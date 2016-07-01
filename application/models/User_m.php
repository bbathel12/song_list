<?php
class User_m extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function check_login($username,$password){
		$query = $this->db->like('username',$username)
		->get('User');
		if($this->db->affected_rows()>0){
			foreach($query->result() as $row){
				if(password_verify($password,$row->password)){
					return $row->id;
				}
			}
		}else{
			return false;
		}
		return false;

	}

	public function test($user_id=null){
		$this->db->where('id',$user_id);
		$query = $this->db->get('User');
		if($this->db->affected_rows()>0){
			return true;
		}
		else{return false;}
	}

	public function create($username,$password){
		$password = password_hash($password,PASSWORD_DEFAULT);
		$data = array('username'=>trim($username),'password'=>$password);
		$this->db->insert('User',$data);

	}

}