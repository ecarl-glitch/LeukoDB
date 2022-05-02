<!DOCTYPE html>
<html lang="en">

<head>
	<title>LeukoDB</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		font-family: "Lato", sans-serif
	}
	
	.w3-bar,
	h1,
	button {
		font-family: "Montserrat", sans-serif
	}
	
	.fa-anchor,
	.fa-coffee {
		font-size: 200px
	}
	</style>
</head>

<body>
	<!-- Navbar -->
	<div class="w3-top">
		<div class="w3-bar w3-red w3-card w3-left-align w3-large"> <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a> <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a> <a href="data.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Data</a> </div>
		<!-- Navbar on small screens -->
		<div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large"> <a href="#" class="w3-bar-item w3-button w3-padding-large">Data</a> </div>
	</div>
	<!-- Header -->
	<header class="w3-container w3-red w3-center" style="padding:128px 16px">
		<h1 class="w3-margin w3-jumbo">LeukoDB</h1>
		<p class="w3-xlarge">A database of genes and phenotypes associated with human leukodystrophies</p>
	</header>
	<!-- First Grid -->
	<div class="w3-row-padding w3-padding-64 w3-container">
		<div class="w3-content">
			<h1>Query LeukoDB</h1>
			<h5><br>Choose a supported data type from the drop down menu<br><br></h5>
			<form method="POST">
				<label for="query-type"></label>
				<select name="query-type" id="query-type">
					<option value="OMIM_ID">OMIM Disease ID</option>
					<option value="HPO_ID">HPO ID</option>
					<option value="OMIM_GeneID">OMIM Gene ID</option>
					<option value="Gene_Symbol">Approved Gene Symbol</option>
				</select>
				<!-- prompts the user to enter the date and the state used to query the database -->
				<input type="text" name="query-text">
				<!-- button to submit the input to be handled by the php code below -->
				<input type="submit" name="submit" value="Submit"> </form>
			<?php
// determines that request is coming from the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$queryText = $_POST["query-text"];
$queryType = $_POST["query-type"];
}

// If no date was provided (empty variable) then inform the user, then terminate the process
if ($queryText == "") {
echo "<br>No data entered, please try again";
} else {
//Add if statement here for types TO DO
if ($queryType == "OMIM_ID") {
  $sql = "SELECT * FROM LeukoDiseasesOMIM INNER JOIN gene_phenoOMIM ON LeukoDiseasesOMIM.OMIM_Num = gene_phenoOMIM.OMIM_Num WHERE LeukoDiseasesOMIM.OMIM_Num LIKE '%$queryText%'";
  echo "<br>Query Type was  set as OMIM Disease ID<br>";
}
if ($queryType == "HPO_ID") {
  $sql = "SELECT * FROM HPOforLeuko INNER JOIN geneNamesOMIM ON HPOforLeuko.OMIM_Num = geneNamesOMIM.OMIM_Num WHERE HPO_ID LIKE '%$queryText%'";
  echo "<br>Query Type was  set as HPO ID ID<br>";
}
if ($queryType == "OMIM_GeneID") {
  $sql = "SELECT genename, OMIM_Num, phenotype, inhertType FROM gene_phenoOMIM WHERE geneOMIM_Num LIKE '%$queryText%'";
  echo "<br>Query Type was  set as OMIM Gene ID<br>";
}
if ($queryType == "Gene_Symbol") {
  $sql = " SELECT * FROM geneLocOMIM INNER JOIN gene_phenoOMIM ON geneLocOMIM.OMIM_Num = gene_phenoOMIM.OMIM_Num WHERE gene LIKE '%$queryText%'";
  echo "<br>Query Type was  set as Approved Gene Symbol<br>";
}
echo "Query is for " . $queryText . ". <br>";

// Connection variables, make it easier to change/edit connection if needed
$server = "localhost";
$username = "eecarlson";
$password = "";
$database = "eecarlson";

$connect = mysqli_connect($server, $username, "", $database);

// Error thrown if it is unable to make the connection to the database, informs the user
if ($connect->connect_error) {
          echo "Something has gone terribly wrong";
          echo "Connection error:" . $connect->connect_error;
      }

      $result = $connect->query($sql);
      $count = 0;
      // if there is something in the result variable, fetches the postive value
      // and gives the state and date used in the query
      if ($result->num_rows > 0) {
          // fetches result and sends to to the website to be seen by the user
          while ($row = $result->fetch_assoc()) {
            if ($queryType == "OMIM_ID") {
		    echo "<br><br>For OMIM Disease ID <b>" . $queryText . "</b> the disease name is <b> " . $row['disease_name'] . "</b><br>";
		    echo "<br><br>The gene(s) associated with this disease are <b>" .  $row['entrez_geneID'] . "</b> (OMIM Gene ID: <b>" . $row['geneOMIM_Num'] . ")</b><br>";
		    echo "Full Gene Name: <b>" .$row['geneName']. "</b><br>";  

	    }	  
	    if ($queryType == "OMIM_GeneID") {
              echo "<br>For OMIM Gene ID<b> " . $queryText . "</b> the gene name is <b>" . $row['genename'] . "</b><br>";
              echo "The phenotype associated with this gene is <b>" .  $row['phenotype'] . "</b> (OMIM ID:<b> " . $row['OMIM_Num'] . "</b>) <br>Inhertance: " .$row['inhertType']. "<br>";

	    }

	    if ($queryType == "HPO_ID"){
		   $count = $count + 1;
		       echo "<br><br>[" . $count . "] Associated Disease <b>" .  $row['disease_name'] . "</b> (OMIM ID: <b>" . $row['OMIM_Num'] . "</b>)"; 
          echo "<br><br>Associated Gene  <b>" . $row['gene']. "</b>, the OMIM Gene ID is<b> " . $row['geneOMIM_Num'] . "</b><br>";
          echo "Full Gene Name is <b> " . $row['geneName']. " (Approved Gene Name: ". $row["approvedGeneSymbol"]. ") </b><br><br>";
	    }
            
            if ($queryType == "Gene_Symbol") {
              echo "<br>For Gene Name<b> " . $queryText . " </b> the OMIM Gene ID is <b> " . $row['geneOMIM_Num'] . "</b><br>";
              echo "The phenotype associated with this gene is <b> " .  $row['phenotype'] . "</b> (OMIM ID: <b> " . $row['OMIM_Num'] . "</b>) <br>Inhertance: <b>" .$row['inhertType']. "</b><br>"; 
            }
          }
      } else {
          echo "No results returned";
      }
  }
  ?>
		</div>
	</div>
	</div>
	<!-- Footer -->
	<footer class="w3-container w3-padding-64 w3-center w3-opacity">
		<p>Created for BIOI 4870</p>
	</footer>
</body>

</html>