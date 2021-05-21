<?php
	include('database.php');
	include('session.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
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
            <div
                class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="complaint_add.php">ADD Complaint</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="logout.php">Logout</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <header class="masthead" style="background-image:url('assets/img/home-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>Complain Box</h1><span class="subheading">A Blog Theme by nDROID Tech</span></div>
                </div>
            </div>
        </div>
    </header>
    <div class="article-dual-column">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-lg-7 offset-md-1 offset-lg-0" style="max-width: 100%;min-width: 100%;">
                    <h1 class="text-center">Your Complaint's<br></h1>
                </div>
				<table class="table dataTable my-0" id="dataTable">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Status</th>
							<th>Date</th>
							<th>Remark</th>
							<th>Link</th>
						</tr>
					</thead>
					<tbody>
					<?php
					
						$query_list = mysqli_query($conn,"SELECT * from complaints where user_id = '$ID'");
						while($list = mysqli_fetch_assoc($query_list)){
					?>
					
						<tr>
							<td style="width: 10px;"><?php echo $list['id'];?></td>
							<td style="width: 250px;"><?php echo $list['title'];?></td>
							<td style="width: 50px;"><?php echo $list['status'];?></td>
							<td style="width: 50px;"><?php echo $list['date'];?></td>
							<td style="width: 160px;"><?php echo $list['remark'];?></td>
							<td style="width: 50px;"><button class="btn btn-primary text-right bg-success" style="filter: blur(0px) brightness(97%) grayscale(0%); margin: 5px;padding: 8px;" onClick="parent.location='complaint_view.php?id=<?php echo $list['id'];?>'">View</button></td>
						</tr>
					<?php 
					}
					?>
					</tbody>
				</table>
            </div>
        </div>
    </div>
    <footer>
        <hr>
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