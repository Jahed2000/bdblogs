<?php include APPPATH.'views/admin/header.php'; ?>

<div class="row">
  <div class="col-lg-6 offset-lg-3">
<?php if ($error = $this->session->flashdata('login_failed')) : ?>
	<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?= $error ?></strong> 
</div>
<?php endif; ?>


<?php echo form_open('admin/verify_login',['class'=>'login-form','style'=>'margin-bottom:40%;']); ?>
  <fieldset>
    <legend>Login</legend>

    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      
      <?php echo form_input(['id'=>'exampleInputEmail1','class'=>'form-control','name'=>'username','type'=>'text','placeholder'=>'Username','value'=>set_value('username')]); ?>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <?php echo form_password(['id'=>'exampleInputPassword1','class'=>'form-control','name'=>'password','type'=>'password','placeholder'=>'password']); ?>
    </div>
    <?php echo form_reset(['id'=>'reset_btn_admin','class'=>'btn btn-default','name'=>'submit','value'=>'cancel']); 
        echo form_submit(['class'=>'btn btn-primary','name'=>'submit','value'=>'login']); ?>
    <div class="text-danger"><p><?php echo validation_errors(); ?></p></div>

  </fieldset>
<?php echo form_close(); ?>

</div>
</div>


<?php include APPPATH.'views/admin/footer.php'; ?>