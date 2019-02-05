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

<nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbar-admin">
  <a class="navbar-brand" href="<?= base_url('admin/index'); ?>">BD Blogs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/index'); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('articles/dashboard'); ?>">Articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">

<?php if ($this->session->userdata('admin_id')): ?>
        <a class="nav-link" href="<?= base_url('admin/logout'); ?>">logout</a>
<?php  else: ?>
        <a class="nav-link" href="<?= base_url('admin/login'); ?>">login</a>
<?php endif; ?>

      </li>
    </ul>
    
  </div>
</nav>

<div class="container">