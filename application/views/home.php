
		<?php
		foreach($news as $n)
		{
			?>
			<a class="news-list" href="<?php echo site_url('home/detail/'.$n->id)?>">
				<div class="row">
					<div class="col-md-3">
						<img class="img-fluid" src="<?php echo site_url('uploads/'.$n->image);?>">
					</div>
					<div class="col-md-9">
						<h1><?php echo substr($n->title,0,35).'..';?></h1>
						<p><?php echo substr($n->description,0,200).'...';?>
							<i>(Author: <?php echo $n->author;?>)</i></p>
						
					</div>
				</div>
			</a>
			<?php
		}
		?>
	
	<?php echo $this->pagination->create_links();?>
