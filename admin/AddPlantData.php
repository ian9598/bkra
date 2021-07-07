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
	$PLANT_IMAGE=$_FILES["plantImage"]["name"];
	
	//for getting plant id
	$query=mysqli_query($con,"select max(id) as pid from plant");
	$result=mysqli_fetch_array($query);
	$plant_id=$result['pid']+1;
	
	$dir="Plant_Image/$plant_id";
	if(!is_dir($dir)){
		mkdir("Plant_Image/".$plant_id);
	}
	
	move_uploaded_file($_FILES["plantImage"]["tmp_name"],"Plant_Image/$plant_id/".$_FILES["plantImage"]["name"]);
	
	$sql=mysqli_query($con,"insert into plant(KINGDOM,PHYLUM,CLASS,ORDER_,FAMILY,GENUS,DESCRIPTION,SOURCES,SPECIES_NAME,LOCAL_NAME,DISTRIBUTION,PLANT_IMAGE) values('$KINGDOM','$PHYLUM','$CLASS','$ORDER_','$FAMILY','$GENUS','$DESCRIPTION','$SOURCES','$SN','$LN','$DISTRIBUTION','$PLANT_IMAGE')");
	$_SESSION['msg']="Successfully added the information";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Add Plant Data</title>
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
								<h3>Add Plant Data</h3>
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

<form class="form-horizontal row-fluid" method="post" action="AddPlantData.php" enctype="multipart/form-data">

<div class="control-group">
<label class="control-label" for="basicinput">Species Name</label>
<div class="controls">
<input type="text" name="SN"  placeholder="Enter species name" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Local Name</label>
<div class="controls">
<input type="text" name="LN"  placeholder="Enter local name" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Kingdom</label>
<div class="controls">
<input type="text" name="KINGDOM"  placeholder="Enter kingdom name" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Phylum</label>
<div class="controls">
<input type="text" name="PHYLUM"  placeholder="Enter phylum name" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Class</label>
<div class="controls">
<input type="text" name="CLASS"  placeholder="Enter class name" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Order</label>
<div class="controls">
<input type="text" name="ORDER_"  placeholder="Enter order name" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Family</label>
<div class="controls">
<input type="text" name="FAMILY"  placeholder="Enter family name" class="span8 tip" required>
</div>
</div>
									
<div class="control-group">
<label class="control-label" for="basicinput">Genus</label>
<div class="controls">
<input type="text" name="GENUS"  placeholder="Enter genus name" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Description</label>
<div class="controls">
<textarea name="DESCRIPTION"  placeholder="Enter description" class="span8 tip" required></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Sources</label>
<div class="controls">
<textarea name="SOURCES"  placeholder="Enter sources" class="span8 tip" required></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Distribution</label>
<div class="controls">
<textarea name="DISTRIBUTION"  placeholder="Enter distribution" class="span8 tip" required></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Plant Image</label>
<div class="controls">
<input type="file" name="plantImage" class="span8 tip">
</div>
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="customBtn">Add</button>
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
</body>
<?php } ?>