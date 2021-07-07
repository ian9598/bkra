<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link href="css/zoom.css" rel="stylesheet" />
	<link href="css/footer.css" rel="stylesheet" />
    <style type="text/css">
body{
    margin-top:5px;
    background-color: #eee;
    font-family: Arial, Helvetica, sans-serif;
}

.search-result-categories>li>a {
    color: #b6b6b6;
    font-weight: 400
}

.search-result-categories>li>a:hover {
    background-color: #ddd;
    color: #555
}

.search-result-categories>li>a>.glyphicon {
    margin-right: 5px
}

.search-result-categories>li>a>.badge {
    float: right
}

.search-results-count {
    margin-top: 10px
}

.search-result-item {
    padding: 20px;
    background-color: #fff;
    border-radius: 4px
}

.search-result-item:after,
.search-result-item:before {
    content: " ";
    display: table
}

.search-result-item:after {
    clear: both
}

.search-result-item .image-link {
    display: block;
    overflow: hidden;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px
}

@media (min-width:768px) {
    .search-result-item .image-link {
        display: inline-block;
        margin: -20px 0 -20px -20px;
        float: left;
        width: 200px
    }
}

@media (max-width:767px) {
    .search-result-item .image-link {
        max-height: 200px
    }
}

.search-result-item .image {
    max-width: 100%
}

.search-result-item .info {
    margin-top: 2px;
    font-size: 14px;
    font-style: oblique;
    font-weight: bold;
    color: #32CD32;
	margin-top: 20px;
}

.search-result-item .description {
    font-size: 16px;
    text-align: justify;
}

.search-result-item+.search-result-item {
    margin-top: 20px
}

@media (min-width:768px) {
    .search-result-item-body {
        margin-left: 200px
    }
}

.search-result-item-heading {
    font-weight: bold;
}

.search-result-item-heading>a {
    color: #555
}

@media (min-width:768px) {
    .search-result-item-heading {
        margin: 0
    }
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

* {box-sizing: border-box;}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #32CD32;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
  
}
.footer {
	color: #999;
	padding: 30px 0 60px
}
.footer .nav li {
	float: left
}
.footer .nav li+li {
	margin-left: 30px
}
.footer .nav li a {
	color: inherit
}
.footer .nav li a:hover {
	color: #555
}
</style>
</head>
<body>
 <div class="topnav">
          <a class="active" href="index.php">Home</a>
          <a href="About_Us.php">About</a>
              <div class="search-container">
                <form action="result_page.php">
                  <input type="text" placeholder="Search.." name="keyword">
                  <button type="submit" name="search"><i class="fa fa-search"></i></button>
                </form>
              </div>
        </div>
