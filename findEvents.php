<!DOCTYPE html>
<html lang="en">
<!--http://jqueryui.com/datepicker/-->
	<head>
	<title>About Us</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="loulou.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  <script type=\"text/javascript\" src=\"https://code.jquery.com/jquery-2.1.1.min.js\"></script>

	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
	<script src="js/jquery.stellar.js"></script>
	<script src="js/script.js"></script>
	<script src='//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false'></script>
	<!--[if (gt IE 9)|!(IE)]><!-->
	<script src="js/wow.js"></script>
	<script>
		$(document).ready(function () {
			if ($('html').hasClass('desktop')) {
				new WOW().init();
			}
		});
	</script>

	<!-- added by Stephanie. Script for dynamically changing the county options depending on province -->
	<script>
		function populate(s1,s2){
			var s1 = document.getElementById(s1);
			var s2 = document.getElementById(s2);
			s2.innerHTML = "";
			if(s1.value == "munster"){
				var optionArray = [ " | Pick a county", "cork|Cork","kerry|Kerry","limerick|Limerick","waterford|Waterford", "clare|Clare", "tipperary|Tipperary"];
			} else if(s1.value == "leinster"){
				var optionArray = [" | Pick a county","dublin|Dublin","carlow|Carlow","wicklow|Wicklow","wexford|Wexford","meath|Meath","louth|Louth", "kildare|Kildare", "kilkenny|Kilkenny", "meath|Meath", "westmeath|Westmeath", "longford|Longford", "laois|Laois", "offaly|Offaly"];
			} else if(s1.value == "ulster"){
				var optionArray = [ " | Pick a county","antrim|Antrim","armagh|Armagh","cavan|Cavan","derry|Derry","donegal|Donegal","down|Down", "fearmanagh|Fearmanagh","monaghan|Monaghan"];
			} else if (s1.value == "connacht"){
				var optionArray = [" | Pick a county","sligo|Sligo","galway|Galway","mayo|Mayo","leitrim|Leitrim", "roscommon|Roscommon"];
			}
			for(var option in optionArray){
				var pair = optionArray[option].split("|");
				var newOption = document.createElement("option");
				newOption.value = pair[0];
				newOption.innerHTML = pair[1];
				s2.options.add(newOption);
			}
		}
	</script>
	<!-- End of Stephanie's code -->
	
	<!--<![endif]-->
	<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
	 <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
		 <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
	 </a>
	</div>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
	</head>
	
<body class="index-1"  onload="load()">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<!-- Code added by Stephanie. Script for dynamically filtering events using AJAX. Found on W3Schools -->
<script>
function getData(county, genre, month) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getData.php?county="+county+"&genre="+genre+"&month="+month,true);
        xmlhttp.send();
}
</script>
<!-- End of Stephanie's code -->

<!--==============================header=================================-->
<header id="header">
	<div id="stuck_container">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<h1><a href="index.html">GetGig</a><span>Get tix, Get gigging</span></h1>
					<nav>
						<ul class="sf-menu">
							<li><a href="index.html">Home</a></li>
							<li class="current"><a href="index-1.html">My Profile</a></li>
							<li><a href="index-2.html">Find Gig</a></li>
							<li><a href="index-3.html">GigGuide</a></li>
							<li><a href="index-4.html">Contact Us</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>

<!--=======content================================-->

