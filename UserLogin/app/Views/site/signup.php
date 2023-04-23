<!DOCTYPE html>
<html>
<?php 
  $this->session = \Config\Services::session();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Module</title>
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- jquery cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <style>
    #login{
      display: inline-block;
      position: fixed;
      margin: auto;
      top: 10%;
      left: 32%;
    }


  </style>
</head>
<body>
<!-- Form -->

<div class="container mt-100">
  <div class="row">
    
    <div class="col-sm-4" id="login">
      <?= $this->session->getFlashdata('msg'); ?>
        <h4 class="text-center">User Signup</h4>
        <!-- logo -->
        <!-- <img src="assets/profile.jpg"> -->
          <form class="form-inline" onsubmit="return addUser(event)" id="addUser" enctype="multipart/form-data">
            <div class="form-group">
              <label class="sr-only" for="email">Name:</label>
              <input type="text" class="form-control" id="email" placeholder="Enter name"  name="name" required>
            </div>
            <div class="form-group">
              <label class="sr-only" for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email" required>
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Confirm Password:</label>
              <input type="password" class="form-control" id="cpwd" placeholder="Enter password" name="cpassword" required>
            </div>
            <p style="color: red;" id="pass_err"></p>
            <div class="form-group">
              <label class="sr-only" for="pwd">Phone:</label>
              <input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone" required>
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Profile Image:</label>
              <input type="file" class="form-control" id="phone" placeholder="Select Profile Image" accept="image/*" name="profile_image" required>
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Address:</label>
              <textarea class="form-control" id="address" placeholder="Enter Address" name="address"></textarea required>
            </div>
            
            <button type="submit" class="btn btn-info btn-sm" id="addbtn">Signup</button>
            <p><b>You have an already account ? </b><a href="<?= base_urL(); ?>/user/login">Login</a></p>
          </form>
      </div>
    </div>
  
</div>

</body>
</html>
<script type="text/javascript">
    function addUser(event) {

      var pass = $('#pwd').val();
      var cpass = $('#cpwd').val();
      if(pass != cpass){
        $('#pass_err').html('Password and confirm password does not matched!!!.');
        return false;
      }

      event.preventDefault();
      $('.alert-danger').remove();
        var data = new FormData($('#addUser')[0]);

        $.ajax({
              url: '<?= base_url()?>/Home/add_User',
              data: data,
              processData: false,
              contentType: false,
              type: 'POST',
              dataType:'json',
        beforeSend: function() {        
            $('#addbtn').prop('disabled' , true);
            $('#addbtn').text('Processing..');
          },
              success: function(result){
            $('#addbtn').prop('disabled' , false);
            $('#addbtn').text('Signup');
            if(result.status == 1)
            {
              window.location.reload();
            }
            else
            {
              console.log(result.message);
              for (var err in result.message) {
            
              $("[name='" + err + "']").after("<div  class='label alert-danger'>" + result.message[err] + "</div>");
              }
            }
        }
        });
    return false;
  } 
</script>
