<html>
	<head>
		<title>multiple input feild</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
	

	<body>
		<div class="container">
			<h3>Add and remove feild</h3>
				<table  id="field">
					<tr>
					<td><input type="text" name="key" placeholder="enter key" class="form-control" id="key"></td>
					<td><input type="text" name="value"  placeholder="enter value" class="form-control" id="value"></td>
					<td><button type="button" name="add" id="addbtn" class="btn btn-success">ADD +</button></td>
					</tr>
				</table>
					<div id="response"></div>
		</div>
	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 	<script>
		$(document).ready(function(){
				//alert('hello');
					var i = 1;
				$('#addbtn').click(function(){
					i++;
					if($('#key').val() && $('#value').val() != ''){
						$('#response').append(
							'<tr id="row'+i+'"><td><input type="text" name="key" value="'+i+'" placeholder="enter key" class="form-control"></td><td><input type="text" name="value" placeholder="enter value" class="form-control"></td><td><button type="button" id="'+i+'" class="btn btn-danger removebtn">REMOVE X</button></td></tr>');
					}
					else
					{
						alert('Both feilds are required');
					}
				});
		
			$(document).on('click','.removebtn',function(){
				//$('#response').remove();
				var btn_id = $(this).attr("id");
				$('#row'+btn_id+'').remove();  
			});
		});


</script>
</html>