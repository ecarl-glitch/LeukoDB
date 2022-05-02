#!/usr/bin/python
# -*- coding: utf-8 -*-

# Input file for this script is HPOforLeukoDisease.tsv, created using the diseaseToHPO.py script

# PURPOSE: This file converts HPOforLeukoDisease.tsv to SQL insert statements

import pandas as pd

inputdf = pd.read_csv('outputFile/HPOforLeukoDisease.tsv',index_col=0, sep = '\t')
inputdf.drop_duplicates(keep=False,inplace=True)

inputfile = open('outputFile/temp.tsv', 'w')
inputdf.to_csv('outputFile/temp.tsv', sep = '\t')
inputfile.close()

inputfile = open('outputFile/temp.tsv', 'r')
outputfile = open('outputFile/HPOforLeuko.sql', 'w')

# Reads in the header of the input file

inputfile.readline()

# For lines in input file, splits the line into a list and adds the correct elements into a SQL statement

for line in inputfile:
    line = line.split('\t')
    insertStr = \
        'INSERT INTO HPOforLeuko(OMIM_Num, disease_name, HPO_ID, HPO_Name) VALUES ('
    insertStr = insertStr + str(line[1]) + ',"' + str(line[2]) + '",\"' \
        + str(line[3]).strip("HP:") + '\","' + str(line[4]).strip('\n') + '");'

    # writes insert statement to SQL output file (create table statement and comments added manually after creation of table)

    outputfile.write(insertStr + '\n')

inputfile.close()
outputfile.close()
