<?php
include('header.php');
?>
<div class="container" style="margin-top:20px">
    <h1>Admin Form</h1>
    <?php if($error=$this->session->flashdata('Login_failure')):
    ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        </div>
    </div>
    
    <?php endif; ?>
    <?php  echo form_open('admin/index'); 
//form_open() will create a form tag in html with action='as mentioned inside the funtion'
?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="Username">Username:</label>

                <?php
    // this is code igniter way of creating the input tag of html    
    echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'uname','value'=>set_value('uname')]); ?>

            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
            <?php echo form_error('uname'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="pwd">Password:</label>

                <?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Password','name'=>'pass','value'=>set_value('pass')]);
    ?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
            <?php echo form_error('pass'); ?>
        </div>
    </div>
    <?php echo form_submit(['class'=>'btn btn-danger','type'=>'submit','value'=>'Submit']); 
    ?>
    <?php echo form_reset(['class'=>'btn btn-primary','type'=>'reset','value'=>'Reset']); 
    ?>
    <?php echo anchor('admin/register','Sign up?','class="link-class"') ?>


</div>
<?php
include('footer.php');
?>
