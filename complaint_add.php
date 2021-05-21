<?php
include('database.php');
include('session.php');
$popup="";
#here we inclue database.php page in this page. this is example Inheritance.
#that mean this is common code of database connection.
#we can inherit that code in each page. no need to write in every page.
#we can access veriable of included page in this page.
# $conn is a veriable in database.php we accessed that veriable in this progam below 


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		#declare veriable = $_POST['name of input in html form']; 
		#input is tag of html which is use to get information from user.
		#method to assign value of "HTML_form input" to "declare variable" in php
		
		$title = $_POST['title'];
		$details = $_POST['details'];
		#here we created php veriable $user_name and assign value to it of "Name" input of HTML_form element 
		$date = date("Y-m-d");
		$category = $_POST['category'];
		#same here we created user mail veriable and then we assign value of "Mail" input of HTML form
		$remark= "Not Yet Viewed";
		$status = 'Pending';
		
		
		#query to insert data into database
		$new_complaint = "INSERT INTO complaints (user_id, title, category, details, remark, status, date) value ('$ID','$title', '$category', '$details', '$remark', '$status', '$date')";
			# create a veriable and assign query to it as shown above
			#here we created veriable $new_user
			
			# This is format of insert query
			#"INSERT INTO 'table name' (column 1 of table, column 2  of table) VALUE ('$value for column 1', '$value for column 2')
			#if there  5 column then >>>>>>> value have 5 variable to insert data into cloumn
			
		#this is condition. if user data successfully insertd into table then if statement will execute
		#otherwise else statement will execute
		#this is query to check wether data is inserted or not
		if (mysqli_query($conn, $new_complaint)) {
			#format
			#mysql_query ($Database connection veriable, $Veriable of insert query)
			$get_id = mysqli_query($conn,"SELECT * from complaints where title = '$title'");
			$get_array = mysqli_fetch_array($get_id);
			$link = "complaint_view.php?id=".$get_array['id'];
			header("Location:$link");
			#header is use to move another page 
			#format
			#header("Location:'Link of page where we want to move'")
		} 
		else {
			#else condition 
			$popup =' Fail to Create Account ';
		}
			
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
    <header class="masthead" style="background-image:url('assets/img/about-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>Add New Complaint</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>
    <div class="article-dual-column">
        <div class="container">
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<p style="margin-bottom: 00px;"><strong>Complaint Title</strong></p>
							<input type="text" style="max-width: 100%;min-width: 100%; min-height: 50px;" required="" minlength="4" maxlength="50" name="title">
						<p style="margin-bottom: 00px;"><strong>Complaint Category&nbsp;</strong></p>
							<select class="flex-fill" name="category" required="" style="margin: 15px;">
								<optgroup label="Select Status">
									<option value="General">General</option>
									<option value="Service Related">Service Related</option>
									<option value="Technical">Technical</option>
								</optgroup>
							</select>
						<div class="intro"></div>
						<p style="margin-bottom: 00px;"><strong>Complaint in Details</strong></p>
						<textarea style="max-width: 100%;min-width: 100%;min-height: 200px;" required="" minlength="20" name="details" maxlength="65000"></textarea>
						<div class="row">
							<div class="col text-center" style="padding-top: 15px;"><button class="btn btn-primary text-center" type="submit">Submit</button></div>
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