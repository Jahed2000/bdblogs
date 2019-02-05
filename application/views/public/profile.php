<?php include APPPATH.'views/header.php'; ?>
<div>
	<div>
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
		<div class="row">
			<div class="col-lg-5 col-xs-5 col-sm-5 text-center">
				<div>
					<?php if(is_null($user->image) ) { ?>
					<img class="profile-img" src="<?php echo base_url('uploads/profile-default.jpg'); ?>"> 
					<?php } else {?>
					<img class="profile-img" src="<?= $user->image; ?>" alt="image"> 
			<?php } ?>
				<!--<img class="profile-img" src="../uploads/bae.jpg" alt="image">
				<img class="profile-img" src="<?php echo base_url('uploads/pizza.jpg'); ?>">-->
				</div>
				<div>
					<legend><?php echo $user->uname; ?></legend>

					<strong><?= $user->email;?></strong><br>
					

				</div>
			</div>
			<div class="col-lg-7 col-xs-7 col-sm-7 text-center">
				<strong style="font-size: 16px"><?=$user->fname." ".$user->lname; ?></strong><br>
				<p><?=$user->gender.","." ".$user->country; ?></p>
				<legend style="margin-top: 40px;">bio</legend>
				<p><?=$user->bio; ?></p>
				<a  href="<?= base_url('user/update_profile'); ?>">update profile</a>
			</div>
			
		</div>
		<hr>
	</div>

	<h4 style="margin-bottom: 20px;">your articles</h4>
	<div class="row profile-article">

		<?php foreach ($article as $u) { ?>

		<div class="col-lg-5">
			
			<p><?php echo $u->title; ?></p>
				
		</div>
		<div class="col-lg-3 text-center">
			
			<p><?php echo $u->created_at; ?></p>
			
		</div>
		<div class="col-lg-4 text-center">
			
			<a href="<?=base_url("user/edit_article/$u->id"); ?>">[edit]</a>  <a href="<?=base_url("user/update_article/$u->id"); ?>">[delete]</a>
			
			
		</div>
		<hr>
		<?php }?>
	</div>
</div>

<?php include APPPATH.'views/footer.php'; ?>