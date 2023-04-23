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
  <?php
    use App\Models\My_Model;
    $this->my_model = new My_Model();
    $this->session = \Config\Services::session();
    $user_id = $this->session->get('user_id');

    $userData = $this->my_model->GetSingleData('user',array('id'=>$user_id));

    $cartData = $this->my_model->GetAllData('cart',array('user_id'=>$user_id,'status'=>0));

  ?>
<div class="container">
  <div class="row" id="header">
    <div class="col-sm-4">
        User Module
    </div>
    <div class="col-sm-4">
        
    </div>
    <div class="col-sm-4">
      <?php
        if($user_id){ ?>
          <a href="<?= base_url(); ?>/user/dashboard" type="submit" class="btn btn-info btn-sm"><?= $userData['name'] ?></a>
          <a href="<?= base_url(); ?>/user/dashboard" type="submit" class="btn btn-info btn-sm">Dashboard</a>
          <a href="<?= base_url(); ?>/user/cart-view" type="submit" class="btn btn-info btn-sm">Cart&emsp;<span class="badge bg-danger"><?= count($cartData); ?><span></a>
          <a href="<?= base_url(); ?>/user/logout" type="submit" class="btn btn-info btn-sm">Logout</a>
          
       <?php }else{ ?>
        <a href="<?= base_url(); ?>/user/signup" type="submit" class="btn btn-info btn-sm">Signup</a>
        <a href="<?= base_url(); ?>/user/login" type="submit" class="btn btn-info btn-sm">Login</a>
      <?php } ?>
      
      
      
    </div>
  </div>
