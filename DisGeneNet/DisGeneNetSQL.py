#!/usr/bin/python
# -*- coding: utf-8 -*-
# Purpose is to covert VariantDiseaseAssoc, API results, to SQL Insert Statements
import pandas as pd
from functools import reduce

inputfile = open("VariantDiseaseAssoc.tsv" , "r")
outputfile = open('DisGenetoSQL.sql', 'w')

line = inputfile.readline()
for line in inputfile:
    line = line.split("\t")
    if ";" in line[2]:
        geneList = line[2].split(";")
        # adds a line for each gene in the database, runs for each gene that is the
        # gene column for each entry
        for gene in geneList:
            print(gene)
            insertStr = ("INSERT INTO DisGeneTable (variantID,gene_symbol,variant_consquence,disease_name,score) VALUES (")
            insertStr = insertStr + ("\"" + line[1] + "\"," + "\"" + gene + "\"," + "\"" + line[5] + "\"," + "\"" + line[7] + "\"," +  str(line[12]) + ");\n")
            outputfile.write(insertStr)
    else:
            
            insertStr = ("INSERT INTO DisGeneTable (variantID,gene_symbol,variant_consquence,disease_name,score) VALUES (")
            insertStr = insertStr + ("\"" + line[1] + "\"," + "\"" + line[2] + "\"," + "\"" + line[5] + "\"," + "\"" + line[7] + "\"," +  str(line[12]) + ");\n")
            outputfile.write(insertStr)
    line = inputfile.readline()