<div class="container"><br>
<div class="row ng-scope">
    <div class="col-md-3 col-md-push-9">
    </div>
    <div class="col-md-9 col-md-pull-3">
        <?php
                            $id = $_GET['id'];
							
							if(isset($_GET['HW']))
								$HW = $_GET['HW'];
							else
								$HW = null;
								
                            require 'conn.php';
							
							// Highlight words in text
							function highlight_keywords($text, $keyword) {
								$wordsArray = explode(" ", $keyword);
								$wordsCount = count($wordsArray);
								
								for($i=0;$i<$wordsCount;$i++) {
									$highlighted_text = "<span style='font-weight:bold;background-color: #90ee90;'>$wordsArray[$i]</span>";
									$text = str_ireplace($wordsArray[$i], $highlighted_text, $text);
								}
						 
								return $text;
							}
							
                            $query = mysqli_query($conn, "SELECT * FROM `plant` WHERE `ID` = '$id'") or die(mysqli_error());
                            $count = mysqli_num_rows($query);
                            while($fetch = mysqli_fetch_array($query)){
                        ?>
        <section class="search-result-item">
	<?php if($HW != null)
			echo "<div style='float:right;'><a href='view_detail.php?id=".$id."' data-toggle='tooltipUpd' title='Clear Highlight Words' type='button' name='clear'>X</a></div><br><br>";	
	?>
            <center><img class="image" id="myImg" alt="<?php echo $fetch['SPECIES_NAME']?>" src="../admin/Plant_Image/<?php echo $id;?>/<?php echo htmlentities($fetch['PLANT_IMAGE']);?>" data-echo="../admin/Plant_Image/<?php echo $id;?>/<?php echo htmlentities($fetch['PLANT_IMAGE']);?>" width="550" height="350"></center>
            <div id="myModal" class="modal">
					<span class="close">&times;</span>
					<img class="modal-content" id="img01">
					<div id="caption"></div>
			</div>
			<div class="search-result-item-body">
                <div class="row">
                    <div class="col-sm-9">
                        <p class="info">Species Name:</p>
						<?php $Highlight_SN = !empty($HW)?highlight_keywords($fetch['SPECIES_NAME'], $HW):$fetch['SPECIES_NAME'];?>
                        <h2 class="search-result-item-heading"><?php echo $Highlight_SN ?></a></h2>
						<p class="info">Local Name:</p>
						<?php $Highlight_LN = !empty($HW)?highlight_keywords($fetch['LOCAL_NAME'], $HW):$fetch['LOCAL_NAME'];?>
                        <h4><p><?php echo $Highlight_LN ?></p></h4>
						<p class="info">Kingdom:</p>
                        <h4><p><?php echo $fetch['KINGDOM']?></p></h4>
						<p class="info">Phylum:</p>
						<?php $Highlight_P = !empty($HW)?highlight_keywords($fetch['LOCAL_NAME'], $HW):$fetch['LOCAL_NAME'];?>
                        <h4><p><?php echo $Highlight_P ?></p></h4>
						<p class="info">Class:</p>
						<?php $Highlight_C = !empty($HW)?highlight_keywords($fetch['CLASS'], $HW):$fetch['CLASS'];?>
                        <h4><p><?php echo $Highlight_C ?></p></h4>
						<p class="info">Order:</p>
						<?php $Highlight_O = !empty($HW)?highlight_keywords($fetch['ORDER_'], $HW):$fetch['ORDER_'];?>
                        <h4><p><?php echo $Highlight_O ?></p></h4>
                        <p class="info">Family:</p>
						<?php $Highlight_F = !empty($HW)?highlight_keywords($fetch['FAMILY'], $HW):$fetch['FAMILY'];?>
                        <h4><p><?php echo $Highlight_F ?></p></h4>
						<p class="info">Genus</p>
						<?php $Highlight_G = !empty($HW)?highlight_keywords($fetch['GENUS'], $HW):$fetch['GENUS'];?>
                        <h4><p class="description"><?php echo $Highlight_G ?></p></h4>
                        <p class="info">Description:</p>
						<?php $Highlight_description = !empty($HW)?highlight_keywords($fetch['DESCRIPTION'], $HW):$fetch['DESCRIPTION'];?>
                        <h4><p class="description"><?php echo $Highlight_description?></p></h4>
						<p class="info">Distribution:</p>
						<?php $Highlight_distribution = !empty($HW)?highlight_keywords($fetch['DISTRIBUTION'], $HW):$fetch['DISTRIBUTION'];?>						
                        <h4><p class="description"><?php echo $Highlight_distribution ?></p></h4>
                        <p class="info">Sources:</p>
                        <h4><p class="description"><?php echo $fetch['SOURCES']?></p></h4>
                    </div>
                </div>
            </div>
        </section
        <?php
                  }
        ?>
        <div class="text-align-center">
           <!-- <ul class="pagination pagination-sm">
                <li class="disabled"><a href="#">Prev</a>
                </li>
                <li class="active"><a href="#">1</a>
                </li>
                <li><a href="#">2</a>
                </li>
                <li><a href="#">3</a>
                </li>
                <li><a href="#">4</a>
                </li>
                <li><a href="#">5</a>
                </li>
                <li><a href="#">Next</a>
                </li>
            </ul> -->
        </div>
    </div>
</div>
</div>
<?php include('include/footer.php');?>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the image and insert it inside the modal - use its "alt" text as a caption
	var img = document.getElementById("myImg");
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");
	img.onclick = function(){
	  modal.style.display = "block";
	  modalImg.src = this.src;
	  captionText.innerHTML = this.alt;
	}

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
	  modal.style.display = "none";
	}
</script>
</body>
</html>