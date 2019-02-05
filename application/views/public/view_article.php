<?php include APPPATH.'views/header.php'; ?>


<div class="container">
	
	
	<?php foreach ($article as $post): ?>
	<h4><?php echo $post->title; ?></h4>
	<small class="post-date">posted by <?= $post->uname ?> on <?= date('d-M-y H:i:s',strtotime($post->created_at)); ?></small>
	<div class="row">
		<div class="col-lg-10 offset-lg-1">
			<?php if (!is_null($post->image)) { ?>
			<img class="article-img" src="<?= $post->image ?>">
			<?php }  ?>	
		</div>
	</div>
	<p style="font-size: 16px;white-space: pre-line; "><?=$post->body ?></p> 
		
	<hr style="background-color:#f4f4f4"><br>
	<?php endforeach; ?>

</div>

<?php include APPPATH.'views/footer.php'; ?>