<?php include('include/header.php');?>

<style>
.chat_container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.chat_container::after {
  content: "";
  clear: both;
  display: table;
}

.chat_container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.chat_container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
<!-- Form -->
  <div class="row">
      <div class="col-sm-3 text-left" style="background-color: whitesmoke;">
        <ul class="navbar-nav">
            <?php include('include/sidebar.php');?>
        </ul>
      </div>
      <div class="col-sm-9" style="background-color: ghostwhite;">
        <h4 class="">Chat</h4>
        <div class="row">
            <div class="col-md-6">
            <?php for ($i=0; $i<=5 ; $i++) { 
            ?>
                <a onclick="return chat_page()" style="background-color: antiquewhite;width:100%;margin-top: 1px; text-align: left; padding: 5px;" class="btn" href="javascript:void;"><img src="<?= base_url('assets/uploads/mobile.png') ?>" style="height: 40px;width:40px;border-radius: 50%;">&emsp;<b>Ashish</b></a><br>
            <?php 
              }?>
            </div>
            <div style="display: none;" class="col-md-6 chat">
                    
                    <div class="chat_container">
                      <img src="<?= base_url() ?>/include/mobile.png" style="height: 40px;width:40px;border-radius: 50%;">
                      <p>Hello. How are you today?</p>
                      <span class="time-right">11:00</span>
                    </div>

                    <div class="chat_container">
                      <img src="<?= base_url() ?>/include/mobile.png" style="height: 40px;width:40px;border-radius: 50%;" class="right">
                      <p>Hey! I'm fine. Thanks for asking!</p>
                      <span class="time-left">11:01</span>
                    </div>

                    <div class="chat_container">
                      <img src="<?= base_url() ?>/include/mobile.png" style="height: 40px;width:40px;border-radius: 50%;">
                      <p>Sweet! So, what do you wanna do today?</p>
                      <span class="time-right">11:02</span>
                    </div>
                    <div class="chat_container">
                      <img src="<?= base_url() ?>/include/mobile.png" style="height: 40px;width:40px;border-radius: 50%;" class="right">
                      <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                      <span class="time-left">11:05</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Send Message">
                    <button type="submit" class="btn btn-success btn-sm">Send</button>
            </div>
        </div>
      </div>
  </div>
<!-- -->
<?php include('include/footer.php');?>

<script>
    function chat_page(){
        //alert('hello');
        $('.chat').show();
    }


</script>