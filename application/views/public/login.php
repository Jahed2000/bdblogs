<?php include APPPATH.'views/header.php'; ?>
<div class="row">
	<div class="col-lg-6 offset-lg-3">

		<?php if ($error = $this->session->flashdata('loginError')) { ?>
				<div class="alert alert-dismissible alert-danger text-center">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong><?= $error ?></strong> 
				</div>
		<?php } ?>

		<?= form_open('user/verify_login',['class'=>'login-form-user','style'=>'margin-bottom:170px;']); ?>
		<fieldset>
			<legend>login</legend>
		<div class="form-group">
	      <label for="exampleInputEmail1">Email</label>
	      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
	      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	    </div>

	    <div class="form-group">
	      <label for="exampleInputPassword1">Password</label>
	      <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="password">
	      <small id="emailHelp" class="form-text text-muted">Password must be atleast six letters</small>
	    </div>
	    <?= form_submit(['class'=>'btn btn-primary','type'=>'submit','name'=>'submit','value'=>'login']); ?>
	    <br><br>
	    <div class="text-danger"><?= validation_errors(); ?></div>
	    </fieldset>
	    <p>don't have an account? <a href="<?= base_url('user/signup'); ?>">sign up</a></p>
		<?= form_close(); ?>

	</div>
</div>
<?php include APPPATH.'views/footer.php'; ?>