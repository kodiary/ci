<?php
$this->load->view('admin/header'); 
?>
<h1>News</h1>
<a href="<?php echo site_url('admin/news/add')?>" class="btn btn-info">Add New News</a>
<hr>
<?php
if($this->session->flashdata('success'))
{
	?>

<div class="alert alert-success" role="alert">
  <?php
	echo $this->session->flashdata('success');
	?>
</div>
<?php
}?>

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