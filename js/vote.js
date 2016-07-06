$(document).ready(
	function(){
		$('.like').click(
			function(){
				var song_id = $(this).data('songid');
				var user_id = $('#user_id').data('id');
				var url     = '/songlist/songlist/vote/1/'+song_id+'/'+user_id;
				$.getJSON( url, 
					function(data){update_votes(data);console.log(data);},
					function(data){console.log(data);}
					);
				console.log('click');
				console.log(url);
			}
		);
		$('.ok').click(
			function(){
				var song_id = $(this).data('songid');
				var user_id = $('#user_id').data('id');
				var url     = '/songlist/songlist/vote/2/'+song_id+'/'+user_id;
				$.getJSON( url, 
					function(data){update_votes(data);console.log(data);},
					function(data){update_votes(data);console.log(data);}
					);
				console.log('click');
				console.log(url);
			}
		);
		$('.dislike').click(
			function(){
				var song_id = $(this).data('songid');
				var user_id = $('#user_id').data('id');
				var url     = '/songlist/songlist/vote/3/'+song_id+'/'+user_id;
				$.getJSON( url, 
					function(data){update_votes(data);console.log(data);},
					function(data){update_votes(data);console.log(data);}
					);
				console.log('click');
				console.log(url);
			}
		);
	}
)

update_votes = function(data){
	for(prop in data){
		if('likes' in data[prop]){
			$('#song_'+prop+' .likes').html(data[prop].likes);
		}
		if('nf' in data[prop]){
			$('#song_'+prop+' .nf').html(data[prop].nf);
		}
		if('dislikes' in data[prop]){
			$('#song_'+prop+' .dislikes').html(data[prop].dislikes);
		}
	}
}