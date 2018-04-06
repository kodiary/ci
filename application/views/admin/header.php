<!DOCTYPE html>
<html>
<head>
	<title>Admin - Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('bootstrap/dist/css/bootstrap.css')?>">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url('bootstrap/dist/js/bootstrap.js')?>"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Admin</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo site_url('admin/dashboard')?>">Dashboard <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo site_url('admin/news');?>">News</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Profile
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Settings</a>
	          <a class="dropdown-item" href="<?php echo site_url('admin/dashboard/logout')?>">Logout</a>
	          
	        </div>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0" method="get" action="<?php echo site_url('admin/news/index')?>">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="<?php if($this->input->get('keyword'))echo $this->input->get('keyword');?>">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>
	<div class="container">