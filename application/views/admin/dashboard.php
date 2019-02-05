<?php include_once('header.php'); ?>
<!--<?php include APPPATH.'views/footer.php'; ?>-->
	
	<div class="row">
		<div class="add-article offset-md-6 col-md-6 float-right">
			<!--url helper anchor('uri','value','array') -->
			<?= anchor('articles/add_article','Add Article',['class'=>'btn btn-primary float-right']); ?>
			<!-- OR <a class="btn btn-primary float-right" href="<?= base_url('articles/add_article') ?>">Add Article</a>-->
		</div>
	</div>

<?php if ($feedback = $this->session->flashdata('feedback')) :
$feedback_class=$this->session->flashdata('feedback_class'); ?>
	<div class="row text-center">
		<div class="col-lg-6 offset-lg-3">
	<div class="alert alert-dismissible <?=$feedback_class;?>">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?= $feedback ?></strong> 
</div>
</div>
</div>
<?php endif; ?>

<div class="container text-center col-lg-10 offset-lg-1">
<h3>Admin Dashboard</h3>
	<table class="table">
		<thead>
			<th>Sr. no</th>
			<th>title</th>
			<th>action</th>
		</thead>

<?php if (!empty($art)) : 
	$count = $this->uri->segment(3);
	foreach ($art as $article): ?>
	
		<tr>
			<td><?= ++$count ?></td>
			<td><?php echo $article->title; ?></td>
			<td style="width: 20%;">
				<div class="row">
					<div class="col-lg-6">
						<?= anchor("articles/edit_article/$article->id",'edit',['class'=>'btn btn-primary']); ?>
					</div>
					<div class="col-lg-6">
						<?=
					form_open('articles/delete_article'),
					form_hidden('article_id',$article->id),
					form_submit(['class'=>'btn btn-danger','name'=>'submit','value'=>'delete']),
					form_close();
				?>		
					</div>
				</div>
			</td>
		</tr>
<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="3">No records found.</td>
		</tr>
	<?php endif; ?>

	</table>
	<?php echo $this->pagination->create_links(); ?>
	
	<!--<?php print_r($art); ?>-->
</div>

<?php include APPPATH.'views/footer.php'; ?>