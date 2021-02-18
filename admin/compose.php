<?php
	  require_once('../../private/initialize.php'); 
	$msg = "";
	global $db;

	
	// If upload button is clicked ...
	if (isset($_POST['upload'])) {
		// Get image name
		$image = $_FILES['image']['name'];
		// Get text
		$title = mysqli_real_escape_string($db, $_POST['title']);
		$tags =  mysqli_real_escape_string($db, $_POST['tags']);
		$content =   $_POST['content'];

		// image file directory
		$target = "images/".basename($image);

		$sql = "INSERT INTO posts (img, title , tag_id , content ) VALUES ('$image', '$title' , '$tags' , '$content')";
		
		// execute query
		mysqli_query($db, $sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
	}

		echo $msg;
	
	//$result = mysqli_query($db, "SELECT * FROM images");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edmin</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<style type="text/css">
	body{
		background-color: #25274d;
	}
	.contact{
		padding: 4%;
		height: 400px;
	}
	.col-md-3{
		background: #ff9b00;
		padding: 4%;
		border-top-left-radius: 0.5rem;
		border-bottom-left-radius: 0.5rem;
	}
	.contact-info{
		margin-top:10%;
	}
	.contact-info img{
		margin-bottom: 15%;
	}
	.contact-info h2{
		margin-bottom: 10%;
	}
	.col-md-9{
		background: #fff;
		padding: 3%;
		border-top-right-radius: 0.5rem;
		border-bottom-right-radius: 0.5rem;
	}
	.contact-form label{
		font-weight:600;
	}
	.contact-form button{
		background: #25274d;
		color: #fff;
		font-weight: 600;
		width: 25%;
	}
	.contact-form button:focus{
		box-shadow:none;
	}
</style>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
			  		Edmin
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
							<i class="icon-envelope"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-eye-open"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-bar-chart"></i>
						</a></li>
					</ul>

					<form class="navbar-search pull-left input-append" action="#">
						<input type="text" class="span3">
						<button class="btn" type="button">
							<i class="icon-search"></i>
						</button>
					</form>
				
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Drops <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li class="nav-header">Nav header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li>
						
						<li><a href="#">
							Support
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li><a href="#">Edit Profile</a></li>
								<li><a href="#">Account Settings</a></li>
								<li class="divider"></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">

					<?php include(SHARED_PATH . '/sidebar.php'); ?>

				<div class="span9">
				<div class="">
										<strong>Success!</strong> Your message has been sent successfully.
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>
					<div class="content">
						<div class="container contact">

							<div class="row">
								
								<div class="col-md-9">
									
									<div class="contact-form">
										<form method="POST" action="compose.php" enctype="multipart/form-data">	
										 	<div class="form-group">
												  <label class="control-label col-sm-2" for="fname">Title</label>
												  <div class="col-sm-10">          
													<input type="text" class="form-control" id="fname" placeholder="Title" name="title">
												  </div>
												</div>
												<div class="form-group">
												  <label class="control-label col-sm-2" for="lname">Featured Image:</label>
												  <div class="col-sm-10">          
													<input type="file" name="image">
												  </div>
												</div>
												<div class="form-group">
												  <label class="control-label col-sm-2" for="email">Tags:</label>
												  <div class="col-sm-10">
													<input type="text" class="form-control" id="fname" placeholder="Tags" name="tags">
												  </div>
												</div>
												<div class="form-group">
												  <label class="control-label col-sm-2" for="comment">Content:</label>
												  <div class="col-sm-10">
													<textarea class="form-control" rows="10" id="comment" name="content"></textarea>
												  </div>
												</div>
												<div class="form-group">        
												  <div class="col-sm-offset-2 col-sm-10">
													<button type="submit"  name ="upload" class="btn btn-default">Submit</button>
												  </div>
												</div>
										 </form> 
												
									</div>
								</div>
							</div>
						</div>

					</div>
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>