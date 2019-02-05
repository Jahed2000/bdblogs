<?php include APPPATH.'views/admin/header.php'; ?>

<?php echo form_open("articles/update_article/$article->id",['class'=>'form-add-article col-lg-8 offset-lg-2','style'=>'margin-bottom:12%;']); 
//print_r($article);
?>
  <fieldset>
    <legend>Edit article</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Article title</label>
      <?= form_input(['name'=>'title','class'=>'form-control','placeholder'=>'title','id'=>'exampleInputEmail1','value'=>set_value('title',$article->title) ] ) ; ?>
                            <!--set_value('value_from_form_input','default_value') -->
      <small id="emailHelp" class="form-text text-muted">enter a clear and short title for your article within 6 to 20 letters</small>
      <div class="text-danger"><?= form_error('title');?></div>
    </div>
    
    <div class="form-group">
      <label for="exampleTextarea">Article body</label>
      <?= form_textarea(['class'=>'form-control','id'=>'exampleTextarea','name'=>'body','rows'=>'3','placeholder'=>'article body','value'=>set_value('body',$article->body) ] ) ; ?>
      <small id="emailHelp" class="form-text text-muted">post your article within 20 to 260 letters.</small>
      <div class="text-danger"><?= form_error('body');?></div>
    </div>
    <?php echo form_reset(['id'=>'reset_btn_article','class'=>'btn btn-default','type'=>'reset','name'=>'reset','value'=>'reset']);  
    echo form_submit(['class'=>'btn btn-primary','type'=>'submit','name'=>'submit','value'=>'edit']); ?>
   
  </fieldset>

<?= form_close(); ?>


<?php include APPPATH.'views/admin/footer.php'; ?>