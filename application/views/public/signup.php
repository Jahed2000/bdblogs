<?php include APPPATH.'views/header.php'; ?>

<div class="row">
	<div class="col-lg-8 offset-lg-2">

<?= form_open('user/verify_signup',['class'=>'login-form']); ?>

  <fieldset>
    <legend>Signup</legend>

    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">First Name</label>
      <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="first name">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Last Name</label>
      <input type="text" name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="last name">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleSelect1">Gender</label>
      <select class="form-control" name="gender" id="exampleSelect1">
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleSelect1">country</label>
      <select class="form-control" name="country" id="exampleSelect1">
        <option>afghanistan</option>
        <option>belgium</option>
        <option>bangladesh</option>
        <option>china</option>
        <option>pakistan</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="password">
      <small id="emailHelp" class="form-text text-muted">Password must be atleast six letters</small>
    </div>
    <?= form_submit(['class'=>'btn btn-primary','type'=>'submit','name'=>'submit','value'=>'signup']); ?>

    <div class="text-danger" style="margin-top: 10px;"><?php echo validation_errors(); ?></div>
  </fieldset>

<?= form_close(); ?>

<br>
	</div>
</div>
<?php include APPPATH.'views/footer.php'; ?>