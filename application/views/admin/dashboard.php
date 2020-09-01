<html>

<?php
include('header.php');
?>
<div class="container" style="margin-top:50px;">
    <div class="row">
        <a href="addUser" class="btn btn-lg btn-primary">Add Articles</a>
    </div>


    <div class="container" style="margin-top:50px;">
        <?php if($msg=$this->session->flashdata('msg')):
    $msg_class=$this->session->flashdata('msg_class');
    
    ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="alert <?= $msg_class ?>">
                    <?php echo $msg; ?>
                </div>
            </div>
        </div>

        <?php endif; ?>

    </div>
<?php
// echo $this->db->last_query(); ......this will print sql query  
?>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Article Title</th>
                    <th>Article Body</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($articles)){ 
                $count=$this->uri->segment(3); 
                ?>
                <?php foreach($articles as $art){ ?>
                <tr>
                    <td><?php echo ++$count; ?></td>

                    <td>
                        <?php echo $art->article_title; ?>
                    </td>
                    <td>
                        <?php echo $art->article_body; ?>
                    </td>
                    <td>
                    <?=
                    form_open('admin/editarticle'),
                    form_hidden('id',$art->id),
            form_submit(['name'=>'submit','value'=>'edit','class'=>"btn btn-primary"]),
                    form_close();
                             
                                                 
                    ?>
                    </td>
                    <td>
                        <?=
                                    
                form_open('admin/delarticle'),
                form_hidden('id',$art->id),
                form_submit(['name'=>'submit','value'=>'delete','class'=>"btn btn-danger"]),
                form_close();
                                    
                                    
            ?>
                    </td>

                </tr>

                <?php }} ?>


            </tbody>
        </table>
        <?php  echo $this->pagination->create_links();  ?> 

    </div>
</div>

</html>


<?php
include('footer.php');
?>
