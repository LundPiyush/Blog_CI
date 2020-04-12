<?php 
include ('header.php');
?>


<div class="container" style="margin-top:20px">
    <h1>Register Form</h1>
    <?php  if($user=$this->session->flashdata('user')): 

$user_class=$this->session->flashdata('user_class')

 ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="alert <?= $user_class ?>">
                <?= $user; ?>
            </div>
        </div>
    </div>

    <?php endif; ?>


    <?php  echo form_open('admin/sendemail'); 
//form_open() will create a form tag in html with action='as mentioned inside the funtion'
?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="Username">Username:</label>

                <?php
    // this is code igniter way of creating the input tag of html    
    echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'username','value'=>set_value('username')]); ?>

            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
            <?php echo form_error('username'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="password">Password:</label>

                <?php
    // this is code igniter way of creating the input tag of html    
    echo form_password(['class'=>'form-control','placeholder'=>'Enter Password','name'=>'password','value'=>set_value('password')]); ?>

            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
            <?php echo form_error('password'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="first name">First Name</label>

                <?php
    // this is code igniter way of creating the input tag of html    
    echo form_input(['class'=>'form-control','placeholder'=>'Enter First Name','name'=>'firstname','value'=>set_value('firstname')]); ?>

            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
            <?php echo form_error('firstname'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="last name">Last Name</label>

                <?php
    // this is code igniter way of creating the input tag of html    
    echo form_input(['class'=>'form-control','placeholder'=>'Enter Last Name','name'=>'lastname','value'=>set_value('lastname')]); ?>

            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
            <?php echo form_error('lastname'); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="Email">Email:</label>

                <?php
    // this is code igniter way of creating the input tag of html    
    echo form_input(['class'=>'form-control','placeholder'=>'Enter Email','name'=>'email','value'=>set_value('email')]); ?>

            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
            <?php echo form_error('email'); ?>
        </div>
    </div>
    <?php echo form_submit(['class'=>'btn btn-danger','type'=>'submit','value'=>'Submit']); 
    ?>
    <?php echo form_reset(['class'=>'btn btn-primary','type'=>'reset','value'=>'Reset']); 
    ?>

    <?php include('footer.php');
?>
