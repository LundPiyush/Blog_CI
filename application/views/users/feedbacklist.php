<?php
include('header.php');
?>
<div class="container" style="margin-top:20px;">
    <h1><?php echo $title; ?></h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="header">Sr.No</th>
                    <th class="header">Name</th>
                    <th class="header">Email</th>
                    <th class="header">Feedback</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $count=0;
                foreach($feedbackInfo as $feedback){
                $count=$count+1;
                ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $feedback->name; ?></td>
                <td><?php echo $feedback->email; ?></td>
                <td><?php echo $feedback->feedback1; ?></td>
            </tr>
<?php } ?>
            </tbody>
        </table>

<div style="text-align:center">
    <form method="post" action="<?php echo base_url()?>export/createXLS">
        <input type="submit" name="export" value="Export" class="btn btn-success" />
        
    </form>
</div>


</div>
</div>
<?php
include('footer.php');
?>
