# Opens the raw file from OMIM (list of leukodystrophies)
inputfile = open("LeukoDiseasesOMIM.txt", "r")
# Reads header, skips over it
inputfile.readline()

# Opens an output file to be written to
outputfile = open("LeukoDiseasesOMIMProcessed.csv", "w")
# Writes header to output
outputfile.write("OMIM_Num,DiseaseName,Entrez_GeneID\n")

# Reads in the first line with data
line = inputfile.readline()

# while there is a next line and that line is not empty, go through loop
while (line and line != ""):
    # Split on ";", had to manually add ";" after OMIM_Num
    # (tab, comma, or space don't split properly)
    line = line.split(";")

    # Saves the OMIM Number, removes the "#" in front of most OMIM numbers
    OMIM_Num = line[0].strip("#")
    # Saves disease name with extra beginning and end spaces removed
    DiseaseName = line[1].strip()

    # If there is an Entrez Gene ID, save it, otherwise, set it to null
    if len(line) > 2:
        Entrez_GeneID = line[2].strip(" ")
    else:
        Entrez_GeneID = "NULL\n"
    # Write variables to line in CSV file
    # Added quotes prevent DiseaseName from being improperly read
    outputfile.write(OMIM_Num + ",\"" +  DiseaseName + "\"," + Entrez_GeneID)
    # Read Next Line
    line = inputfile.readline()
    
# Close input and output files
inputfile.close()
outputfile.close()
