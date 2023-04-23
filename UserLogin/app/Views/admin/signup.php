<!DOCTYPE html>
<html>
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
        <h4 class="text-center">User Signup</h4>
        <!-- logo -->
        <!-- <img src="assets/profile.jpg"> -->
          <form class="form-inline" action="/action_page.php">
            <div class="form-group">
              <label class="sr-only" for="email">Name:</label>
              <input type="text" class="form-control" id="email" placeholder="Enter name"  name="name">
            </div>
            <div class="form-group">
              <label class="sr-only" for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email">
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Phone:</label>
              <input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Address:</label>
              <textarea class="form-control" id="address" placeholder="Enter Address" name="address"></textarea>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-info btn-sm">signup</button>
          </form>
      </div>
    </div>
  
</div>

</body>
</html>
