<?php
$this->load->view('admin/header'); 
?>
<h1>News</h1>
<table class="table table-bordered">
	<tr>
		<th>Title</th>
		<th>Author</th>
		<th>Action</th>
	</tr>
	<?php
	//var_dump($news);
	foreach($news as $n)
	{
		?>
		<tr>
			<td><?php echo $n->title;?></td>
			<td><?php echo $n->author;?></td>
			<td><a href="" class="btn btn-primary">Edit</a> <a href="" class="btn btn-danger">Delete</a></td>
		</tr>
		<?php
	}
	?>
</table>
<?php
$this->load->view('admin/footer'); 
?>