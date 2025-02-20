  <?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{


//code deletion
if(isset($_GET['delid']))
{
$rowid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from tbluser where ID='$rowid'");
if($query){
echo "<script>alert('User Record successfully deleted');</script>";
echo "<script>window.location.href='manage-users.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Management System || Manage Users</title>
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
				<li class="active">Users</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Users</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> 
						<?php if($msg){
										echo $msg;
									}  ?> </p>
						<div class="col-md-12">
							
							<div class="table-responsive">
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                <th><center>Sr.No</center></th>
                  <th><center>ID</center></th>
                  <th><center>Full Name</center></th>
                  <th><center>Email</center></th>
                  <th><center>MobileNumber</center></th>
                  <th><center>RegDate</center></th>
                  <th colspan="2"><center>Manage</center></th>
                </tr>
              </thead>
              <?php
              $userid=$_SESSION['detsuid'];
			$ret=mysqli_query($con,"select * from tbluser;");
			$cnt=1;
			while ($row=mysqli_fetch_array($ret)) {

			?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['ID'];?></td>
                  <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['Email'];?></td>
                  <td><?php  echo $row['MobileNumber'];?></td>
                  <td><?php  echo $row['RegDate'];?></td>
                  <td><center><a class="btn btn-primary" href="manage-users.php?delid=<?php echo $row['ID'];?>">Delete</a></center></td>
                  <td><center><a class="btn btn-primary" target="_blank" href="users-profile.php?viewid=<?php echo $row['ID'];?>">View</a></center></td>
                </tr>
                <?php 
				$cnt=$cnt+1;
				}?>
               
              </tbody>
            </table>
          </div>
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