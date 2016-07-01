<?php

class Auth {
	
	public function __construct(){
		$this->CI =& get_instance();	
		$this->CI->load->database();
	}
	function logged_in($user_id=null){
		$this->CI->db->where('id',$user_id);
                $query = $this->CI->db->get('User');
                if($this->CI->db->affected_rows()>0){
                        return true;
                }
                else{return false;}	
	}
}
