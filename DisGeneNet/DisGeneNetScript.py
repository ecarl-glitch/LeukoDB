
#!/usr/bin/python
# -*- coding: utf-8 -*-

# Script connects to DisGeneNet REST API and queries for gene-variant for each gene
# assoicated with leukodystrophies

# Input is gene geneNamesOMIM.csv
# Output is VariantDiseaseAssoc with API results for successful queries
'''
Script example to use the DisGeneNET REST API with the new authentication system
'''
# The code for connecting to API is from
# DisGeNET programmatic access. DisGeNET. (n.d.). Retrieved May 1, 2022, from https://www.disgenet.org/api/
# which has an example python script for connecting to API, though code is transformed
import pandas as pd
import requests

# coverts geneNamesOMIM to data frame
geneNamesdf = pd.read_csv('inputData/geneNamesOMIM.csv', index_col=0)

# empty lists to store entrezGeneID and diseaseID values for quert
entrezGeneID_List = []
diseaseID_List = []

outputfile = open("outputData/VariantDiseaseAssoc.tsv", "w")


for values in geneNamesdf['entrezGeneID'].iteritems():
    print(values)
    if values[0] not in diseaseID_List:
        diseaseID_List.append(values[0])
    if values[1] not in entrezGeneID_List:
        entrezGeneID_List.append(values[1])
        
#For this example we are going to use the python default http library
print(entrezGeneID_List)
print(len(entrezGeneID_List))

#Build a dict with the following format, change the value of the two keys your DisGeNET account credentials, if you don't have an account you can create one here https://www.disgenet.org/signup/ 
auth_params = {"email":" @gmail.com","password":""}

api_host = "https://www.disgenet.org/api"

api_key = "feecba477d6b802157e9d5075ed42575dd40e055"

df = pd.DataFrame()
s = requests.Session()
listcount = 0
dictcount = 0


    
for gene in entrezGeneID_List:
    try:
        r = s.post(api_host+'/auth/', data=auth_params)
        if(r.status_code == 200):
            #Lets store the api key in a new variable and use it again in new requests
            json_response = r.json()
            api_key = json_response.get("token")
            print(api_key + "This is your user API key.") #Comment this line if you don't want your API key to show up in the terminal
        else:
            print(r.status_code)
            print(r.text)
    except requests.exceptions.RequestException as req_ex:
        print(req_ex)
        print("Something went wrong with the request.")
    
    s.headers.update({"Authorization": "Bearer %s" % api_key})
    if api_key:
        #Add the api key to the requests headers of the requests Session object in order to use the restricted endpoints.
        #Lets get all the diseases associated to a gene eg. APP (EntrezID 351) and restricted by a source.
        gda_response = s.get(api_host+'/vda/gene/' + str(gene), params={'source':'UNIPROT'})
        vda_result = gda_response.json()
        print(vda_result)
        if isinstance(vda_result, list):
            listcount = listcount + 1
            dfTemp = pd.DataFrame(vda_result)
            df = df.append(dfTemp)

            
df.to_csv("VariantDiseaseAssoc.tsv", sep='\t')          
if s:
    s.close()


#variantid, gene_symbol, variant_dsi, variant_dpi, variant_consequence_type, diseaseid, diseasenaem
