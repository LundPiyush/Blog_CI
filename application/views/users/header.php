<html>

<head>
    <tiltle></tiltle>
    <?= link_tag("Assets/css/bootstrap.min.css") ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Article List</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid">


            <ul class="nav navbar-nav">
                <li class="active"><a class="nav-link" href="<?php echo base_url()?>export">User FeedbacK<span class="sr-only">(current)</span></a></li>
                <li class="active"><a class="nav-link" href="<?php echo base_url()?>Dynamic_dependent">Drop Down Demo</a></li>
                <li class="active"><a class="nav-link" href="<?php echo base_url()?>login">Admin Login</a></li>
            </ul>


            <form class="form-inline">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="myInput">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
            </nav>
        <!--
  <div class="col-lg-0" id="navbarColor01">
    
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      
    </form>
  </div>
  -->
   
   
   
   
    
    </body>
</html>


