<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Management System - Dashboard</title>
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
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		
		
		
		<div class="row">
			<div class="col-xs-6 col-md-3">
				
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
<?php
//Today Users
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select count(*) as todaysuser from tbluser where RegDate='$tdate';");
$result=mysqli_fetch_array($query);
$sum_today_user=$result['todaysuser'];
 ?> 

						<h4>Today's Users</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today_user;?>" ><span class="percent"><?php if($sum_today_user==""){
echo "0";
} else {
echo $sum_today_user;
}

	?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Yestreday Expense
$userid=$_SESSION['detsuid'];
$ydate=date('Y-m-d',strtotime("-1 days"));
$query1=mysqli_query($con,"select count(*) as yesterdayuser from tbluser where RegDate='$ydate';");
$result1=mysqli_fetch_array($query1);
$sum_yesterday_user=$result1['yesterdayuser'];
 ?> 
					<div class="panel-body easypiechart-panel">
						<h4>Yesterday's Users</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $sum_yesterday_user;?>" ><span class="percent"><?php if($sum_yesterday_user==""){
echo "0";
} else {
echo $sum_yesterday_user;
}

	?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Weekly Expense
$userid=$_SESSION['detsuid'];
 $pastdate=  date("Y-m-d", strtotime("-1 week")); 
$crrntdte=date("Y-m-d");
$query2=mysqli_query($con,"select count(*) as weeklyuser from tbluser where RegDate between '$pastdate' and '$crrntdte';");
$result2=mysqli_fetch_array($query2);
$sum_weekly_user=$result2['weeklyuser'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Last 7day's Users</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly_user;?>"><span class="percent"><?php if($sum_weekly_user==""){
echo "0";
} else {
echo $sum_weekly_user;
}

	?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Monthly Expense
$userid=$_SESSION['detsuid'];
$monthdate= date("Y-m-d", strtotime("-1 month"));
$crrntdte=date("Y-m-d");
$query3=mysqli_query($con,"select count(*) as monthlyuser from tbluser where RegDate between '$monthdate' and '$crrntdte';");
$result3=mysqli_fetch_array($query3);
$sum_monthly_user=$result3['monthlyuser'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Last 30day's Users</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly_user;?>" ><span class="percent"><?php if($sum_monthly_user==""){
echo "0";
} else {
echo $sum_monthly_user;
}

	?></span></div>
					</div>
				</div>
			</div>
		
		</div><!--/.row-->
			<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Yearly Expense
$userid=$_SESSION['detsuid'];
$cyear= date("Y");
$query4=mysqli_query($con,"select count(*) as yearlyuser from tbluser where year(RegDate)='$cyear';");
$result4=mysqli_fetch_array($query4);
$sum_yearly_user=$result4['yearlyuser'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Current Year Users</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_yearly_user;?>" ><span class="percent"><?php if($sum_yearly_user==""){
echo "0";
} else {
echo $sum_yearly_user;
}

	?></span></div>


					</div>
				
				</div>

			</div>

		<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Yearly Expense
$userid=$_SESSION['detsuid'];
$query5=mysqli_query($con,"select count(*)  as totaluser from tbluser;");
$result5=mysqli_fetch_array($query5);
$sum_total_user=$result5['totaluser'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Total Users</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_total_user;?>" ><span class="percent"><?php if($sum_total_user==""){
echo "0";
} else {
echo $sum_total_user;
}

	?></span></div>


					</div>
				
				</div>

			</div>


		</div>

		<!--/.row-->
	</div>	<!--/.main-->
	<?php include_once('includes/footer.php');?>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>
<?php } ?>
