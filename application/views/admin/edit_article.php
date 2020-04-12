<?php
include('header.php');
?>
<div class="container" style="margin-top:20px">
    <h1>Edit Article</h1>
    <?php  echo form_open("admin/updatearticle/{$article->id}"); 
//form_open() will create a form tag in html with action='as mentioned inside the funtion'
?>
    

    
                <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="Title">Article Title</label>

                <?php
    // this is code igniter way of creating the input tag of html    
    echo form_input(['class'=>'form-control','placeholder'=>'Enter Article Title','name'=>'article_title','value'=>set_value('article_title',$article->article_title)]); 
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

                <?php echo form_textarea(['class'=>'form-control','placeholder'=>'Article Body','name'=>'article_body','value'=>set_value('article_body',$article->article_body)]);
                //name feild and table ka column same hona chyie
    ?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
            <?php echo form_error('article_body'); ?>
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
