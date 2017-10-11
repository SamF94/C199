<?php
//this is here to give us access to the query function.
require_once "model.inc";
?>

	<!-- This is the index page! -->
<html>
	<head>
		<title> Oddities Inc. </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<script src="http://deepblue.cs.camosun.bc.ca/~comp19905/FrontEnd/Code/backstretch.js"></script>-->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="/jquery.backstretch.min.js"></script>
		<script type="text/javascript">$.backstretch("http://dl.dropbox.com/u/515046/www/garfield-interior.jpg", {speed:150});</script>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
	<style>
	<!-- NavBar -->
	.affix {
		top: 0;
		width: 100%;
	  }

	.affix + .container-fluid {
		padding-top: 10px;
	  }
		
	h1 {
		text-align: center; 
	}
	
	body{
		background: -webkit-linear-gradient(left, rgba(204, 255, 255,0), rgba(204, 255, 255,2)); /* For Safari 5.1 to 6.0 */
		background: -o-linear-gradient(right, rgba(204, 255, 2550), rgba(204, 255, 255,2)); /* For Opera 11.1 to 12.0 */
		background: -moz-linear-gradient(right, rgba(204, 255, 255,0), rgba(204, 255, 255,2)); /* For Firefox 3.6 to 15 */
		background: linear-gradient(to right, rgba(204, 255, 255,0), rgba(204, 255, 255,2)); /* Standard syntax (must be last) */
	}
	
	.footer {
	  position: relative;
	  right: 0;
	  bottom: 0;
	  left: 0;
	  padding: 1rem;
	  background: #efefef;
	  background: -webkit-linear-gradient(left, rgba(135,206,250,0), rgba(135,206,250,2)); /* For Safari 5.1 to 6.0 */
	  background: -o-linear-gradient(right, rgba(135,206,250,0), rgba(135,206,250,2)); /* For Opera 11.1 to 12.0 */
	  background: -moz-linear-gradient(right, rgba(135,206,250,0), rgba(135,206,250,2)); /* For Firefox 3.6 to 15 */
	  background: linear-gradient(to right, rgba(135,206,250,0), rgba(135,206,250,2)); /* Standard syntax (must be last) */
	  text-align: center;
	}
	#AbNavBar{
		height:75px;
		background: #87ceeb;
		background: -webkit-linear-gradient(left, rgba(135,206,250,0), rgba(135,206,250,2)); /* For Safari 5.1 to 6.0 */
		background: -o-linear-gradient(right, rgba(135,206,250,0), rgba(135,206,250,2)); /* For Opera 11.1 to 12.0 */
		background: -moz-linear-gradient(right, rgba(135,206,250,0), rgba(135,206,250,2)); /* For Firefox 3.6 to 15 */
		background: linear-gradient(to right, rgba(135,206,250,0), rgba(135,206,250,2)); /* Standard syntax (must be last) */
		color:#fff;
		
	}
	
	</style>
	<body>
		<table width="100%" height = "100%" cellpadding="15">
		
	
  <div id="AbNavBar" class = "container-fluid">
			<h1>Oddities Inc</h1>
		</div>		
				

		<nav class= "navbar navbar-default">
			<div class="container-fluid">
			
				<!-- LOGO -->
				<div class="navbar-header">
					<a href="index.html" class="navbar-brand"> Oddities Inc.</a>
				</div>
				
				<!-- MENU ITEMS -->
				<div>
					<ul class ="nav navbar-nav">
						<li class = "active"><a href="index.html"> Home </a></li>
						<li><a href="about.html"> About </a></li>
						
						<!-- Drop down bitches -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Products <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="food.php"> Food </a></li>
								<li><a href="satanic.php"> Satanic </a></li>
								<li><a href="pagan.php"> Pagan </a></li>
								<li><a href="creepy.php"> Creepy </a></li>
								<li><a href="cruel.php"> Cruel </a></li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
			
			
			<tr>
			

				<td width="460">
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<center><h1><b><u>Creepy</u></b></h1>
					<p>If you must...</p>
					<table border = "2" cellpadding="15" table id="T1">

						<?php

							/*
								This PHP section is going to:
									1: Send and receive stuff to and from the database.
									2: iterate through the response stuff
									3: output it to match Tyler's original format, as shown below

									<tr>
										<td>
										<a href="deepblue.cs.camosun.bc.ca/cst528/Comp199/FrontEnd/Code/figgin.html"><img src= "../Images/Food/figgin.jpg" style="float:left;"><a>
										</td>

										<td>
										<p>Description: A Tasty Snack! </p>
										<p>Price: $3.99
										</td>
									</tr>
							*/
							$inputs[0] = "*";
							$inputs[1] = "Products";
							$inputs[2] = "ProductCategories_ProdCatID = 4";// replace the contents of these quotes with a the contents of a where clause on the theme of prodCatID = 1, this is one of the things I couldn't make work.

							//This calls a function in model which returns the mess of 
							$items = query($inputs);
							//print_r($items);
/* 							for ($i=0; $i < 2; $i++){
								print($items['outValue' => $i]);
							} */
							
							if (empty($items) or $items == null){
								print("<p>You stuped</p>");
							} else {
								//for all the returned rows, if any value is not set, set it to an empty string.
								foreach ($items['outValue'] as $i) {
									foreach($i as $key => $value){
										if(!isset($i[$key])){
											$i[$key] = "";
										}
									}

								}
								//print the survivors.
								foreach ($items['outValue'] as $i => $row){
									print("<tr><td>");
									print("<img src= \"" . $row[2] . "\" style=\"float:left;\">");//the part that reads "../Images/Food/figgin.jpg" also needs to be repalced with somethign from the items array, but I don't know what.
									print("</td><td>");
									print("<p>Title: $row[1]</p>");
									print("<p>Description: $row[4]</p>"); 
									print("<p>Price: $$row[3]</p>");
									print("<a href=\"shoppingCart.php?additem={$row[0]}\">Add to Cart</a>");
									print(" ");
									print("<img src=\"http://www.tapestrie.com/images/shopping-cart-icon-black.png\">");
									print("</td></tr>");
								}
							}
						?>
					<p>&nbsp;</p></td>
				</table></center>
			</tr>
		
		</table>

		<div class = "footer">
			&copy; Dylan Burton, Sam Faris, Tyler Francis, Soren Childs 2016
		</div>

	</body>
</html>



