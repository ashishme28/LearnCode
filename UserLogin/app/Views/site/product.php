<?php include('include/header.php'); ?>

  <div class="row">
   <div class="col-sm-3" id="filter" style="background-color: lightgray;">
     <h4 class="">Filter</h4>
        <div class="form-group">
            <label>Keyword</label><br>
            <input type="text" class="form-control" id="email" placeholder="Search By Name"  name="name">
        </div>
        <div class="form-group">
            <label>Memory</label><br>
            <input type="checkbox" id="email" name="name">
            <label>2 GB Ram</label><br>
            <input type="checkbox" id="email" name="name">
            <label>4 GB Ram</label><br>
            <input type="checkbox" id="email" name="name">
            <label>6 GB Ram</label><br>
            <input type="checkbox" id="email" name="name">
            <label>8 GB Ram</label><br>
            <input type="checkbox" id="email" name="name">
            <label>12 GB Ram</label>
        </div>
        <div class="form-group">
            <label>Price</label><br>
            <input type="text" class="form-control" id="email" placeholder="Search By Name"  name="name">
        </div>
        <div class="form-group">
          <label>Search By Price Range</label>
          <input type="text" id="minprice" name="minprice" class="price form-control">
          <input type="text" id="maxprice" name="maxprice" class="price form-control">
          &emsp;&emsp;<span id="current_range"></span>
          <div id="slider-range"></div>
        </div>
        <div class="form-group">
            <label>Primary Camera</label><br>
            <input type="checkbox" id="email" name="name">
            <label>2 MP</label><br>
            <input type="checkbox" id="email" name="name">
            <label>5 MP</label><br>
            <input type="checkbox" id="email" name="name">
            <label>8 MP</label><br>
            <input type="checkbox" id="email" name="name">
            <label>16 MP</label><br>
            <input type="checkbox" id="email" name="name">
            <label>32 MP</label>
        </div>
        <div class="form-group">
            <label>Secondary Camera</label><br>
            <input type="checkbox" id="email" name="name">
            <label>2 MP</label><br>
            <input type="checkbox" id="email" name="name">
            <label>5 MP</label><br>
            <input type="checkbox" id="email" name="name">
            <label>8 MP</label><br>
            <input type="checkbox" id="email" name="name">
            <label>16 MP</label><br>
            <input type="checkbox" id="email" name="name">
            <label>32 MP</label>
        </div>

        <div class="form-group">
            <label>Brand</label><br>
            <input type="checkbox" id="email" name="name">
            <label>MI</label><br>
            <input type="checkbox" id="email" name="name">
            <label>VIVO</label><br>
            <input type="checkbox" id="email" name="name">
            <label>OPPO</label><br>
            <input type="checkbox" id="email" name="name">
            <label>NOKIA</label><br>
            <input type="checkbox" id="email" name="name">
            <label>MOTOG</label>
        </div>

         <div class="form-group">
            <label>Battery Capacity</label><br>
            <input type="checkbox" id="email" name="name">
            <label>1000 Mah</label><br>
            <input type="checkbox" id="email" name="name">
            <label>2000 Mah</label><br>
            <input type="checkbox" id="email" name="name">
            <label>3000 Mah</label><br>
            <input type="checkbox" id="email" name="name">
            <label>4000 Mah</label><br>
            <input type="checkbox" id="email" name="name">
            <label>5000 Mah</label>
        </div>
         <div class="form-group">
            <label>Operating System</label><br>
            <input type="checkbox" id="email" name="name">
            <label>Android</label><br>
            <input type="checkbox" id="email" name="name">
            <label>Anna</label><br>
            <input type="checkbox" id="email" name="name">
            <label>Eclair</label><br>
            <input type="checkbox" id="email" name="name">
            <label>Kitkat</label><br>
            <input type="checkbox" id="email" name="name">
            <label>Lollipop</label>
        </div>
      </div>
    <div class="col-sm-9" style="background-color: lightgray;" id="product">
      <h4 class="text-center">Product</h4>
      <div class="row">
            <?php 
              foreach($product as $key => $value){
            ?>

                <div class="col-sm-4">
                      <div class="row">
                        <img src="<?= base_url('assets/product/mobile.png'); ?>" style="height: 240px;width:240px;">
                      </div>
                      <div class="row">
                        <div class="col-md-6">Name:</div>
                        <div class="col-md-6"><b><?= $value['name'] ?></b></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">Brand:</div>
                        <div class="col-md-6"><b><?= $value['brand'] ?></b></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">Price:</div>
                        <div class="col-md-6">$<b><?= $value['price'] ?></b></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">Memory:</div>
                        <div class="col-md-6"><b><?= $value['memory'] ?> GB RAM</b></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">Front Camera:</div>
                        <div class="col-md-6"><b><?= $value['p_camera'] ?> MP</b></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">Rear Camera:</div>
                        <div class="col-md-6"><b><?= $value['s_camera'] ?> MP</b></div>
                      </div>
                      <br>
                      <button type="submit" onclick="alert('coming soon'); return false;" class="btn btn-info btn-sm">Buy</button>
                      <button type="submit" class="btn btn-info btn-sm" onclick="addcart(<?= $value['id']; ?>)" id="add<?= $value['id']; ?>">Add Cart</button>
                </div>

            <?php
              }
            ?>
      </div>
    </div>
  </div>
<!-- </div> -->

<?php include('include/footer.php');?>

<script>
   function addcart(id) {
    if(confirm('Are you sure ?')){
        <?php
          if(!$this->session->get('user_id')) { ?>
              window.location.href = "<?= base_url()?>/user/login";
                
        <?php }
        ?>
        $.ajax ({
          url: '<?= base_url()?>/Cart/addcart',
          data: {id:id},
          type: 'POST',
          dataType:'json',
          beforeSend: function() {        
              $('#add'+id).prop('disabled' , true);
              $('#add'+id).text('Processing..');
            },
          success: function(result){
              $('#add'+id).prop('disabled' , false);
              $('#add'+id).text('Add Cart');
              if(result.status == 1)
              {
                window.location.reload();
              }
          }
          });
    }
}
</script>