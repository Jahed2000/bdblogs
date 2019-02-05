<?php include APPPATH.'views/header.php'; ?>


<div class="container">
	
	<div class="row">
		<div class="col-lg-6">
			<h4 class="h">Home</h4><br>		
		</div>
		<?php if($this->session->userdata('id')){ ?> 
		<div class="col-lg-6">
			<a class="btn btn-primary float-right" href="<?= base_url('user/post_article'); ?>">post article</a>		
		</div>
		<?php } ?>
	</div>
<?php foreach($article as $post): ?>
	<div class="row main-container">
		<div class="front-img col-lg-4">
			<a class="main-link" href="<?= base_url("user/view_article/$post->id"); ?>">
				<img class="img" src="<?= $post->image; ?>">
			</a>
		</div>
		<div class="col-lg-8">
			<a class="main-link" href="<?= base_url("user/view_article/$post->id"); ?>">
				<h4 style="font-size: 22px;"><?php echo $post->title; ?></h4>
			</a>
			
			<small class="post-date">posted by <?= $post->uname ?> on <?= date('d-M-y H:i:s',strtotime($post->created_at)); ?></small>
			<p style="font-size: 16px;"><?= character_limiter($post->body,'340') ?></p> 
		<?= anchor("user/view_article/$post->id",'read more'); ?>
		</div>
	</div>
<?php endforeach; ?>

	<?= $this->pagination->create_links(); ?>
	
</div>

<?php include APPPATH.'views/footer.php'; ?>