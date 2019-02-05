<?php include APPPATH.'views/header.php'; ?>


<div class="container">
	
	<h4 class="h">Home</h4><br>
	<?php foreach ($search_result as $post): ?>
	<h4><?php echo $post->title; ?></h4>
	<small class="post-date">posted on <?= $post->created_at; ?></small>
	<p><?= $post->body; ?></p> 
	<hr style="background-color:#f4f4f4"><br>
	<?php endforeach; ?>

</div>

<?php include APPPATH.'views/footer.php'; ?>