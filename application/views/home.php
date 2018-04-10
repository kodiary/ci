	<?php
	$this->load->view('header');
	?>
	
		<?php
		foreach($news as $n)
		{
			?>
			<div class="row">
				<div class="col-md-3">
					<img class="img-fluid" src="<?php echo site_url('uploads/'.$n->image);?>">
				</div>
				<div class="col-md-9">
					<h1><?php echo $n->title;?></h1>
					<p><?php echo substr($n->description,0,200).'...';?>
						<i>(Author: <?php echo $n->author;?>)</i></p>
					
				</div>
			</div>
			<?php
		}
		?>
	
	<?php echo $this->pagination->create_links();?>
	<?php
	$this->load->view('footer');
	?>