<?php
//index.php
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Internet of Things </title>
  <script src="jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
  <script src="bootstrap.min.js"></script>
  <script src="bootstrap-toggle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap-toggle.min.css">
  <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">--> 
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:600px;">
   <h2 align="center">Internet of Things LED Control</h2><br /><br />
   <form method="post" id="insert_data">
    
    <div class="form-group">
     <input type="text" name="name" id="name" class="form-control" readonly="readonly" style="display: none;" value="Robotics Association of Nepal" />
    </div>
    <div class="form-group">
     <label>LED One</label>
     <div class="checkbox">
      <input type="checkbox" name="status" id="status" checked />
     </div>
    </div>
    <input type="hidden" name="hidden_status" id="hidden_status" value="ON" />
    <br />
    <input type="submit" name="insert" id="action" class="btn btn-info" value="Insert" />
   </form>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#status').bootstrapToggle({
  on: 'ON',
  off: 'OFF',
  onstyle: 'success',
  offstyle: 'danger'
 });

 $('#status').change(function(){
  if($(this).prop('checked'))
  {
   $('#hidden_status').val('ON');
  }
  else
  {
   $('#hidden_status').val('OFF');
  }
 });

 $('#insert_data').on('submit', function(event){
  event.preventDefault();

   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data){
     if(data == 'done')
     {
      $('#insert_data')[0].reset();
      $('#status').bootstrapToggle('on');
      alert("Data Inserted");
     }
    }
   });
  
 });

});
</script>