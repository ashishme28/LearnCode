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
</head>
<body>
<!-- Form -->

<div class="container mt-100">
  <div class="row">
    
      <div class="col-sm-4" style="margin-top: 100px;">
        <h4 class="text-center">User Login</h4>
          <form class="form-inline" action="/action_page.php">
            <div class="form-group">
              <label class="sr-only" for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email">
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-info btn-sm">Login</button>
          </form>
      </div>
      <div class="col-sm-4" style="margin-top: 100px;">
        <h4 class="text-center">Forget Password</h4>
          <form class="form-inline" action="/action_page.php">
            <div class="form-group">
              <label class="sr-only" for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email">
            </div>
            <br>
            <button type="submit" class="btn btn-info btn-sm">Forget</button>
          </form>
      </div>
        <div class="col-sm-4" style="margin-top: 100px;">
          <h4 class="text-center">User Signup</h4>
              <form class="form-inline" action="/action_page.php">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="phone">Phone:</label>
                  <input type="number" min="1" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="address">Address:</label>
                  <textarea class="form-control" id="address" placeholder="Enter Address" name="address"></textarea>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-info btn-sm">Signup</button>
              </form></div>
        </div>
  
</div>

</body>
</html>>
