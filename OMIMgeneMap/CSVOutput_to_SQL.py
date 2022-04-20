inputfileLoc = open("geneLocOMIM.csv", "r")
inputfileNames = open("geneNamesOMIM.csv", "r")
inputfilePheno = open("geneANDphenoOMIM.csv", "r")


outputSQL = open("geneMap.sql", "w")

line = inputfileLoc.readline()
for line in inputfileLoc:
    insertStr = "INSERT INTO geneLocOMIM(OMIM_Num,geneOMIM_Num,gene,chromosome,cytoLocation,genomicPositionStart,genomicPositionEnd) VALUES ("
    line = line.strip("\n").split(",")
    line[2] = "\"" + line[2] + "\""
    line[3] = "\"" + line[3] + "\""
    line[4] = "\"" + line[4] + "\""

    for i in line:
        insertStr = insertStr + i + ","

    outputSQL.write(insertStr.strip(",") + ");\n")

outputSQL.write("\n")

line = inputfileNames.readline()
for line in inputfileNames:
    insertStr = "INSERT INTO geneNamesOMIM(OMIM_Num,geneOMIM_Num,gene,geneName,approvedGeneSymbol,entrezGeneID,ensemblGeneID) VALUES ("

    line = line.strip("\n").split(",")
    line[2] = "'" + line[2] + "'"
    line[len(line)-3] = "\"" + line[len(line)-3] + "\""
    line[len(line)-1] = "\"" + line[len(line)-1] + "\""

    for i in line:
        insertStr = insertStr + i + ","

    outputSQL.write(insertStr.strip(",") + ");\n")

outputSQL.write("\n")

line = inputfilePheno.readline()
for line in inputfilePheno:
    insertStr = "INSERT INTO gene_phenoOMIM(OMIM_Num,geneOMIM_Num,geneName,phenotype,phenNum,inhertType) VALUES ("

    line = line.strip("\n").split(",")
    #line[2] = "'" + line[2] + "'"
    line[len(line)-1] = "\"" + line[len(line)-1] + "\""

    for i in line:
        insertStr = insertStr + i + ","

    outputSQL.write(insertStr.strip(",") + ");\n")
    
inputfileNames.close()
inputfileLoc.close()
inputfilePheno.close()
outputSQL.close()
