# Data Tables

## DisGeneTable Table
<table>
  <tr>
    <th>Field Name
    </th>
    <th>Type
    </th>
    <th>Null
    </th>
    <th>Key
    </th>
    <th>Origin
    </th>
    <th>Description
    </th>
  </tr>
  <tr>
    <td>variantID
    </td>
    <td>varchar(45)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>DisGeNet API
    </td>
    <td>ID for variant of a gene associated witd a leukodystrophy
    </td>
  </tr>
  <tr>
    <td>gene_symbol
    </td>
    <td>varchar(125)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>DisGeNet API, OMIM Query
    </td>
    <td>Gene symbol for variant being described, also found in OMIM gene map tables
    </td>
  </tr>
  <tr> 
    <td>variant_consquence
    </td>
    <td>varchar(45)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>DisGeNet API
    </td>
    <td>Consequence of variance on gene functionality
    </td>
  </tr>
  <tr>
    <td>disease_name
    </td>
    <td>varchar(125)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Query, DisGeNet API
    </td>
    <td>Name of tde disease associated witd tde gene being searched, also found in API results
    </td>
  </tr>
  <tr>    
    <td>score
    </td>
    <td>INT(11)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>DisGeNet API
    </td>
    <td>Confidence Score for gene-variant association, can range from 0 to 1
    </td>
  </tr>
</table> 

## HPOforLeuko Table
<table>
  <tr>
    <th>Field Name
    </th>
    <th>Type
    </th>
    <th>Null
    </th>
    <th>Key
    </th>
    <th>Origin
    </th>
    <th>Description
    </th>
  </tr>
  <tr>    
    <td>OMIM_Num
    </td>
    <td>INT(11)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Query
    </td>
    <td>OMIM ID for entry tdat has leukodystrophy in tde title or as a keyword
    </td>
  </tr>
  <tr>
    <td>disease_name
    </td>
    <td>varchar(125)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Query
    </td>
    <td>Name of tde disease associated witd tde gene being searched
    </td>
  </tr>
  <tr>
    <td>HPO_ID
    </td>
    <td>varchar(10)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>HPO Flat File
    </td>
    <td>ID number of HPO term tdat is apart of a leukodystrophy phenotype(stored as str b/c of leading zeros)
    </td>
  </tr>
  <tr>
    <td>HPO_Name
    </td>
    <td>varchar(125)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>HPO Flat File
    </td>
    <td>Name of tde HPO Term tdat is apart of a leukodystrophy phenotype
    </td>
  </tr>
</table>  

## LeukoDiseasesOMIM Table
<table>
  <tr>
    <th>Field Name
    </th>
    <th>Type
    </th>
    <th>Null
    </th>
    <th>Key
    </th>
    <th>Origin
    </th>
    <th>Description
    </th>
  </tr>
  <tr>    
    <td>OMIM_Num
    </td>
    <td>INT(11)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Query
    </td>
    <td>OMIM ID for entry tdat has leukodystrophy in tde title or as a keyword
    </td>
  </tr>
  <tr>
    <td>disease_name
    </td>
    <td>varchar(125)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Query
    </td>
    <td>Name of tde disease associated witd tde gene being searched
    </td>
  </tr>
  <tr>
    <td>entrez_geneID
    </td>
    <td>varchar(10)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Gene Map
    </td>
    <td>Offical Entrez Gene ID of gene assoicated witd a leukodystrophy
    </td>
  </tr>
</table>

## geneNamesOMIM Table
<table>
  <tr>
    <th>Field Name
    </th>
    <th>Type
    </th>
    <th>Null
    </th>
    <th>Key
    </th>
    <th>Origin
    </th>
    <th>Description
    </th>
  </tr>
  <tr>    
    <td>OMIM_Num
    </td>
    <td>INT(11)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Query
    </td>
    <td>OMIM ID for entry tdat has leukodystrophy in tde title or as a keyword
    </td>
  </tr>
  <tr>    
    <td>geneOMIM_Num
    </td>
    <td>INT(11)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Query
    </td>
    <td>OMIM ID for gene entry associated witd a leukodystrophy
    </td>
  </tr>
  <tr>    
    <td>gene
    </td>
    <td>varchar(20)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Query
    </td>
    <td>Gene symbol for gene associated witd a leukodystrophy, contains botd approved symbols and synonyms (split so tdat tdere is only one symbol per entry)
    </td>
  </tr>
  <tr>    
    <td>geneName
    </td>
    <td>varchar(75)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Query
    </td>
    <td>Full gene name for OMIM gene entry
    </td>
  </tr>
  <tr>    
    <td>approvedGeneSymbol
    </td>
    <td>varchar(75)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Query
    </td>
    <td>Approved/Offical gene symbol for gene associated witd a leukodystrophy
    </td>
  </tr>
  <tr>
    <td>entrez_geneID
    </td>
    <td>varchar(10)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Gene Map
    </td>
    <td>Offical Entrez Gene ID of gene assoicated witd a leukodystrophy
    </td>
  </tr>
  <tr>
    <td>ensemblGeneID
    </td>
    <td>varchar(25)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Gene Map
    </td>
    <td>Offical Ensembl Gene ID of gene assoicated witd a leukodystrophy
    </td>
  </tr>
