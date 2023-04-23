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
            <?php foreach($users as $key => $value) 
            { 
              $where ="sender_id = ".$value['id']." and receiver_id = ".$user_id." and is_read = 0 ";
              $chatData = $this->my_model->GetAllData('chat',$where,'id','asc');
             ?>
                <a onclick="return chat_page(<?= $value['id'] ?>)" style="background-color: antiquewhite;width:100%;margin-top: 1px; text-align: left; padding: 5px;" class="btn" href="javascript:;">
                  <?php 
                    if($value['profile_image']){ ?>
                      <img src="<?= base_url($value['profile_image'])?>" style="height: 40px;width:40px;border-radius: 50%;">&emsp;<b><?= $value['name'] ?></b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span class="badge bg-danger text-right"><?= count($chatData)?></span>
                <?php 
                  }else{ 
                ?>
                  <img src="<?= base_url('assets/uploads/dummy_image.webp')?>" style="height: 40px;width:40px;border-radius: 50%;">&emsp;<b><?= $value['name'] ?></b>
                <?php 
                  }
                ?>
                  
                </a><br>
            <?php 
              }
            ?>
            </div>
            <div style="display: none;" class="col-md-6 chat">
                    <div class="row show_chat " style="height: auto;">Chat</div>
                    <div class="row">
                        <form class="form-inline" onsubmit="return addChat(event)" id="addChat" enctype="multipart/form-data">
                          <input type="hidden" class="form-control receiver_id" name="receiver_id" required value="" />
                            <input type="text" class="form-control message" name="message" placeholder="Send Message" required>
                            <br>
                            <button type="submit" class="btn btn-success btn-sm" id="addbtn">Send</button>
                        </form>
                  <div>
            </div>
        </div>
      </div>
  </div>
<!-- -->
<?php include('include/footer.php');?>

<script>
    function chat_page(id){

      $('.chat').show();
      $('.receiver_id').attr('value',id);
      var receiver_id = id;
      
      setInterval(function() {
          $.ajax ({
              url: '<?= base_url()?>/Dashboard/get_chat',
              data: {receiver_id:receiver_id},
              type: 'POST',
              dataType:'json',
              beforeSend: function() {        
                  $('#delbtn'+id).prop('disabled' , true);
                  $('#delbtn'+id).text('Processing..');
                },
              success: function(result){
                  $('#delbtn'+id).prop('disabled' , false);
                  $('#delbtn'+id).text('Add');
                  if(result.status == 1)
                  {
                    //console.log(result.html);
                    $('.show_chat').html(result.html);
                  }
              }
            });
         
        }, 1000);
      
    }


</script>

<script type="text/javascript">
    function addChat(event) {
      event.preventDefault();
      $('.alert-danger').remove();
        var data = new FormData($('#addChat')[0]);

        $.ajax({
              url: '<?= base_url()?>/Dashboard/add_chat',
              data: data,
              processData: false,
              contentType: false,
              type: 'POST',
              dataType:'json',
        beforeSend: function() {        
            $('#addbtn').prop('disabled' , true);
           // $('#addbtn').text('Processing..');
          },
              success: function(result){
            $('#addbtn').prop('disabled' , false);
            //$('#addbtn').text('Send');
            if(result.status == 1)
            {
              //window.location.reload();
              $('.message').val('');
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
