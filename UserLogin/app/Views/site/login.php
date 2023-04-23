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
        <h4 class="text-center">User Login</h4>
        <div id="result"></div>
        <?= $this->session->getFlashdata('msg'); ?>
        <!-- logo -->
        <!-- <img src="assets/profile.jpg"> -->
          <form class="form-inline" action="#" id="login_form" method="post" onsubmit="return login_form()">
            <div class="form-group">
              <label class="sr-only" for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email">
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-info btn-sm">Login</button>
            <p><b>don't have an account? </b><a href="<?= base_urL(); ?>/user/signup">Signup</a></p>
          </form>
      </div>
    </div>
  
</div>

</body>
</html>

<script type="text/javascript">
 
function login_form() {
  //alert('hello');
  $('.alert-danger').remove();
      $.ajax({
      url: '<?= base_url() ?>/Login/do_login',
      type: 'POST',
      cache:false,
      contentType: false,
      processData: false,
      data:new FormData($('#login_form')[0]),
      dataType: 'json',
      beforeSend: function() {        
        $('#sub_btn').prop('disabled' , true);
        $('#sub_btn').text('Processing..');
      },
      success : function(res){
        $('#sub_btn').prop('disabled' , false);
        $('#sub_btn').text('Submit');
        if (res.status == 1) {
          window.location.href = res.redirect;
        }
        else
        {
         
          $('#result').html(res.message);
          for (var err in res.validation) {
            
            $("[name='" + err + "']").after("<div  class='label alert-danger'>" + res.validation[err] + "</div>");
          }
        }
      }
    });
return false;
}
</script>
