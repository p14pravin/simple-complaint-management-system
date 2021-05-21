<?php
	include('database.php');
	include('session.php');
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
	else{
		header("Location:index.php");
	}
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$status = $_POST['status'];
		$date = date("Y-m-d")." ". date("h:i:s") ;
		$remark = $date."\n".$_POST['remark'];
		
		$update_query = mysqli_query($conn,"UPDATE complaints SET status = '$status', remark = '$remark' where id = '$id'");
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blog Post - Brand</title>
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
    <header class="masthead" style="background-image:url('assets/img/post-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>Complain View</h1><span class="subheading"></span></div>
                </div>
            </div>
        </div>
    </header>
    <article></article>
    <div class="article-dual-column">
        <div class="container">
            <div class="col d-lg-flex justify-content-lg-center" class="row">
				<?php
						$query_complaint = mysqli_query($conn,"SELECT * from complaints where id = '$id'");
						$fetch_complaint = mysqli_fetch_array($query_complaint);
						?>
				<div class="card shadow mb-3">
					<div class="card-header py-3">
						<p class="text-primary m-0 font-weight-bold"><?php echo $fetch_complaint['title'];?></p>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col">
								<div class="form-group"><label for="username"><strong>Complaint ID: #</strong><?php echo $fetch_complaint['id'];?></label></div>
								<div class="form-group"><label for="username"><strong>Complaint Category: </strong> <?php echo $fetch_complaint['category'];?></label></div>
								<div class="form-group" ><label for="username"><strong>Complaint In Details</strong></label></div>
									<p style="padding-left: 100px;"><?php echo nl2br($fetch_complaint['details']);?></p>
								<div class="form-group"><label for="username"><strong>Complaint Date: </strong> <?php echo $fetch_complaint['date'];?></label></div>
								<div class="form-group"><label for="username"><strong>Complaint Status: </strong> <?php echo $fetch_complaint['status'];?></label></div>
								<div class="form-group"><label for="username"><strong>Complaint Remark: </strong> <span style="color: rgb(255,15,0);"><?php echo nl2br($fetch_complaint['remark']);?><span></label></div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col text-center">
					<button class="btn btn-primary text-center" onClick="parent.location='index.php'" style="filter: blur(0px) brightness(97%) grayscale(0%);margin: 5px;padding: 8px;"  type="button">BACK TO HOME</button>
					<form method="POST" action="complaint_update.php">
						<button class="btn btn-primary text-right bg-warning" style="filter: blur(0px) brightness(97%) grayscale(0%);margin: 5px;padding: 8px;" name="c_id" value="<?php echo $fetch_complaint['id'];?>" type="submit" <?php if($fetch_complaint['status']!="Pending"){echo "disabled";}?>>update</button>
					</form>
					<form method="POST" action="complaint_delete.php">
						<button class="btn btn-primary text-right bg-danger" style="filter: blur(0px) brightness(97%) grayscale(0%);margin: 5px;padding: 8px;" name="id" value="<?php echo $fetch_complaint['id'];?>" type="submit" <?php if($fetch_complaint['status']!="Pending"){echo "disabled";}?>>delete</button>
					</form>
				</div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <p class="text-muted copyright" style="color: rgb(255,15,0);">Copyright&nbsp;© Made with&nbsp;❤&nbsp;ndroid 2020</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>