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
}
