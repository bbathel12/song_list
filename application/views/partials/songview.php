
<div class="col-xs-12 ">
	<div class="row">
		<?php foreach($songs as $song){ ?>
		
			<div id = "song_<?= $song->id ?>" class="col-xs-12 col-md-6 well">
				<h3>Title: <?php echo $song->title; ?></h3>
				<h4>Artist: <?php echo $song->artist;?></h4>
				<h4><a href="<?php echo $song->youtube_link;?>">Youtube</a></h4>
				<div class="row ">
					<div class='col-xs-12 col-md-4'>
						<button class="btn btn-block btn-success like" data-songid="<?= $song->id ?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i> LIKE 
							<span class='likes'><?= $votes[$song->id]['likes'] ?></span>
						</button>

					</div>
					<div class='col-xs-12 col-md-4'>
						<button class="btn btn-block btn-primary ok" data-songid="<?= $song->id ?>">
							<i class="fa fa-hand-lizard-o" aria-hidden="true"></i> No Strong Feelings
							<span class='nf'><?= $votes[$song->id]['no_feelings'] ?></span>
						</button>
					</div>
					<div class='col-xs-12 col-md-4'>
						<button class="btn btn-block btn-danger dislike" data-songid="<?= $song->id ?>">
							<i class="fa fa-thumbs-down" aria-hidden="true"></i> Dislike
							<span class='dislikes'><?= $votes[$song->id]['dislikes'] ?></span>
						</button>
					</div>
				</div>		
			</div>
		
	<?php } ?>
	</div>
</div>

