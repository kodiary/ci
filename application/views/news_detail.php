	<?php
	$this->load->view('header');
	?>
	<h1><?php echo $model->title;?></h1>
	<img src="<?php echo site_url('uploads/'.$model->image);?>" class="img-fluid" >
	<p><?php echo $model->description;?></p>
	<p>Author: <i><?php echo $model->author;?></i></p>
		
	<?php
	$this->load->view('footer');
	?>