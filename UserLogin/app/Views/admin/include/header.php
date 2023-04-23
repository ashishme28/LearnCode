<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Module</title>
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    #header{
      background-color: palegreen;
      height: 50px;
    }
    #footer{
      height: 50px;
      width: auto;
      background-color: palegreen;
      /*margin-top: 500px;*/
    }

  </style>
</head>
<body>
<div class="container">
  <div class="row" id="header">
    <div class="col-sm-4">
        User Module
    </div>
    <div class="col-sm-6">
        
    </div>
    <div class="col-sm-2">
      <a href="<?= base_urL(); ?>/signup" type="submit" class="btn btn-info btn-sm">Signup</a>
      <a href="<?= base_urL(); ?>/signin" type="submit" class="btn btn-info btn-sm">Signin</a>
      
    </div>
  </div>
