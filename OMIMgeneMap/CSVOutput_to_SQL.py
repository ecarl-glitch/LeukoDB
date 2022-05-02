#!/usr/bin/python
# -*- coding: utf-8 -*-

# Purpose of this file is to convert CSV files created from OMIM Gene Map file
# into SQL insert statments

# Input is csv of gene names, another with gene locations, and gene and phenotype information
# Output is file of SQL insert statements
inputfileLoc = open("geneLocOMIM.csv", "r")
inputfileNames = open("geneNamesOMIM.csv", "r")
inputfilePheno = open("geneANDphenoOMIM.csv", "r")


outputSQL = open("geneMap.sql", "w")
# skips over header
line = inputfileLoc.readline()
# for each line in the geneLocOMIM file, process data into SQL insert statement and write it to output file
for line in inputfileLoc:
    insertStr = "INSERT INTO geneLocOMIM(OMIM_Num,geneOMIM_Num,gene,chromosome,cytoLocation,genomicPositionStart,genomicPositionEnd) VALUES ("
    line = line.strip("\n").split(",")
    line[2] = "\"" + line[2] + "\""
    line[3] = "\"" + line[3] + "\""
    line[4] = "\"" + line[4] + "\""

    # adds processed elements to insert statement string
    for i in line:
        insertStr = insertStr + i + ","

    outputSQL.write(insertStr.strip(",") + ");\n")

outputSQL.write("\n")
# for each line in the geneNamesOMIM file, process data into SQL insert statement and write it to output file
line = inputfileNames.readline()
for line in inputfileNames:
    insertStr = "INSERT INTO geneNamesOMIM(OMIM_Num,geneOMIM_Num,gene,geneName,approvedGeneSymbol,entrezGeneID,ensemblGeneID) VALUES ("

    line = line.strip("\n").split(",")
    line[2] = "'" + line[2] + "'"
    line[len(line)-3] = "\"" + line[len(line)-3] + "\""
    line[len(line)-1] = "\"" + line[len(line)-1] + "\""

    # adds processed elements to insert statement string
    for i in line:
        insertStr = insertStr + i + ","

    outputSQL.write(insertStr.strip(",") + ");\n")

outputSQL.write("\n")

# for each line in the geneANDphenoOMIM file, process data into SQL insert statement and write it to output file
line = inputfilePheno.readline()
for line in inputfilePheno:
    insertStr = "INSERT INTO gene_phenoOMIM(OMIM_Num,geneOMIM_Num,geneName,phenotype,phenNum,inhertType) VALUES ("

    line = line.strip("\n").split(",")
    #line[2] = "'" + line[2] + "'"
    line[len(line)-1] = "\"" + line[len(line)-1] + "\""

    # adds processed elements to insert statement string
    for i in line:
        insertStr = insertStr + i + ","

    outputSQL.write(insertStr.strip(",") + ");\n")
    
inputfileNames.close()
inputfileLoc.close()
inputfilePheno.close()
outputSQL.close()
