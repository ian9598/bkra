<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Search Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			font-size: 12px;
			color: #999
		}

		.search-result-item .description {
			font-size: 13px
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
			font-weight: 600;
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
                  <input type="text" placeholder="Search.." name="text" required>
                  <button type="submit" name="search"><i class="fa fa-search"></i></button>
                </form>
              </div>
        </div>
<div class="container">
<div class="row ng-scope">
    <div class="col-md-3 col-md-push-9">
       <!-- <h4>Results <span class="fw-semi-bold">Filtering</span></h4>
        <p class="text-muted fs-mini">Listed content is categorized by the following groups:</p>
        <ul class="nav nav-pills nav-stacked search-result-categories mt">
            <li><a href="#">Friends <span class="badge">34</span></a>
            </li>
            <li><a href="#">Pages <span class="badge">9</span></a>
            </li>
            <li><a href="#">Images</a>
            </li>
            <li><a href="#">Groups</a>
            </li>
            <li><a href="#">Globals <span class="badge">18</span></a>
            </li>
        </ul> -->
    </div>
    <div class="col-md-9 col-md-pull-3">
        <?php
						$start = microtime(true);
						require './vendor/autoload.php';
					    use writecrow\Lemmatizer\Lemmatizer;
						
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
						
						// words to be removed
						$stopwords = array('can'=>1,'i'=> 1,'it'=> 1,'its'=> 1,'plant'=> 1,
						'species'=> 1,'the'=> 1,'know'=> 1,'to'=> 1,'a'=> 1,'about'=> 1,
						'and'=> 1,'want'=> 1,'that'=>1,'family'=>1,'this'=>1,'is'=>1,'color'=>1,
						'me'=>1,'local'=>1,'name'=>1,'tree'=>1,'list'=>1,'of'=>1,'for'=>1,
						'local'=>1,'all'=>1,'start'=>1,'end'=>1,'has'=>1,'have'=>1,'why'=>1,
						'what'=>1,'when'=>1,'whom'=>1,'whose'=>1,'how'=>1,'order'=>1,'are'=>1,
						'class'=>1,'belong'=>1,'distribution'=>1,'flora'=>1,'in'=>1,'on'=>1,
						'into'=>1,'came'=>1,'did'=>1,'from'=>1,'with'=>1, 'reach'=>1, 'treat'=>1,
						'fruit'=>1, 'flower'=>1);
						
						# use words as key for better performance
						
						// tokenize and remove stopwords from string
						function strip_stopwords($str = "")
						{
						  global $stopwords;
						  
						  // 1.) break string into words
						  // split the phrase by any number of commas, colon, semicolon, 
						  // question and exclamation mark
						  // space characters include \r, \t, \n and \f
						  $words = preg_split("/[\s,:;?!]+/", $str);
						  
						  // 2.) remove stopwords
						  if(count($words) > 0)
						  {
							$words = array_filter($words, function ($w) use (&$stopwords) {
							  return !isset($stopwords[strtolower($w)]);
							});
						  } 
						  if(!empty($words))
							return implode(" ", $words);
						}
									
                        if(ISSET($_GET['search']))
                        {  
							if(ISSET($_GET['option']))
								$option = $_GET['option'];
							else
								$option = "All";
						
							$newToken = array();
                            $string = $_GET["text"];
							$AfterStopWords = strip_stopwords($string);
							$token = strtok($AfterStopWords, " ");
							$condition = '';
							
							while ($token !== false)
						   {
							   $newToken[] = Lemmatizer::getLemma($token);
							   $token = strtok(" ");
						   }
						   
						    require 'conn.php';

							if($option == "GenusName"){
								foreach($newToken as $keyword)
							   {
									$condition .= "GENUS LIKE '%".mysqli_real_escape_string($conn, $keyword)."%' OR ";
							   }
							}
							else if($option == "SpeciesName"){
								foreach($newToken as $keyword)
							   {
									$condition .= "SPECIES_NAME LIKE '%".mysqli_real_escape_string($conn, $keyword)."%' OR ";
							   }
							}
							else if($option == "LocalName"){
								foreach($newToken as $keyword)
							   {
									$condition .= "LOCAL_NAME LIKE '%".mysqli_real_escape_string($conn, $keyword)."%' OR ";
							   }
							}
							else if($option == "Description"){
								foreach($newToken as $keyword)
							   {
									$condition .= "DESCRIPTION LIKE '%".mysqli_real_escape_string($conn, $keyword)."%' OR ";
							   }
							}
							else if($option == "All"){
								foreach($newToken as $keyword)
							   {
									$condition .= "PHYLUM LIKE '%".mysqli_real_escape_string($conn, $keyword)."%' OR 
									CLASS LIKE '%".mysqli_real_escape_string($conn, $keyword)."%' OR 
									ORDER_ LIKE '%".mysqli_real_escape_string($conn, $keyword)."%' OR 
									FAMILY LIKE '%".mysqli_real_escape_string($conn, $keyword)."%' OR 
									GENUS LIKE '%".mysqli_real_escape_string($conn, $keyword)."%' OR 
									SPECIES_NAME LIKE '%".mysqli_real_escape_string($conn, $keyword)."%' OR 
									DESCRIPTION regexp '".mysqli_real_escape_string($conn, $keyword)."' OR
									DISTRIBUTION regexp '".mysqli_real_escape_string($conn, $keyword)."' OR
									LOCAL_NAME regexp '".mysqli_real_escape_string($conn, $keyword)."' OR ";
							   }
							}
							
							
						    $condition = substr($condition, 0, -4); //remove the last OR in the query
						    $query = "SELECT * FROM plant WHERE " . $condition; 
							$result = mysqli_query($conn, $query);							
                            
							if(!$result || mysqli_num_rows($result) == 0)
								$count = 0;
							else
								$count = mysqli_num_rows($result);
								
                            $highlight_word = implode (" ", $newToken);
							if($count > 0)
							{
								$time_elapsed_secs = microtime(true) - $start;
								$exe_time = round($time_elapsed_secs,3);
								echo "<p class='search-results-count'> About $count results found for '$string' ($exe_time seconds)</p>";
								//print_r ($newToken);
								while($fetch = mysqli_fetch_array($result)){
                        ?>
        <section class="search-result-item">
            <a class="image-link"><img class="image" src="../admin/Plant_Image/<?php echo htmlentities($fetch['ID']);?>/<?php echo htmlentities($fetch['PLANT_IMAGE']);?>" data-echo="../admin/Plant_Image/<?php echo htmlentities($fetch['ID']);?>/<?php echo htmlentities($fetch['PLANT_IMAGE']);?>" width="200" height="200">
            </a>
            <div class="search-result-item-body">
                <div class="row">
                    <div class="col-sm-9">
						<?php $Highlight_SN = !empty($highlight_word)?highlight_keywords($fetch['SPECIES_NAME'], $highlight_word):$fetch['SPECIES_NAME'];?>					
                        <h2 class="search-result-item-heading"><?php echo $Highlight_SN ?></h2>
                        <p class="info"></p>
						<?php $Highlight_localN = !empty($highlight_word)?highlight_keywords($fetch['LOCAL_NAME'], $highlight_word):$fetch['LOCAL_NAME'];?>
                        <h4><p><b><?php echo $Highlight_localN ?></b></p></h4>
						<?php $Highlight_description = !empty($highlight_word)?highlight_keywords($fetch['DESCRIPTION'], $highlight_word):$fetch['Description'];?>
                        <h4 style="text-align: justify"><p class="description"><?php echo $Highlight_description ?></p></h4>
                    </div>
                    <div class="col-sm-3 text-align-center">
                        <p class="value3 mt-sm"></p>
                        <p class="fs-mini text-muted"></p><a class="btn btn-primary btn-info btn-sm" href="view_detail.php?id=<?php echo $fetch['ID']?>&HW=<?php echo $highlight_word?>" style="background-color: #32CD32;">View Detail</a>
                    </div>
                </div>
            </div>
        </section>
        <?php
                  }
							}else { ?>
							 <section class="search-result-item">
								<div class="search-result-item-body">
									<div class="row">
										<div class="col-sm-9">
											<h2 class="search-result-item-heading">Result Not Found</h2>
										</div>
									</div>
								</div>
							 </section>	
								
							<?php }
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
<?php include('include/footer.php');?>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>