
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
		header('location:../login/index.php');
	}
	else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Dashboard</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="css/custom.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/adminHeader.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<?php include('include/adminSidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Dashboard</h3>
							</div>
							<center><div class="module-body">
							<h1 style="color:black;">Summary of Data based on Taxanomy Rank</h1>
							<div class="dashbord dashbord-green">
									<div class="textColor">
										<h2>Number of Phylum</h2>
										<i><h1><?php $query=mysqli_query($con,"select count(distinct(PHYLUM)) as Phy from  plant");
												   while($row=mysqli_fetch_array($query))
												   {
													   echo htmlentities($row['Phy']);
												   }?></h1></i>
										<div class="detail-section">
											<a href="adminViewDetail.php?Opt=PHYLUM">View Details</a>
										</div>
									</div>
								</div>
							<div class="dashbord dashbord-green">
									<div class="textColor">
										<h2>Number of Class</h2>
										<i><h1><?php $query=mysqli_query($con,"select count(distinct(CLASS)) as Cla from  plant");
												   while($row=mysqli_fetch_array($query))
												   {
													   echo htmlentities($row['Cla']);
												   }?></h1></i>
										<div class="detail-section">
											<a href="adminViewDetail.php?Opt=CLASS">View Details</a>
										</div>
									</div>
								</div>
								<div class="dashbord dashbord-green">
									<div class="textColor">
										<h2>Number of Order</h2>
										<i><h1><?php $query=mysqli_query($con,"select count(distinct(ORDER_)) as Ord from  plant");
												   while($row=mysqli_fetch_array($query))
												   {
													   echo htmlentities($row['Ord']);
												   }?></h1></i>
										<div class="detail-section">
											<a href="adminViewDetail.php?Opt=ORDER_">View Details</a>
										</div>
									</div>
								</div>
								<div class="dashbord dashbord-green">
									<div class="textColor">
										<h2>Number of Family</h2>
										<i><h1><?php $query=mysqli_query($con,"select count(distinct(FAMILY)) as Fam from  plant");
												   while($row=mysqli_fetch_array($query))
												   {
													   echo htmlentities($row['Fam']);
												   }?></h1></i>
										<div class="detail-section">
											<a href="adminViewDetail.php?Opt=FAMILY">View Details</a>
										</div>
									</div>
								</div>
								<div class="dashbord dashbord-green">
									<div class="textColor">
										<h2>Number of Genus</h2>
										<i><h1><?php $query=mysqli_query($con,"select count(distinct(GENUS)) as Gen from  plant");
												   while($row=mysqli_fetch_array($query))
												   {
													   echo htmlentities($row['Gen']);
												   }?></h1></i>
										<div class="detail-section">
											<a href="adminViewDetail.php?Opt=GENUS">View Details</a>
										</div>
									</div>
								</div>
								<div class="dashbord dashbord-green">
									<div class="textColor">
										<h2>Number of Species</h2>
										<i><h1><?php $query=mysqli_query($con,"select count(distinct(SPECIES_NAME)) as SN from  plant");
												   while($row=mysqli_fetch_array($query))
												   {
													   echo htmlentities($row['SN']);
												   }?></h1></i>
										<div class="detail-section">
											<a href="adminViewDetail.php?Opt=SPECIES_NAME">View Details</a>
										</div>
									</div>
								</div>
							</div><center>
						</div>
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<?php include('include/footer.php');?>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
<?php } ?>