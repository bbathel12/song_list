
<div class="col-xs-12 ">
	<div class="row">
		<?php foreach($songs as $song){ ?>
		
			<div class="col-xs-12 col-md-6">
				<h3>Title:<?php echo $song->title; ?></h3>
				<h4>Artist:<?php echo $song->artist;?></h4>
				<h4><a href="<?php echo $song->youtube_link;?>">Youtube</a></h4>		
			</div>
		
	<?php } ?>
	</div>
</div>

