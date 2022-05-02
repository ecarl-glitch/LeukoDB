# Data Tables

## DisGeneTable Table
 <table>
  <tr>
    <th>Field Name</th>
    <th>Type</th>
    <th>Null</th>
    <th>Key</th>
    <th>Origin</th>
    <th>Description</th>
  </tr>
  <tr>
    <th>variantID</th>
    <th>varchar(45)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>DisGeNet API</th>
    <th>ID for variant of a gene associated with a leukodystrophy</th>
  </tr>
  <tr>
    <th>gene_symbol</th>
    <th>varchar(125)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>DisGeNet API, OMIM Query</th>
    <th>Gene symbol for variant being described, also found in OMIM gene map tables</th>
  </tr>
  <tr> 
    <th>variant_consquence</th>
    <th>varchar(45)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>DisGeNet API</th>
    <th>Consequence of variance on gene functionality</th>
  </tr>
  <tr>
    <th>disease_name</th>
    <th>varchar(125)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Query, DisGeNet API</th>
    <th>Name of the disease associated with the gene being searched, also found in API results</th>
  </tr>
  <tr>    
    <th>score</th>
    <th>INT(11)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>DisGeNet API</th>
    <th>Confidence Score for gene-variant association, can range from 0 to 1</th>
  </tr>
</table> 

## HPOforLeuko Table
<table>
  <tr>
    <th>Field Name</th>
    <th>Type</th>
    <th>Null</th>
    <th>Key</th>
    <th>Origin</th>
    <th>Description</th>
  </tr>
  <tr>    
    <th>OMIM_Num</th>
    <th>INT(11)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Query</th>
    <th>OMIM ID for entry that has leukodystrophy in the title or as a keyword</th>
  </tr>
  <tr>
    <th>disease_name</th>
    <th>varchar(125)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Query</th>
    <th>Name of the disease associated with the gene being searched</th>
  </tr>
  <tr>
    <th>HPO_ID</th>
    <th>varchar(10)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>HPO Flat File</th>
    <th>ID number of HPO term that is apart of a leukodystrophy phenotype(stored as str b/c of leading zeros)</th>
  </tr>
  <tr>
    <th>HPO_Name</th>
    <th>varchar(125)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>HPO Flat File</th>
    <th>Name of the HPO Term that is apart of a leukodystrophy phenotype</th>
  </tr>
</table>  

## LeukoDiseasesOMIM Table
<table>
  <tr>
    <th>Field Name</th>
    <th>Type</th>
    <th>Null</th>
    <th>Key</th>
    <th>Origin</th>
    <th>Description</th>
  </tr>
  <tr>    
    <th>OMIM_Num</th>
    <th>INT(11)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Query</th>
    <th>OMIM ID for entry that has leukodystrophy in the title or as a keyword</th>
  </tr>
  <tr>
    <th>disease_name</th>
    <th>varchar(125)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Query</th>
    <th>Name of the disease associated with the gene being searched</th>
  </tr>
  <tr>
    <th>entrez_geneID</th>
    <th>varchar(10)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Gene Map</th>
    <th>Offical Entrez Gene ID of gene assoicated with a leukodystrophy</th>
  </tr>
</table>

