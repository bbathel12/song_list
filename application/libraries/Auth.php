<?php

class Auth {
	function logged_in($user_id=null){
		$this->db->where('id',$user_id);
		$query = $this->db->get('User');
		if($this->db->affected_rows()>0){
			return true;
		}
		else{return false;}
	}
}