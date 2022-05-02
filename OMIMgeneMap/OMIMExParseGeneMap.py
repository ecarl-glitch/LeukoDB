#!/usr/bin/python
# -*- coding: utf-8 -*-

# The purpose of this file is to parse gene map file downloaded from OMIM for OMIM IDs from LeukoDisease
# csv file

# Input is list of OMIM IDs and gene map file
# Output is csv of gene names, another with gene locations, and gene and phenotype information

inputfileOMIM = open("inputFile/OMIM_NumList.csv", "r")
inputfileOMIM.readline()

line = inputfileOMIM.readline()

OMIM_Num_List = []
while (line):
    OMIM_Num_List.append(line.strip("\n"))
    line = inputfileOMIM.readline()

# Close OMIM Num File
inputfileOMIM.close()
count = 0

inputfileGene = open("inputFile/genemap2.txt", "r")

outputfileNames = open("outputFile/geneNamesOMIM.csv", "w")
outputfileLoc = open("outputFile/geneLocOMIM.csv", "w")
outputfilePheno = open("outputFile/geneANDphenoOMIM.csv", "w")
# Writes headers for all three files
outputfileNames.write("OMIM_Num,geneOMIM_Num,gene,geneName,approvedGeneSymbol,entrezGeneID,ensemblGeneID\n")
outputfileLoc.write("OMIM_Num,geneOMIM_Num,gene,chromosome,cytoLocation,genomicPositionStart,genomicPositionEnd\n")
outputfilePheno.write("OMIM_Num,geneOMIM_Num,geneName,phenotype,phenNum,inhertType\n")


# Read from stdin
for line in inputfileGene:

    # Skip comments
    if line.startswith('#'):
        continue

    # Strip trailing new line
    line = line.strip('\n')

    # Get the values
    valueList = line.split('\t')

    # Get the fields
    chromosome = valueList[0]
    genomicPositionStart = valueList[1]
    genomicPositionEnd = valueList[2]
    cytoLocation = valueList[3]
    computedCytoLocation = valueList[4]
    mimNumber = valueList[5]
    geneSymbols = valueList[6]
    geneName = valueList[7]
    approvedGeneSymbol = valueList[8]
    entrezGeneID = valueList[9]
    ensemblGeneID = valueList[10]
    phenotypeString = valueList[12]

    # Skip empty phenotypes
    if not phenotypeString:
        continue

    # Parse the phenotypes
    for phenotype in phenotypeString.split(';'):

        # Clean the phenotype
        phenotype = phenotype.strip()

        # Long phenotype
        matcher = re.match(r'^(.*),\s(\d{6})\s\((\d)\)(|, (.*))$', phenotype)
        if matcher:

            # Get the fields
            phenotype = matcher.group(1)
            phenotypeMimNumber = matcher.group(2)
            phenotypeMappingKey = matcher.group(3)
            inheritances = matcher.group(5)

            # Get the inheritances, may or may not be there
            if inheritances:
                for inheritance in inheritances.split(','):
                    inheritance = inheritance.strip()

        # Short phenotype
        else:

            # Short phenotype
            matcher = re.match(r'^(.*)\((\d)\)(|, (.*))$', phenotype)
            if matcher:

                # Get the fields
                phenotype = matcher.group(1)
                phenotypeMappingKey = matcher.group(2)
                inheritances = matcher.group(3)

                # Get the inheritances, may or may not be there
                if inheritances:
                    for inheritance in inheritances.split(','):
                        inheritance = inheritance.strip()
        # Runs through OMIM IDs in OMIM_Num_List
        if phenotypeMimNumber.strip("\n") in OMIM_Num_List:
            OMIM_Num_List.remove(phenotypeMimNumber)
            outputfilePheno.write(phenotypeMimNumber + "," + mimNumber + ",\"" + geneName + "\",\"" + phenotype + "\"," + phenotypeMappingKey + "," + inheritances + "\n")

            geneSymbols = geneSymbols.split(",")
            # Replaces blank gene symbols with NULL
            for gene in geneSymbols:
                if approvedGeneSymbol == "":
                    approvedGeneSymbol = "NULL"

                if entrezGeneID == "":
                    entrezGeneID = "NULL"

                if ensemblGeneID == "":
                    ensemblGeneID = "NULL\n"

                outputfileNames.write(phenotypeMimNumber + "," + mimNumber + "," + gene.strip() + ",\"" + geneName + "\"," + approvedGeneSymbol + "," + entrezGeneID + "," + ensemblGeneID + "\n")
                outputfileLoc.write(phenotypeMimNumber + "," + mimNumber + "," + gene.strip() + "," + chromosome + "," +  cytoLocation + "," + genomicPositionStart + "," + genomicPositionEnd + "\n")

outputfileNames.close()
outputfileLoc.close()
outputfilePheno.close()
