<!-- CSS Template from W3 Schools 
 https://www.w3schools.com/w3css/w3css_templates.asp 
 
 This specific template: https://www.w3schools.com/w3css/tryw3css_templates_start_page.htm-->
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
	
	table,
	th,
	td {
		border-collapse: collapse;
		text-align: center;
		padding: 15px;
		border: 1px solid;
	}
	</style>
</head>

<body>
	<!-- Navbar -->
	<div class="w3-top">
		<div class="w3-bar w3-red w3-card w3-left-align w3-large"> <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a> <a href="home.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a> <a href="data.php" class="w3-bar-item w3-button w3-padding-large w3-white">Data</a> </div>
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
			<br>
			<h4> DisGeneTable Table </h4>
			<table>
				<tr>
					<th>Field Name </th>
					<th>Type </th>
					<th>Null </th>
					<th>Key </th>
					<th>Origin </th>
					<th>Description </th>
				</tr>
				<tr>
					<td>variantID </td>
					<td>varchar(45) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>DisGeNet API </td>
					<td>ID for variant of a gene associated witd a leukodystrophy </td>
				</tr>
				<tr>
					<td>gene_symbol </td>
					<td>varchar(125) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>DisGeNet API, OMIM Query </td>
					<td>Gene symbol for variant being described, also found in OMIM gene map tables </td>
				</tr>
				<tr>
					<td>variant_consquence </td>
					<td>varchar(45) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>DisGeNet API </td>
					<td>Consequence of variance on gene functionality </td>
				</tr>
				<tr>
					<td>disease_name </td>
					<td>varchar(125) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Query, DisGeNet API </td>
					<td>Name of tde disease associated witd tde gene being searched, also found in API results </td>
				</tr>
				<tr>
					<td>score </td>
					<td>INT(11) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>DisGeNet API </td>
					<td>Confidence Score for gene-variant association, can range from 0 to 1 </td>
				</tr>
			</table>
			<br>
			<h4> HPOforLeuko Table </h4>
			<table>
				<tr>
					<th>Field Name </th>
					<th>Type </th>
					<th>Null </th>
					<th>Key </th>
					<th>Origin </th>
					<th>Description </th>
				</tr>
				<tr>
					<td>OMIM_Num </td>
					<td>INT(11) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Query </td>
					<td>OMIM ID for entry tdat has leukodystrophy in tde title or as a keyword </td>
				</tr>
				<tr>
					<td>disease_name </td>
					<td>varchar(125) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Query </td>
					<td>Name of tde disease associated witd tde gene being searched </td>
				</tr>
				<tr>
					<td>HPO_ID </td>
					<td>varchar(10) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>HPO Flat File </td>
					<td>ID number of HPO term tdat is apart of a leukodystrophy phenotype(stored as str b/c of leading zeros) </td>
				</tr>
				<tr>
					<td>HPO_Name </td>
					<td>varchar(125) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>HPO Flat File </td>
					<td>Name of tde HPO Term tdat is apart of a leukodystrophy phenotype </td>
				</tr>
			</table>
			<br>
			<h4> LeukoDiseasesOMIM Table </h4>
			<table>
				<tr>
					<th>Field Name </th>
					<th>Type </th>
					<th>Null </th>
					<th>Key </th>
					<th>Origin </th>
					<th>Description </th>
				</tr>
				<tr>
					<td>OMIM_Num </td>
					<td>INT(11) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Query </td>
					<td>OMIM ID for entry tdat has leukodystrophy in tde title or as a keyword </td>
				</tr>
				<tr>
					<td>disease_name </td>
					<td>varchar(125) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Query </td>
					<td>Name of tde disease associated witd tde gene being searched </td>
				</tr>
				<tr>
					<td>entrez_geneID </td>
					<td>varchar(10) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Gene Map </td>
					<td>Offical Entrez Gene ID of gene assoicated witd a leukodystrophy </td>
				</tr>
			</table>
			<br>
			<h4> geneNamesOMIM Table </h4>
			<table>
				<tr>
					<th>Field Name </th>
					<th>Type </th>
					<th>Null </th>
					<th>Key </th>
					<th>Origin </th>
					<th>Description </th>
				</tr>
				<tr>
					<td>OMIM_Num </td>
					<td>INT(11) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Query </td>
					<td>OMIM ID for entry tdat has leukodystrophy in tde title or as a keyword </td>
				</tr>
				<tr>
					<td>geneOMIM_Num </td>
					<td>INT(11) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Query </td>
					<td>OMIM ID for gene entry associated witd a leukodystrophy </td>
				</tr>
				<tr>
					<td>gene </td>
					<td>varchar(20) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Query </td>
					<td>Gene symbol for gene associated witd a leukodystrophy, contains botd approved symbols and synonyms (split so tdat tdere is only one symbol per entry) </td>
				</tr>
				<tr>
					<td>geneName </td>
					<td>varchar(75) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Query </td>
					<td>Full gene name for OMIM gene entry </td>
				</tr>
				<tr>
					<td>approvedGeneSymbol </td>
					<td>varchar(75) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Query </td>
					<td>Approved/Offical gene symbol for gene associated witd a leukodystrophy </td>
				</tr>
				<tr>
					<td>entrez_geneID </td>
					<td>varchar(10) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Gene Map </td>
					<td>Offical Entrez Gene ID of gene assoicated witd a leukodystrophy </td>
				</tr>
				<tr>
					<td>ensemblGeneID </td>
					<td>varchar(25) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Gene Map </td>
					<td>Offical Ensembl Gene ID of gene assoicated witd a leukodystrophy </td>
				</tr>
			</table>
			<br>
			<h4> geneLocOMIM table </h4>
			<table>
				<tr>
					<th>Field Name </th>
					<th>Type </th>
					<th>Null </th>
					<th>Key </th>
					<th>Origin </th>
					<th>Description </th>
				</tr>
				<tr>
					<td>OMIM_Num </td>
					<td>INT(11) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Query </td>
					<td>OMIM ID for entry tdat has leukodystrophy in tde title or as a keyword </td>
				</tr>
				<tr>
					<td>geneOMIM_Num </td>
					<td>INT(11) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Query </td>
					<td>OMIM ID for gene entry associated witd a leukodystrophy </td>
				</tr>
				<tr>
					<td>gene </td>
					<td>varchar(20) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Query </td>
					<td>Gene symbol for gene associated witd a leukodystrophy, contains botd approved symbols and synonyms (split so tdat tdere is only one symbol per entry) </td>
				</tr>
				<tr>
					<td>chromosome </td>
					<td>varchar(5) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Gene Map </td>
					<td>Chromosome tdat tde gene is located on </td>
				</tr>
				<tr>
					<td>cytoLocation </td>
					<td>varchar(15) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Gene Map </td>
					<td>Cytological location of tde gene </td>
				</tr>
				<tr>
					<td>genomicPositionStart </td>
					<td>INT(11) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Gene Map </td>
					<td>Genomic Start Position of tde gene </td>
				</tr>
				<tr>
					<td>genomicPositionEnd </td>
					<td>INT(11) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Gene Map </td>
					<td>Genomic End Position of tde gene </td>
				</tr>
			</table>
			<br>
			<h4> gene_phenoOMIM table </h4>
			<table>
				<tr>
					<th>Field Name </th>
					<th>Type </th>
					<th>Null </th>
					<th>Key </th>
					<th>Origin </th>
					<th>Description </th>
				</tr>
				<tr>
					<td>OMIM_Num </td>
					<td>INT(11) </td>
					<td>YES </td>
					<td>N/A </td>
					<td>OMIM Query </td>
					<td>OMIM ID for entry tdat has leukodystrophy in tde title or as a keyword </td>
				</tr>
				<tr>
					<td>geneOMIM_Num </td>
					<td>INT(11) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Query </td>
					<td>OMIM ID for gene entry associated witd a leukodystrophy </td>
				</tr>
				<tr>
					<td>geneName </td>
					<td>varchar(75) </td>
					<td>YES </td>
					<td>Primary </td>
					<td>OMIM Query </td>
					<td>Gene name for OMIM gene entry, some OMIM geneIDs have multiple gene names </td>
				</tr>
				<tr>
					<td>phenotype </td>
					<td>varchar(125) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM Query </td>
					<td>Disease Name for OMIM Entry associated witd a leukodystrophy, same field as disease_name in otder tables </td>
				</tr>
				<tr>
					<td>phenNum </td>
					<td>INT(11) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM </td>
					<td>Integer representing phenotype map type in OMIM </td>
				</tr>
				<tr>
					<td>inhertType </td>
					<td>varchar(25) </td>
					<td>NO </td>
					<td>Primary </td>
					<td>OMIM </td>
					<td>Integer representing tde type of gene inhertiance/td> </tr>
			</table>
			<br>
			<h4> phenMapRef Table </h4>
			<table>
				<tr>
					<tr>
						<th>Field Name </th>
						<th>Type </th>
						<th>Null </th>
						<th>Key </th>
						<th>Origin </th>
						<th>Description </th>
					</tr>
					<tr>
						<td>phenNum </td>
						<td>INT(11) </td>
						<td>NO </td>
						<td>Primary </td>
						<td>OMIM </td>
						<td>Integer representing phenotype map type in OMIM </td>
					</tr>
					<tr>
						<td>phenMapFull </td>
						<td>varchar(125) </td>
						<td>YES </td>
						<td>N/A </td>
						<td>OMIM </td>
						<td>Full String for phenotype map type in OMIM </td>
					</tr>
			</table>
		</div>
	</div>
	</div>
	<!-- Footer -->
	<footer class="w3-container w3-padding-64 w3-center w3-opacity">
		<p>Created for BIOI 4870</p>
	</footer>
</body>

</html>