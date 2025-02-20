<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
  	$fname=$_POST['name'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' ");
    $result=mysqli_fetch_array($ret);
    if($result>0){
		$msg="This email  associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName, MobileNumber, Email,  Password) value('$fname', '$mobno', '$email','$password' )");
   if($query){
echo "<script>alert('User has been added');</script>";
echo "<script>window.location.href='manage-users.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

    }
}
}

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Management System|| Add Users</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
}

</script>
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Expense</li>
			</ol>
		</div><!--/.row-->




		<div class="row">
			<div class="col-lg-12">



				<div class="panel panel-default">
					<div class="panel-heading">Expense</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
								echo $msg;
							}  ?> </p>
						<div class="col-md-12">

							<form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">
								<div class="form-group">
								<input class="form-control" placeholder="Full Name" name="name" type="text" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" required="true">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required="true">
							</div>
							<div class="checkbox" width="200px" align="center">
								<button type="submit" value="submit" name="submit" class="btn btn-primary">Add / Register</button>

							</div>

							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php include_once('includes/footer.php');?>
		</div><!-- /.row -->
	</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

</body>
</html>
<?php }  ?>

