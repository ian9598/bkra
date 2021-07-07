<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/styleAbout.css">
	<link href="css/footer.css" rel="stylesheet" />
    <style type="text/css">
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

	.topnav input[type=text] {
	  padding: 6px;
	  margin-top: 8px;
	  font-size: 17px;
	  border: none;
	}

	.topnav:hover {
	  background: #ccc;
	}

	@media screen and (max-width: 500px) {
	  .topnav .search-container {
		float: none;
	  }
	  .topnav a, .topnav input[type=text]{
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
	  
	</style>
</head>
<body>
    <div class="about-section">
	<div class="topnav">
		  <a href="index.php">Home</a>
		  <a class="active" href="About_Us.php">About</a>
		</div>
        <div class="inner-container">
            <h1>About Us</h1>
            <p class="text">
                Welcome to Biodiversity Knowledge Retrieval Application. This application aim to share knowledge
				to anyone that want to know more about biodiversity information. For now, this application only provide
				information about flora species that came from the Royal Belum State Park.<br>Below are the sources
				that this application refer to:
            </p>
            <div class="sources">
                <span>Royal Belum State Park</span>
                <span>Plants of the World Online (POWO)</span>
                <span>63 Tumbuhan Ubatan Book</span>
            </div>
        </div>
    </div>
</body>
</html>