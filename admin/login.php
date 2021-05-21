<?php
include('database.php');
$popup="";
#here we inclue conn.php page in this page. this is example Inheritance.
#that mean this is common code of database connection.
#we can inherit that code in each page. no need to write in every page.
#we can access veriable of included page in this page.
# $conn is a veriable in database.php we accessed that veriable in this progam below 

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		#declare veriable = $_POST['name of input in html form']; 
		#input is tag of html which is use to get information from user.
		#method to assign value of "HTML_form input" to "declare variable" in php
		
		$user_mail = $_POST['email'];
		#same here we created user mail veriable and then we assign value of "Mail" input of HTML form
		
		$user_pass = $_POST['password'];
		
		#query to insert data into database
		$user_data = mysqli_query($conn,"SELECT * FROM cms_admin WHERE admin_mail = '$user_mail' and admin_pass = '$user_pass'");
			# create a veriable and assign query to it as shown above
			#here we created veriable $user_log
			
			# This is format of select query
			#"SELECT FROM 'table name' where column_name = '$condition';
			#if there  5 column then >>>>>>> 5 condition to select data from table
			
		#this is condition. if user data successfully selected from table then if statement will execute
		#otherwise else statement will execute
		#this is query to check wether data is selected or not
		if ($row = mysqli_fetch_array($user_data)) {
			#format
			#$declare veriable name = mysqli_fetch_array($select query veriable name)
			session_start();
			#session is started
			$_SESSION['admin_ID'] = $row['admin_id'];
				#creating user session to manage user data. we are storing user_id in session to mantain logged in user session.
			header("Location:index.php");
			#header is use to move another page 
			#format
			#header("Location:'Link of page where we want to move'")
		} 
		else {
			#else condition 
			$popup = "Invalid Credential";
		}
			
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method="POST" action="">
                                        <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary btn-block text-white btn-user" value="submit" type="submit">Login</button>
                                        <hr><a class="btn btn-primary btn-block text-white btn-google btn-user" role="button"><i class="fab fa-google"></i>&nbsp; Login with Google</a><a class="btn btn-primary btn-block text-white btn-facebook btn-user" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Login with Facebook</a>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.html">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>