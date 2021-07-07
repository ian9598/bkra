
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../login/index.php');
}
else{
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from users where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Data Have Been Delete !";
		  }
		  
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| View Biodiversity Data</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
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
								<h3>Current Biodiversity Data</h3>
							</div>

									<br/>

								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Product Name</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Availability</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from products");
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($row['id']);?></td>
											<td><?php echo htmlentities($row['productName']);?></td>
											<td><?php echo htmlentities($row['productPrice']);?></td>
											<td><?php echo htmlentities($row['productQuantity']);?></td>
											<td> <?php echo htmlentities($row['productAvailability']);?></td>
											<td><a href="updateAvailabilityStock.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
											    <a href="viewCurrentStock.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete this data?')"><i class="icon-remove-sign"></i></a></td></td>
										</tr>
<?php } ?>										
								</table>
							</div>
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
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>