## geneNamesOMIM Table
<table>
  <tr>
    <th>Field Name</th>
    <th>Type</th>
    <th>Null</th>
    <th>Key</th>
    <th>Origin</th>
    <th>Description</th>
  </tr>
  <tr>    
    <th>OMIM_Num</th>
    <th>INT(11)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Query</th>
    <th>OMIM ID for entry that has leukodystrophy in the title or as a keyword</th>
  </tr>
  <tr>    
    <th>geneOMIM_Num</th>
    <th>INT(11)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Query</th>
    <th>OMIM ID for gene entry associated with a leukodystrophy</th>
  </tr>
  <tr>    
    <th>gene</th>
    <th>varchar(20)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Query</th>
    <th>Gene symbol for gene associated with a leukodystrophy, contains both approved symbols and synonyms (split so that there is only one symbol per entry)</th>
  </tr>
  <tr>    
    <th>geneName</th>
    <th>varchar(75)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Query</th>
    <th>Full gene name for OMIM gene entry</th>
  </tr>
    <tr>    
    <th>approvedGeneSymbol</th>
    <th>varchar(75)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Query</th>
    <th>Approved/Offical gene symbol for gene associated with a leukodystrophy</th>
  </tr>
  <tr>
    <th>entrez_geneID</th>
    <th>varchar(10)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Gene Map</th>
    <th>Offical Entrez Gene ID of gene assoicated with a leukodystrophy</th>
  </tr>
    <tr>
    <th>ensemblGeneID</th>
    <th>varchar(25)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Gene Map</th>
    <th>Offical Ensembl Gene ID of gene assoicated with a leukodystrophy</th>
  </tr>
  <tr>    
    <th>gene</th>
    <th>varchar(20)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Query</th>
    <th>Gene symbol for gene associated with a leukodystrophy, contains both approved symbols and synonyms (split so that there is only one symbol per entry)</th>
  </tr>
  <tr>    
    <th>chromosome</th>
    <th>varchar(5)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Gene Map</th>
    <th>Chromosome that the gene is located on</th>
  </tr>
  <tr>    
    <th>cytoLocation</th>
    <th>varchar(15)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Gene Map</th>
    <th>Cytological location of the gene</th>
  </tr>
  <tr>    
    <th>genomicPositionStart</th>
    <th>INT(11)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Gene Map</th>
    <th>Genomic Start Position of the gene</th>
  </tr>
  <tr>    
    <th>genomicPositionEnd</th>
    <th>INT(11)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Gene Map</th>
    <th>Genomic End Position of the gene</th>
  </tr>
</table>

## geneLocOMIM table
<table>
  <tr>
    <th>Field Name</th>
    <th>Type</th>
    <th>Null</th>
    <th>Key</th>
    <th>Origin</th>
    <th>Description</th>
  </tr>
  <tr>    
    <th>OMIM_Num</th>
    <th>INT(11)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Query</th>
    <th>OMIM ID for entry that has leukodystrophy in the title or as a keyword</th>
  </tr>
  <tr>    
    <th>geneOMIM_Num</th>
    <th>INT(11)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Query</th>
    <th>OMIM ID for gene entry associated with a leukodystrophy</th>
  </tr>
 </table>

## gene_phenoOMIM table
<table>
  <tr>    
    <th>OMIM_Num</th>
    <th>INT(11)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM Query</th>
    <th>OMIM ID for entry that has leukodystrophy in the title or as a keyword</th>
  </tr>
  <tr>    
    <th>geneOMIM_Num</th>
    <th>INT(11)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Query</th>
    <th>OMIM ID for gene entry associated with a leukodystrophy</th>
  </tr>
  <tr>    
    <th>geneName</th>
    <th>varchar(75)</th>
    <th>YES</th>
    <th>Primary</th>
    <th>OMIM Query</th>
    <th>Gene name for OMIM gene entry, some OMIM geneIDs have multiple gene names</th>
  </tr>
  <tr>    
    <th>phenotype</th>
    <th>varchar(125)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM Query</th>
    <th>Disease Name for OMIM Entry associated with a leukodystrophy, same field as disease_name in other tables</th>
  </tr>
  <tr>
    <th>phenNum</th>
    <th>INT(11)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM</th>
    <th>Integer representing phenotype map type in OMIM</th>
 </tr>
 <tr>
    <th>inhertType</th>
    <th>varchar(25)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM</th>
    <th>Integer representing the type of gene inhertiance/th>
 </tr>
</table>

## phenMapRef Table
<table>
  <tr>
    <th>Field Name</th>
    <th>Type</th>
    <th>Null</th>
    <th>Key</th>
    <th>Origin</th>
    <th>Description</th>
  </tr>
  <tr>
    <th>phenNum</th>
    <th>INT(11)</th>
    <th>NO</th>
    <th>Primary</th>
    <th>OMIM</th>
    <th>Integer representing phenotype map type in OMIM</th>
 </tr>
 <tr>
    <th>phenMapFull</th>
    <th>varchar(125)</th>
    <th>YES</th>
    <th>N/A</th>
    <th>OMIM</th>
    <th>Full String for phenotype map type in OMIM</th>
 </tr>
</table>

# Information on Data Tables

# ER Diagram