<section id="content">
	<div class="full-width-container block-1">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Find Events</span></h2>
					</header>
				</div>
				<div class="grid_4">
						 <!--<div id="map" style="width: 500px; height: 300px"></div>-->
						 <!-- Nikki's code -->
						 	<div id=\"map_wrapper\">
								<div id=\"map_canvas\" class=\"mapping\"></div>
							</div>
						<!--end of nikki's code-->
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-2 parallax-block" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Event List</span></h2>
					</header>
				</div>
					<form>
					<select id="province" name="province" onchange="populate(this.id,'county')">
						<option value="">Select a province</option>
  						<option value="munster">Munster</option>
 						<option value="leinster">Leinster</option>
  						<option value="connacht">Connacht</option>
  						<option value="ulster">Ulster</option>
					</select>
					
					<select id= "county" name="county">
					</select>
				
					<p><select id="genre" name="genre">
						<option value="">Select a genre</option>
  						<option value="pop">Pop</option>
 						<option value="rock">Rock</option>
  						<option value="jazz">Jazz</option>
  						<option value="hip hop">Hip-Hop</option>
						<option value="country">Country</option>
						<option value="trad">Trad</option>
						<option value="opera">Opera</option>
						<option value="reggae">Reggae</option>	
						<option value="soul">Soul</option>	
					</select></p>
					
					<p><select id="month" name="month">
						<option value="">Select a month</option>
  						<option value="1">January</option>
 						<option value="2">Febuary</option>
  						<option value="3">March</option>
  						<option value="4">April</option>
  						<option value="5">May</option>
  						<option value="6">June</option>
  						<option value="7">July</option>
  						<option value="8">August</option>
  						<option value="9">September</option>
  						<option value="10">October</option>
  						<option value="11">November</option>
  						<option value="12">December</option>
					</select></p>
					
					<button name="data" type="button" onclick="getData(county.value, genre.value, month.value)">Search</button>
					<button name="reset" type="button" onclick="reset()">Reset</button>
				</form>
				
				<div id="txtHint">
		<?php
			/*** connect to database ***/	

			/*** mysql hostname ***/
			$servername = 'localhost';

			/*** mysql username ***/
			$username = 'fzs1';

			/*** mysql password ***/
			$password = 'ruraigop';

			/*** database name ***/
			$dbname = '2017_project_GETGIG';
			try
			{
						
						$dbconnection = mysql_connect($servername, $username, $password);
						 if ( ! $dbconnection )
						 {
							die('Unable to connect!');
						 }
							
						 // Try to select database
						 $dbselection = mysql_select_db($dbname);
						 if ( ! $dbselection )
						 {
							die('Unable to select database');
						 }	

						

						// Execute the query 
						/* ----- Query created by Stephanie ---*/ 
						$data = mysql_query("SELECT events.eTitle, artists.Aname, events.startDate, events.eType, venues.vName, venues.county, tickets.ticketsLeft
							FROM venues JOIN events JOIN performsAt JOIN artists JOIN tickets
							ON  events.eVenueID = venues.venue_id AND performsAt.eventID = events.eID AND performsAt.artistID = artists.artist_id AND events.eID = tickets.tEventID
							 ;");
						
								
					//add start date and end date to display table
					/*------- code added by Stephanie --------*/
					if (mysql_num_rows($data) == 0) 
					{
						die("Your search result is empty? Are you sure you searched something?" .mysql_error());
					}
					else{
						echo '<table id="table">
								<tr class="headings">
								<th>Name</th>
								<th>Artist</th>
								<th>Type</th>
								<th>Venue</th>
								<th>County</th>
								<th>Date</th>
								<th> Tickets </th>
								</tr>';
						while($row = mysql_fetch_assoc($data))
						{
							//display buy now button only when tickets are available 
							if($row['ticketsLeft'] == 0){
								$buyTickets = "SOLD OUT!";
							}
							else{
								$buyTickets = "<a href='purchaseTicket.php'>Buy Now!</a>";
							}
							echo"<tr>";
								echo "<td>".$row['eTitle']."</td>";
								echo "<td>".$row['Aname']."</td>";
								echo "<td>" .$row['eType'] . " </td>";
								echo "<td>". $row['vName'] . " </td>";
								echo "<td>". $row['county'] .  "</td>";
								echo "<td>". $row['startDate'] . "</td>";
								echo "<td >". $row['ticketsLeft']." left ".$buyTickets."  </td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					/*----- end of Stephanie's code ------*/
					mysql_close($dbconnection);
			}
			catch(Exception $e)
			{
				/*** if we are here, something has gone wrong with the database ***/
				$message = 'We are unable to process your request. Please try again later ';
			}
			?>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-3">
		<div class="container">
			<div class="row">
				<div class="grid_12" >
					<header>
						<h2><span>Why Choose Us</span></h2>
					</header>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">1</span></div>
					<div class="grid_3" id = "test">
						<p>Gamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur orci sed </p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra"></span></div>
					<div class="grid_3">
						<p>Kamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur orci sed </p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">3</span></div>
					<div class="grid_3">
						<p>Tamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur orci se </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--=======footer=================================-->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="grid_12 copyright">
				<h2><span>Media Center</span></h2>
				<div class="fb-page" data-href="https://www.facebook.com/getgigpromotions" data-tabs="timeline" data-width="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/getgigpromotions"><a href="https://www.facebook.com/getgigpromotions">Get Gig</a></blockquote></div></div>
				<a class="twitter-timeline" width = 300 height = 300 href="https://twitter.com/getgigpromotion" data-widget-id="691618458417635328">Tweets by @getgigpromotion</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				<a href="#" class="btn bd-ra"><span class="fa fa-google-plus"></span></a>
				<pre>© <span id="copyright-year"></span> |  Privacy Policy</pre>
			</div>
		</div>
	</div>
	<div class="footer_bottom"><a href="http://www.templatemonster.com/" rel="nofollow"><img src="images/footer-logo.png" alt="logo"></a></div>
</footer>
<script>
	$(document).ready(function() { 
			if ($('html').hasClass('desktop')) {
				$.stellar({
					horizontalScrolling: false,
					verticalOffset: 20,
					resposive: true,
					hideDistantElements: true,
				});
			}
		});	
</script>

</body>
</html>