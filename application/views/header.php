<!DOCTYPE html>
<html>
<head>
	<title>articles home</title>
	<!--<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">-->
	<!--<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">-->
	<?= link_tag('assets/css/style.css'); ?>
	<?= link_tag('assets/css/bootstrap.min.css'); ?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?= base_url(); ?>">BD Blogs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/profile'); ?>">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <?php if($this->session->userdata('id')) { ?>
          <a class="nav-link" href="<?= base_url('user/logout'); ?>">Logout</a>
        <?php } else{ ?>
          <a class="nav-link" href="<?php echo base_url('user/login'); ?>">Login</a>
        <?php } ?>
        
      </li>
    </ul>
    <?= form_error('search',"<p class='navbar-text'>",'</p>'); ?>

    <?= form_open('user/search_article',['class'=>'form-inline my-2 my-lg-0']) ?>
<!--    <form class="form-inline my-2 my-lg-0"> -->
      <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit">Search</button>
    <?= form_close(); ?>

  </div>
</nav>
<div class="container">