<?php include APPPATH.'views/admin/header.php'; ?>

<div class="row">
  <div class="col-lg-8 offset-lg-2">
    <?php echo form_open_multipart('articles/store_article',['class'=>'form-add-article','style'=>'margin-bottom:12%;']); 
    echo form_hidden('user_id',$this->session->userdata('admin_id'));
    //stays hidden and passes session data as user_id to controller
    ?>
  <fieldset>
    <legend>Add article</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Article title</label>
      <?= form_input(['name'=>'title','class'=>'form-control','placeholder'=>'title','id'=>'exampleInputEmail1','value'=>set_value('title')]); ?>
      <small id="emailHelp" class="form-text text-muted">enter a clear and short title for your article</small>
      <div class="text-danger"><?= form_error('title');?></div>
    </div>
    
    <div class="form-group">
      <label for="exampleTextarea">Article body</label>
      <?= form_textarea(['class'=>'form-control','id'=>'exampleTextarea','name'=>'body','rows'=>'3','placeholder'=>'article body','value'=>set_value('body')]); ?>
      <small id="emailHelp" class="form-text text-muted">post must be atleast 400 letters.</small>
      <div class="text-danger"><?= form_error('body');?></div>
    </div>

    <div class="form-group">
      <label for="exampleInputFile">image</label>
      <input type="file" name="photo" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">upload image here</small>
      <?php if (isset($upload_error)) {
        echo $upload_error;
      } ?>
    </div>
    <?php echo form_reset(['id'=>'reset_btn_article','class'=>'btn btn-default','type'=>'reset','name'=>'reset','value'=>'reset']);  
    echo form_submit(['class'=>'btn btn-primary','type'=>'submit','name'=>'submit','value'=>'post']); ?>
   
  </fieldset>

<?= form_close(); ?>

  </div>
</div>


<?php include APPPATH.'views/admin/footer.php'; ?>