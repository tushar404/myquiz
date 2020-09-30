<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>My Quiz</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column h-100">
  <div class="container">
		<form method="post" action="<?php ?>" name="student_register" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="exampleFormControlInput1">First Name</label>
			<input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
			<?php echo form_error('firstname');?>
		  </div>
		  <div class="form-group">
			<label for="exampleFormControlInput1">Last Name</label>
			<input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
			<?php echo form_error('lastname');?>
		  </div>
		  <div class="form-group">
			<label for="exampleFormControlInput1">Email</label>
			<input type="email" name="email" class="form-control" placeholder="Enter Email">
			<?php echo form_error('email');?>
		  </div>
			<div class="form-group">
				<label for="exampleFormControlInput1">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Set new password.">
				<?php echo form_error('password');?>
			</div>
		  <div class="form-group">
			<label for="exampleFormControlInput1">Confirm Password</label>
			<input type="password" name="confirmpassword" class="form-control" placeholder="Enter Confirm password.">
			<?php echo form_error('confirmpassword');?>
		  </div>
			<div class="form-group">
				 <button type="submit" class="btn btn-primary">Submit</button>
				 <a href="<?php echo BASE_PATH;?>/login" class="btn btn-primary">login</a>
			</div>
		</form>
	  </div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>