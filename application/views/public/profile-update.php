<?php include APPPATH.'views/header.php'; ?>

<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<div class="update-profile-img">
			<legend>update image</legend>
			<div class="text-center">
				<img class="profile-img" src="<?=$user->image;?>" alt="image">
			</div>
			<div>
				<?=form_open_multipart('user/update_info'), 
					form_hidden('user_id',$this->session->userdata('id'));
				?>
			      <label for="exampleInputFile">update image</label><br>

			      <input class="form-control-file" type="file" name="image"><br>
			    	<?php if (isset($data_error)) {
      				echo $data_error;
      				} ?>
			      <button class="btn btn-primary">upload</button>
			    <?=form_close();?>
			</div>
		</div>

		<div class="update-profile">
			<?= form_open('user/update_info',['class'=>'update-form']),
			form_hidden('user_id',$this->session->userdata('id')); ?>

			  <fieldset>
			    <legend>update information</legend>

			    <div class="form-group">
			      <label for="exampleInputEmail1">Username</label>
			      <input type="text" name="uname" value="<?= $user->uname; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username">
			    </div>
			    <div class="form-group">
			      <label for="exampleInputEmail1">First Name</label>
			      <input type="text" name="fname" value="<?= $user->fname; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="first name">
			    </div>
			    <div class="form-group">
			      <label for="exampleInputEmail1">Last Name</label>
			      <input type="text" name="lname" value="<?= $user->lname; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="last name">
			    </div>
			    <div class="form-group">
			      <label for="exampleInputEmail1">Email</label>
			      <input type="email" name="email" value="<?= $user->email; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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
			        <option>bangladesh</option>
			        <option>belgium</option>
			        <option>india</option>
			        <option>china</option>
			        <option>pakistan</option>
			      </select>
			    </div>
			    <div class="form-group">
			      <label for="exampleInputEmail1">Bio</label>
			      <input type="text" name="bio" value="<?= $user->bio; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="bio">
			    </div>
			    <button type="submit" class="btn btn-primary">update profile</button>
			    

			    <div class="text-danger" style="margin-top: 10px;"><?php echo validation_errors(); ?></div>
			  </fieldset>

			<?= form_close(); ?>

		</div>
	</div>
</div>

<?php include APPPATH.'views/footer.php'; ?>