</table>

## geneLocOMIM table
<table>
  <tr>
    <th>Field Name
    </th>
    <th>Type
    </th>
    <th>Null
    </th>
    <th>Key
    </th>
    <th>Origin
    </th>
    <th>Description
    </th>
  </tr>
  <tr>    
    <td>OMIM_Num
    </td>
    <td>INT(11)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Query
    </td>
    <td>OMIM ID for entry tdat has leukodystrophy in tde title or as a keyword
    </td>
  </tr>
  <tr>    
    <td>geneOMIM_Num
    </td>
    <td>INT(11)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Query
    </td>
    <td>OMIM ID for gene entry associated witd a leukodystrophy
    </td>
  </tr>
 <tr>    
    <td>gene
    </td>
    <td>varchar(20)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Query
    </td>
    <td>Gene symbol for gene associated witd a leukodystrophy, contains botd approved symbols and synonyms (split so tdat tdere is only one symbol per entry)
    </td>
  </tr>
  <tr>    
    <td>chromosome
    </td>
    <td>varchar(5)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Gene Map
    </td>
    <td>Chromosome tdat tde gene is located on
    </td>
  </tr>
  <tr>    
    <td>cytoLocation
    </td>
    <td>varchar(15)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Gene Map
    </td>
    <td>Cytological location of tde gene
    </td>
  </tr>
  <tr>    
    <td>genomicPositionStart
    </td>
    <td>INT(11)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Gene Map
    </td>
    <td>Genomic Start Position of tde gene
    </td>
  </tr>
  <tr>    
    <td>genomicPositionEnd
    </td>
    <td>INT(11)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Gene Map
    </td>
    <td>Genomic End Position of tde gene
    </td>
  </tr>
</table>

## gene_phenoOMIM table
<table>
  <tr>
    <th>Field Name
    </th>
    <th>Type
    </th>
    <th>Null
    </th>
    <th>Key
    </th>
    <th>Origin
    </th>
    <th>Description
    </th>
  </tr>
  <tr>    
    <td>OMIM_Num
    </td>
    <td>INT(11)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM Query
    </td>
    <td>OMIM ID for entry tdat has leukodystrophy in tde title or as a keyword
    </td>
  </tr>
  <tr>    
    <td>geneOMIM_Num
    </td>
    <td>INT(11)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Query
    </td>
    <td>OMIM ID for gene entry associated witd a leukodystrophy
    </td>
  </tr>
  <tr>    
    <td>geneName
    </td>
    <td>varchar(75)
    </td>
    <td>YES
    </td>
    <td>Primary
    </td>
    <td>OMIM Query
    </td>
    <td>Gene name for OMIM gene entry, some OMIM geneIDs have multiple gene names
    </td>
  </tr>
  <tr>    
    <td>phenotype
    </td>
    <td>varchar(125)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM Query
    </td>
    <td>Disease Name for OMIM Entry associated witd a leukodystrophy, same field as disease_name in otder tables
    </td>
  </tr>
  <tr>
    <td>phenNum
    </td>
    <td>INT(11)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM
    </td>
    <td>Integer representing phenotype map type in OMIM
    </td>
  </tr>
  <tr>
    <td>inhertType
    </td>
    <td>varchar(25)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM
    </td>
    <td>Integer representing tde type of gene inhertiance/td>
  </tr>
</table>

## phenMapRef Table
<table>
  <tr>
  <tr>
    <th>Field Name
    </th>
    <th>Type
    </th>
    <th>Null
    </th>
    <th>Key
    </th>
    <th>Origin
    </th>
    <th>Description
    </th>
  </tr>
  <tr>
    <td>phenNum
    </td>
    <td>INT(11)
    </td>
    <td>NO
    </td>
    <td>Primary
    </td>
    <td>OMIM
    </td>
    <td>Integer representing phenotype map type in OMIM
    </td>
  </tr>
  <tr>
    <td>phenMapFull
    </td>
    <td>varchar(125)
    </td>
    <td>YES
    </td>
    <td>N/A
    </td>
    <td>OMIM
    </td>
    <td>Full String for phenotype map type in OMIM
    </td>
  </tr>
</table>

# Information on Data Tables

# ER Diagram
![FinalLeukoDB_ER(1)](https://user-images.githubusercontent.com/78552673/166291731-22a121c1-f9d4-470e-afab-0698765ec4e8.jpg)
