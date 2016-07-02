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

	function like($song_id,$user_id){
		$this->db->where('song_id',$song_id)
		->where('user_id',$user_id)
		->get('likes');
		if($this->db->affected_rows()>0){

		}else{
			$data = array('song_id'=>$song_id,'user_id'=>$user_id,'value'=>'l');
			$this->db->insert('likes',$data);
		}

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




}
