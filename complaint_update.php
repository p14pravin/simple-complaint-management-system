<?php
	include('database.php');
	include('session.php');
	
	if(isset($_POST['c_id'])){
		$_SESSION['c_id'] = $_POST['c_id'];
		$c_id = $_SESSION['c_id'];
	}
	if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['title'])){
		$title = $_POST['title'];
		$category = $_POST['category'];
		$details = $_POST['details'];
		$c_id = $_SESSION['c_id'];
		
		$update_query = mysqli_query($conn,"UPDATE complaints SET title = '$title', category = '$category', details = '$details' where id = '$c_id'");
		$link = "complaint_view.php?id=".$_SESSION['c_id'];
		header("Location:$link");
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>About us - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand text-warning" href="index.html">#CMS</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="complaint_add.php">ADD Complaint</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="logout.php">Logout</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <header class="masthead" style="background-image:url('assets/img/about-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>UPDATE POST</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>
    <div class="article-dual-column">
        <div class="container">
			<form method="POST" action="">
				<div class="row">
					<?php 
						$query_complaint = mysqli_query($conn,"SELECT * from complaints where id = '$c_id'");
						$fetch_complaint = mysqli_fetch_array($query_complaint);
					?>
					<div class="col-md-10 offset-md-1">
						<p style="margin-bottom: 00px;"><strong>Complaint Title</strong></p>
							<input style="max-width: 100%;min-width: 100%;min-height: 50px;" type="text" value="<?php echo $fetch_complaint['title'];?>" required="" minlength="4" maxlength="80" name="title">
						<p style="margin-bottom: 00px;"><strong>Complaint Category&nbsp;</strong></p>
							<select class="flex-fill" name="category" required="" style="margin: 15px;">
								<optgroup label="Select Status">
									<option value="General" <?php if($fetch_complaint['category']=="General"){echo "selected";}?>>General</option>
									<option value="Service Related" <?php if($fetch_complaint['category']=="Service Related"){echo "selected";}?>>Service Related</option>
									<option value="Technical" <?php if($fetch_complaint['category']=="Technical"){echo "selected";}?>>Technical</option>
								</optgroup>
							</select>
						<div class="intro"></div>
						<p style="margin-bottom: 00px;"><strong>Complaint in Details</strong></p>
							<textarea style="max-width: 100%;min-width: 100%;min-height: 200px;" required="" minlength="20" name="details"><?php echo $fetch_complaint['details'];?></textarea>
						<div class="row">
							<div class="col text-center" style="padding-top: 15px;">
								<button class="btn btn-primary text-center" type="submit">update</button>
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>
    </div>
    <footer>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <p class="text-muted copyright" style="color: rgb(255,15,0);">Copyright&nbsp;?? Made with&nbsp;???&nbsp;ndroid 2020</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>