<?php include('include/header.php'); ?>

  <div class="row">
   <div class="col-sm-12" style="background-color: lightgray;" id="product">
      <h4 class="text-center">Cart Detail</h4>
      <div class="row">
            <?php 
              foreach($cart as $key => $value){
                $product = $this->my_model->GetSingleData('product',array('id'=>$value['product_id']));
            ?>

                <div class="col-sm-4">
                      <div class="row">
                        <img src="<?= base_url('assets/product/mobile.png'); ?>" style="height: 240px;width:240px;">
                      </div>
                      <div class="row">
                        <div class="col-md-6">Name:</div>
                        <div class="col-md-6"><b><?= $product['name'] ?></b></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">Brand:</div>
                        <div class="col-md-6"><b><?= $product['brand'] ?></b></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">Price:</div>
                        <div class="col-md-6">$<b><?= $product['price'] ?></b></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">Memory:</div>
                        <div class="col-md-6"><b><?= $product['memory'] ?> GB RAM</b></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">Front Camera:</div>
                        <div class="col-md-6"><b><?= $product['p_camera'] ?> MP</b></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">Rear Camera:</div>
                        <div class="col-md-6"><b><?= $product['s_camera'] ?> MP</b></div>
                      </div>
                      <br>
                      <button type="submit" onclick="alert('coming soon'); return false;" class="btn btn-info btn-sm">Buy</button>
                </div>

            <?php
              }
            ?>
      </div>
    </div>
  </div>
<!-- </div> -->

<?php include('include/footer.php');?>

