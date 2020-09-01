 <?php include('header.php'); ?>
 <html>
 <head>
 <style>
 .box
 {
  width:100%;
  max-width: 650px;
  margin:0 auto;
 }
 </style>
</head>
<body>
 <div class="container box">
  <br />
  <br />
  <h3 align="center">Dynamic Dependent Select Box using Ajax</h3>
  <br />
  
  <div class="form-group">
   <select name="country" id="country" class="form-control input-lg">
    <option value="">Select Country</option>
    <?php
    foreach($country as $row)
    {
     echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
    }
    ?>
   </select>
  </div>
  <br />

  <div class="form-group">
   <select name="state" id="state" class="form-control input-lg">
    <option value="">Select State</option>
   </select>
  </div>
  <br />

  <div class="form-group">
   <select name="city" id="city" class="form-control input-lg">
    <option value="">Select City</option>
   </select>
  </div>
 </div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
     </script>
     <script>
         
         
$(document).ready(function(){
 $('#country').change(function(){
  var country_id = $('#country').val();
  if(country_id != '')
  { 
   
   $.ajax({
    
    url:"<?php echo base_url(); ?>Dynamic_dependent/fetch_state",
    method:"POST",
    data:{country_id:country_id},
    success:function(data)
    {
     
     $('#state').html(data);
     $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State</option>');
   $('#city').html('<option value="">Select City</option>');
  }
 });

 $('#state').change(function(){
  var state_id = $('#state').val();
  if(state_id != '')
  {
      //alert('state is not empty');
   $.ajax({
    url:"<?php echo base_url(); ?>Dynamic_dependent/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
        //alert(data);
     $('#city').html(data);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City</option>');
  }
 });
 
});
</script>
</html>
 <?php include('footer.php'); ?>
