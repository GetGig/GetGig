<!--Code added by Stephanie. Code for retrieving results from database depending on selected filters. Initial code found on W3Schools -->
<!DOCTYPE html>
<html>
<head>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize"></script>

</head>
<body>

<?php
//the value of the option selected
$county = $_GET['county'];
$genre =$_GET['genre'];
$month = $_GET['month'];

// Connect to database server
mysql_connect("localhost",'fzs1', 'ruraigop') or die (mysql_error ());

// Select database
mysql_select_db( '2017_project_GETGIG') or die(mysql_error());
	if ($genre =="" && $county =="" &&  $month ==""){ //display all 
		$strSQL="SELECT events.eTitle, artists.Aname, events.startDate, events.eType, venues.vName, venues.county, tickets.ticketsLeft
							FROM venues JOIN events JOIN performsAt JOIN artists JOIN tickets
							ON  events.eVenueID = venues.venue_id AND performsAt.eventID = events.eID AND performsAt.artistID = artists.artist_id AND events.eID = tickets.tEventID;";
	}
	else if ($genre =="" && $county ==""){ //month works 
		$strSQL = "SELECT events.eTitle, artists.Aname, events.startDate, events.eType, venues.vName, venues.county, tickets.ticketsLeft
							FROM venues JOIN events JOIN performsAt JOIN artists JOIN tickets
							ON  events.eVenueID = venues.venue_id AND performsAt.eventID = events.eID AND performsAt.artistID = artists.artist_id AND events.eID = tickets.tEventID
							WHERE MONTH(startDate) =".$month.";";
	}
	else if($genre =="" && $month ==""){ //county works 
			$strSQL = "SELECT events.eTitle, artists.Aname, events.startDate, events.eType, venues.vName, venues.county, tickets.ticketsLeft
							FROM venues JOIN events JOIN performsAt JOIN artists JOIN tickets
							ON  events.eVenueID = venues.venue_id AND performsAt.eventID = events.eID AND performsAt.artistID = artists.artist_id AND events.eID = tickets.tEventID
							WHERE county = '".$county."';";
	
	}
	else if($county =="" && $month ==""){ // genre works	
		$strSQL = "SELECT events.eTitle, artists.Aname, events.startDate, events.eType, venues.vName, venues.county, tickets.ticketsLeft
							FROM venues JOIN events JOIN performsAt JOIN artists JOIN tickets
							ON  events.eVenueID = venues.venue_id AND performsAt.eventID = events.eID AND performsAt.artistID = artists.artist_id AND events.eID = tickets.tEventID
							 WHERE genres = '".$genre."'";
	}
	else if($month ==""){// country and genre 
		$strSQL = "SELECT events.eTitle, artists.Aname, events.startDate, events.eType, venues.vName, venues.county, tickets.ticketsLeft
							FROM venues JOIN events JOIN performsAt JOIN artists JOIN tickets
							ON  events.eVenueID = venues.venue_id AND performsAt.eventID = events.eID AND performsAt.artistID = artists.artist_id AND events.eID = tickets.tEventID
							 WHERE county = '".$county."' AND genres = '".$genre."';";
	}
	else if($county ==""){
			$strSQL = "SELECT events.eTitle, artists.Aname, events.startDate, events.eType, venues.vName, venues.county, tickets.ticketsLeft
							FROM venues JOIN events JOIN performsAt JOIN artists JOIN tickets
							ON  events.eVenueID = venues.venue_id AND performsAt.eventID = events.eID AND performsAt.artistID = artists.artist_id AND events.eID = tickets.tEventID
							 WHERE genres = '".$genre." 'AND MONTH(startDate) = ".$month.";";
	}
	else if($genre !="" && $county !="" &&  $month !=""){
		$strSQL = "SELECT events.eTitle, artists.Aname, events.startDate, events.eType, venues.vName, venues.county, tickets.ticketsLeft
							FROM venues JOIN events JOIN performsAt JOIN artists JOIN tickets
							ON  events.eVenueID = venues.venue_id AND performsAt.eventID = events.eID AND performsAt.artistID = artists.artist_id AND events.eID = tickets.tEventID
							 WHERE county = '".$county."' AND genres = '".$genre."'  AND MONTH(events.startDate) =".$month.";";
	}else{
		$strSQL = "SELECT events.eTitle, artists.Aname, events.startDate, events.eType, venues.vName, venues.county, tickets.ticketsLeft
							FROM venues JOIN events JOIN performsAt JOIN artists JOIN tickets
							ON  events.eVenueID = venues.venue_id AND performsAt.eventID = events.eID AND performsAt.artistID = artists.artist_id AND events.eID = tickets.tEventID
							WHERE MONTH(startDate) =".$month." AND county = '".$county."';";
	}
// Execute the query (the recordset $rs contains the result)
$rs = mysql_query($strSQL);

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
//add results as rows in the table
while($row = mysql_fetch_array($rs)) {
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
mysql_close();
?>
</body>
</html>