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
          <?= $this->session->getFlashdata('msg'); ?>
            <h4 class="text-center">Update Profile</h4>
        <!-- logo -->
        <!-- <img src="assets/profile.jpg"> -->
          <form class="form-inline" onsubmit="return addUser(this,event,<?= $user['id'] ?>)" id="addUser" enctype="multipart/form-data">
            <div class="form-group">
              <label class="sr-only" for="email">Name:</label>
              <input type="text" class="form-control" id="email" placeholder="Enter name"  name="name" required value="<?= $user['name'] ?>">
              <input type="hidden" class="form-control" name="id" required value="<?= $user['id'] ?>">
            </div>
            <div class="form-group">
              <label class="sr-only" for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email" readonly value="<?= $user['email'] ?>">
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Phone:</label>
              <input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone" required value="<?= $user['phone'] ?>">
            </div>
            <div class="form-group">
              <label class="sr-only" for="pwd">Profile Image:</label>
              <input type="file" class="form-control" id="phone" placeholder="Select Profile Image" accept="image/*" name="profile_image" >
            </div>
            <br>
            <?php 
              if($user['profile_image']){ ?>
                <img src="<?= base_url($user['profile_image']); ?>" style="height: 100px;width: 100px;" alt="">
            <?php }
            ?>
            <br>
            <div class="form-group">
              <label class="sr-only" for="pwd">Address:</label>
              <textarea class="form-control" id="address" placeholder="Enter Address" name="address"><?= $user['address'] ?></textarea required>
            </div>
            
            <button type="submit" class="btn btn-info btn-sm" id="addbtn<?= $user['id'] ?>">Update</button>
          </form>
      
      </div>
  </div>
<!-- -->
<?php include('include/footer.php');?>
<script type="text/javascript">
    function addUser(el,event,id) {
      event.preventDefault();
      $('.alert-danger').remove();
        var data = new FormData($(el)[0]);

        $.ajax({
              url: '<?= base_url()?>/Profile/update_user',
              data: data,
              processData: false,
              contentType: false,
              type: 'POST',
              dataType:'json',
        beforeSend: function() {        
            $('#addbtn'+id).prop('disabled' , true);
            $('#addbtn'+id).text('Processing..');
          },
              success: function(result){
            $('#addbtn'+id).prop('disabled' , false);
            $('#addbtn'+id).text('Update');
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
