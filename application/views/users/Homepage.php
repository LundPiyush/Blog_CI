<?php
include('header.php');
?>
<!--
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
-->


<html>

<head></head>

<body>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <form class="form-inline">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="myInput" onkeyup="myFunction()">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top:20px;">
        <div class="row">
            <h1>All Articles</h1>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <td>Sr No.</td>
                        <td>Article Image</td>
                        <td>Article Title</td>
                        <td>Published On</td>

                    </tr>
                </thead>
                <tbody>
                    <?php if(count($articles)){
                $count=$this->uri->segment(3);
                ?>
                    <?php foreach($articles as $art){ ?>
                    <tr>
                        <td><?php echo ++$count; ?></td>
                        <?php if(!is_null($art->image_path)) {
                        ?>
                        <td>
                            <img src="<?php echo $art->image_path ?>" alt="" width="280" height="200">
                        </td>
                        <?php  }
                        else {?>

                        <td>
                            <!--dummmy image -->

                        </td>
                        <?php } ?>
                        <td><?php echo anchor("admin/{$art->id}",$art->article_title); ?></td>
                        <td><?php echo date('d M y H:i:s',strtotime($art->created_at)); ?></td>
                    </tr>
                    <?php  }   ?>
                    <?php } ?>



                </tbody>
            </table>
            <?php  echo $this->pagination->create_links();   ?>

        </div>
    </div>






<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
    //alert(filter);
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


</script>
</body>

</html>
<?php
include('footer.php');
?>
