$(document).ready(
	function(){
		$('.like').click(
			function(){
				var song_id = $(this).data('songid');
				var user_id = $('#user_id').data('id');
				var url     = '/songlist/songlist/vote/1/'+song_id+'/'+user_id
				$.getJSON( url, 
					function(data){location.reload()},
					function(data){console.log(data)}
					);
				console.log('click');
			}
		)
		$('.ok').click(
			function(){
				var song_id = $(this).data('songid');
				var user_id = $('#user_id').data('id');
				var url     = '/songlist/songlist/vote/2/'+song_id+'/'+user_id
				$.getJSON( url, 
					function(data){location.reload()},
					function(data){console.log(data)}
					);
				console.log('click');
			}
		)
		$('.dislike').click(
			function(){
				var song_id = $(this).data('songid');
				var user_id = $('#user_id').data('id');
				var url     = '/songlist/songlist/vote/3/'+song_id+'/'+user_id
				$.getJSON( url, 
					function(data){location.reload()},
					function(data){console.log(data)}
					);
				console.log('click');
			}
		)
	}
)

