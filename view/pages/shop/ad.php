<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style type="text/css" media="screen">
		body{
			background-image: url('https://cdn.nhanh.vn/cdn/store/26/art/article_1536634366_267.jpg');
			height: 100%;
			margin-top: 20%;
			width: 100%
		}
		legend{
			color: #ffffff;
			font-weight: bold;
			text-align: center;
		}
		button{
			margin-top: 15px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row ">
			<form action="" method="POST" role="form" class="col-md-6 offset-md-3">
				<legend class="text-uppercase">Chọn chi nhánh của cửa hàng</legend>
			
				<select name="branch_id" id="input" class="form-control" required="required">
					<?php if (isset($branch)) {
						foreach ($branch as $key => $value) {
					?>
						<option value="<?=$value->branch_id?>"><?=($value->name)?></option>
					<?php }} ?>
				</select>
				
			
				<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
		</div>
		
	</div>
</body>
</html>

<?php 
	if (isset($_POST['submit'])) {
		$_SESSION['branch_id']= $_POST['branch_id'];
		header('location: ?mod=home&act=home ');
	}
 ?>