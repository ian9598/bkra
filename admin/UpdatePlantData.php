 
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../login/index.php');
}
else{

if(isset($_POST['submit']))
{	
	$ID = $_POST['ID'];
	$KINGDOM=$_POST['KINGDOM'];
	$PHYLUM=$_POST['PHYLUM'];
	$CLASS=$_POST['CLASS'];
	$ORDER_=$_POST['ORDER_'];
	$FAMILY=$_POST['FAMILY'];
	$GENUS=$_POST['GENUS'];
	$DESCRIPTION = $_POST['DESCRIPTION'];
	$SOURCES = $_POST['SOURCES'];
	$SN = $_POST['SN'];
	$LN = $_POST['LN'];
	$DISTRIBUTION = $_POST['DISTRIBUTION'];
   	$sql=mysqli_query($con,"UPDATE plant SET KINGDOM='" . $KINGDOM . "', PHYLUM='" . $PHYLUM . "', CLASS='" . $CLASS . "', ORDER_='" . $ORDER_ . "', FAMILY='" . $FAMILY . "', GENUS='" . $GENUS . "', DESCRIPTION='" . $DESCRIPTION . "', SOURCES='" . $SOURCES . "', SPECIES_NAME='" . $SN . "', LOCAL_NAME='" . $LN . "', DISTRIBUTION='" . $DISTRIBUTION . "' WHERE ID='" . $ID . "'");
	header('location:ManagePlantData.php?done=1');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Update Plant Data</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

<style>
 .customBtn{
	background-color: #D3D3D3;
}
 .customBtn:hover{
	background-color: #D3D3D3;
}
</style>

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
								<h3>Update Plant Data</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
									{?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
										</div>
							  <?php } ?>

									<br/>

								<form class="form-horizontal row-fluid" action="UpdatePlantData.php" method="post">

									<?php 

										$query=mysqli_query($con,"select * from plant where id='$_GET[id]'");
										while($row=mysqli_fetch_array($query))
										{ 
									?>	
										<div class="control-group">
											<label class="control-label" for="basicinput">Id</label>
											<div class="controls">
												<input type="text" name="ID" value="<?php echo ($row['ID']);?>" class="span8 tip" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Species Name</label>
											<div class="controls">
												<input type="text" name="SN"  class="span8 tip" value="<?php echo htmlentities($row['SPECIES_NAME']);?>">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Species Name</label>
											<div class="controls">
												<input type="text" name="LN"  class="span8 tip" value="<?php echo htmlentities($row['LOCAL_NAME']);?>">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Kingdom</label>
											<div class="controls">
												<input type="text" name="KINGDOM" value="<?php echo ($row['KINGDOM']);?>" class="span8 tip">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Phylum</label>
											<div class="controls">
												<input type="text" name="PHYLUM" value="<?php echo ($row['PHYLUM']);?>" class="span8 tip">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Class</label>
											<div class="controls">
												<input type="text" name="CLASS" value="<?php echo ($row['CLASS']);?>" class="span8 tip">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Order</label>
											<div class="controls">
												<input type="text" name="ORDER_" value="<?php echo ($row['ORDER_']);?>" class="span8 tip">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Family</label>
											<div class="controls">
												<input type="text" name="FAMILY" value="<?php echo ($row['FAMILY']);?>" class="span8 tip">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Genus</label>
											<div class="controls">
												<input type="text" name="GENUS" value="<?php echo ($row['GENUS']);?>" class="span8 tip">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Description</label>
											<div class="controls">
												<textarea name="DESCRIPTION"  class="span8 tip"><?php echo htmlentities($row['DESCRIPTION']);?></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Sources</label>
											<div class="controls">
												<textarea name="SOURCES"  class="span8 tip"><?php echo htmlentities($row['SOURCES']);?></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Distribution</label>
											<div class="controls">
												<textarea name="DISTRIBUTION"  class="span8 tip"><?php echo htmlentities($row['DISTRIBUTION']);?></textarea>
											</div>
										</div>
								 <?php } ?>						

										<div class="control-group">
											<div class="controls">
													<button type="submit" name="submit" class="customBtn">Update</button>
											</div>
										</div>
								</form>
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