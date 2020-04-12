<?php
include('header.php');
?>
<div class="container" style="margin-top:20px">
    <h1>Add Articles</h1>
    <?php  echo form_open_multipart('admin/userValidation'); 
//form_open() will create a form tag in html with action='as mentioned inside the funtion'
    //multi part is used for file uploading
?>

    <?php echo form_hidden('user_id',$this->session->userdata('id')); 
    //form tag mein user_id(first parameter) will be name field and value will be user ka id 
    ?>
    <?php echo form_hidden('created_at',date('Y-m-d H:i:s'));
    ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="Title">Article Title</label>

                <?php
    // this is code igniter way of creating the input tag of html    
    echo form_input(['class'=>'form-control','placeholder'=>'Enter Article Title','name'=>'article_title','value'=>set_value('article_title')]); 
        //name feild and table ka column same hona chyie
                ?>

            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
            <?php echo form_error('article_title'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="body">Article Body</label>

                <?php echo form_textarea(['class'=>'form-control','placeholder'=>'Article Body','name'=>'article_body','value'=>set_value('article_body')]);
                //name feild and table ka column same hona chyie
    ?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
            <?php echo form_error('article_body'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="image">Select Image</label>
                <input type="file" name="userfile">
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
           <?php if(isset($upload_error)) {echo $upload_error;} ?>
            
        </div>
    </div>
    
    <?php echo form_submit(['class'=>'btn btn-danger','type'=>'submit','value'=>'Submit']); 
    ?>
    <?php echo form_reset(['class'=>'btn btn-primary','type'=>'reset','value'=>'Reset']); 
    ?>



</div>
<?php
include('footer.php');
?>
