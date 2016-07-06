<?php
define('SONGS','songs');
class SongList_m extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function get_songs(){
		$this->db->order_by('artist');
		$query = $this->db->get('songs');
		
		$result = array();
		foreach ($query->result() as $row)
		{	
    			$result[] = $row;
		}		
		return $result;
	}

	function add_song($title,$artist,$youtube=null){
		$this->db->like('title',$title)
		->from('songs')
		->like('title',$title);
		$result = $this->db->get();
		if($result->num_rows() > 0){
			$this->session->set_flashdata('error',"Song Already in List");
			
		}
		else{
			$this->session->set_flashdata('success',"Song Added");
			$insert_stuff = array('title'=>$title,'artist'=>$artist,'youtube_link'=>$youtube);
			$this->db->insert('songs',$insert_stuff);
		}

	}

	function like($song_id,$user_id,$choice='1'){
		switch($choice){
			case 1:$choice_letter = 'l';break;
			case 2:$choice_letter = 'n';break;
			case 3:$choice_letter = 'd';break;
		}
		$result = $this->db->where('song_id',$song_id)
		->where('user_id',$user_id)
		->get('likes');
		header("HTTP/1.1 200 OK");
		if($this->db->affected_rows()>0){
			foreach($result->result() as $row){
				if($row->value == $choice_letter){
					//return true;
					break;	
				}else{
				 	$update = $this->db->set(array('value'=>$choice_letter))
					->where('id', $row->id)
					->update('likes');
					//return $update;
				}
			}
		}else{
			$data = array('song_id'=>$song_id,'user_id'=>$user_id,'value'=>$choice_letter);
			//return $this->db->insert('likes',$data);
		}
		//return $this->get_votes_json();

	}

	function no_feelings($song_id,$user_id){
		$this->db->where('song_id',$song_id)
		->where('user_id',$user_id)
		->get('likes');
		if($this->db->affected_rows()>0){

		}else{
			$data = array('song_id'=>$song_id,'user_id'=>$user_id,'value'=>'n');
			$this->db->insert('likes',$data);
		}

	}

	function dislike($song_id,$user_id){
		$this->db->where('song_id',$song_id)
		->where('user_id',$user_id)
		->get('likes');
		if($this->db->affected_rows()>0){

		}else{
			$data = array('song_id'=>$song_id,'user_id'=>$user_id,'value'=>'d');
			$this->db->insert('likes',$data);
		}

	}
	function get_votes($song_id){
		$this->db->where('value','l')
		->where('song_id',$song_id)
		->get('likes');
		$to_return['likes'] = $this->db->affected_rows();
		$this->db->where('value','n')
		->where('song_id',$song_id)
		->get('likes');
		$to_return['no_feelings'] = $this->db->affected_rows();
		$this->db->where('value','d')
		->where('song_id',$song_id)
		->get('likes');
		$to_return['dislikes'] = $this->db->affected_rows();
		return $to_return;
	}
	
	function get_votes_json(){
		header('content-type:json');
		$to_return  = [];
		$votes = $this->db->get('likes');
		foreach($votes->result() as $vote){
			$to_return[$vote->song_id]['likes'] = isset($to_return[$vote->song_id]['likes'])?$to_return[$vote->song_id]['likes']:0;
			$to_return[$vote->song_id]['nf'] = isset($to_return[$vote->song_id]['nf'])?$to_return[$vote->song_id]['nf']:0;
			$to_return[$vote->song_id]['dislikes'] = isset($to_return[$vote->song_id]['dislikes'])?$to_return[$vote->song_id]['dislikes']:0;
			switch($vote->value){
				case 'l':$to_return[$vote->song_id]['likes']+=1;break;
				case 'n':$to_return[$vote->song_id]['nf']+=1;break;
				case 'd':$to_return[$vote->song_id]['dislikes']+=1;break;
			}
			
		}
		return json_encode($to_return);
	}




}
