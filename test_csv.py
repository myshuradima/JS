import csv
import sys
file = open('text.txt', 'w', encoding= 'utf-8')
file1 = open('text1.txt', 'w', encoding= 'utf-8')
file2 = open('text2.txt', 'w', encoding= 'utf-8')
k = 0
line = ""
genres_dict = dict()
keyword_dict = dict()
company_dict = dict()
country_dict = dict()
language_dict = dict()

with open('tmdb_5000_movies.csv', newline='', encoding='utf-8') as csvfile:
    spamreader = csv.reader(csvfile)
    for row in spamreader:
         k=k+1
         #print(k)
         file.write("""INSERT INTO FILM (FILM_ID, BUDGET, HOMEPAGE, ORIGINAL_TITLE, OVERVIEW,
         POPULARITY, RELEASE_DATE, REVENUE, RUNTIME, TAGLINE, TITLE, VOTE_AVERAGE, VOTE_COUNT) VALUES (""" + str(row[3]) +
               ", " + str(row[0]) +
               ", '" + str(row[2]) +
               "', '" + str(row[6]).replace("'", "d") +
               "', '" + str(row[7]).replace("'", "d")  +
               "', " + str(row[8]) +
               ", " + "DATE '" + str(row[11]) + "'" +
               ", " + str(row[12]).replace("'", "d") +
               ", " + str(row[13]).replace("'", "d") +
               ", '" + str(row[16]).replace("'", "d") +
               "', '" + str(row[17]).replace("'", "d") +
               "', " + str(row[18]) +
               ", " + str(row[19]) + ");\n")

         if row[1] ==[]:
             row[1] = """[{""id"": 0, ""name"": ""Not mentioned""}]"""
         row[1] = row[1][1:-1]
         #print(row[1][:-1])
         new_list = row[1][:-1].split("}, ")
         #print(new_list[2])
         new_list3 = list()
         new_list4 = list()
         for el in new_list:
             el = el[1:]
             #print(el)
             new_list2 = el.split(", ")
             #print(new_list2[0] +"/"+ new_list2[1])
             new_list3.append(new_list2[0].split(": ")[1])
             new_list4.append(new_list2[1].split(": ")[1])
             n = len(new_list3)
             i = 0
             while(i<n):
                 #print(new_list3[i]+":"+new_list4[i])
                 genres_dict[int(new_list3[i])] = new_list4[i][1:-1]
                 i = i + 1
         #print(genres_dict)
         for el in new_list3:
             #print(el)
             file1.write("""INSERT INTO FILM_GENRE(FILM_ID, GENRE_ID) VALUES(""" +
                    str(row[3]) + ", " + str(el) +"); \n")


         if row[4] == "[]":
             row[4] = """[{""id"": 0, ""name"": ""Not mentioned""}]"""
         row[4] = row[4][1:-1]
         #print(row[4])
         new_list = row[4][:-1].split("}, ")
         # print(new_list[2])
         new_list3 = list()
         new_list4 = list()
         for el in new_list:
             el = el[1:]
             # print(el)
             new_list2 = el.split(", ")
             # print(new_list2[0] +"/"+ new_list2[1])
             new_list3.append(new_list2[0].split(": ")[1])
             new_list4.append(new_list2[1].split(": ")[1])
             n = len(new_list3)
             i = 0
             while (i < n):
                 # print(new_list3[i]+":"+new_list4[i])
                 keyword_dict[int(new_list3[i])] = new_list4[i][1:-1]
                 i = i + 1
         # print(genres_dict)
         for el in new_list3:
             # print(el)
             file1.write("""INSERT INTO FILM_KEYWORDS(FILM_ID, KEYWORD_ID) VALUES(""" +
                   str(row[3]) + ", " + str(el) + "); \n")


         if row[9] == "[]":
             row[9] = """[{""id"": ""Not mentioned"" , ""name"": 0}]"""
         row[9] = row[9][1:-1]
         #print(row[1][:-1])
         new_list = row[9][:-1].split("}, ")
         #print(new_list[2])
         new_list3 = list()
         new_list4 = list()
         for el in new_list:
             el = el[1:]
             # print(el)
             new_list2 = el.split(", \"")
             #print(new_list2[0] +"/"+ new_list2[1])
             new_list3.append(new_list2[0].split(": ")[1])
             new_list4.append(new_list2[1].split(": ")[1])
             n = len(new_list3)
             i = 0
             while (i < n):
                 # print(new_list3[i]+":"+new_list4[i])
                 company_dict[int(new_list4[i])] = new_list3[i][1:-1]
                 i = i + 1
         # print(genres_dict)
         for el in new_list4:
             # print(el)
             file1.write("""INSERT INTO FILM_COMPANY(FILM_ID, COMPANY_ID) VALUES(""" +
                   str(row[3]) + ", " + str(el) + "); \n")


         if row[10] == "[]":
             row[10] = """[{""id"": 0, ""name"": ""Not mentioned""}]"""
         row[10] = row[10][1:-1]
         # print(row[1][:-1])
         new_list = row[10][:-1].split("}, ")
         # print(new_list[2])
         new_list3 = list()
         new_list4 = list()
         for el in new_list:
             el = el[1:]
             # print(el)
             new_list2 = el.split(", ")
             # print(new_list2[0] +"/"+ new_list2[1])
             new_list3.append(new_list2[0].split(": ")[1])
             new_list4.append(new_list2[1].split(": ")[1])
             n = len(new_list3)
             i = 0
             while (i < n):
                 # print(new_list3[i]+":"+new_list4[i])
                 country_dict[new_list3[i]] = new_list4[i][1:-1]
                 i = i + 1
         # print(genres_dict)
         for el in new_list3:
             # print(el)
             el = el[1:-1]
             file1.write("""INSERT INTO FILM_COUNTRY(FILM_ID, COUNTRY_ID) VALUES(""" +
                  str(row[3]) + ", " + "'" + str(el).upper() + "'" + "); \n")


         if row[14] == "[]":
             row[14] = """[{""id"": 0, ""name"": ""Not mentioned""}]"""
         row[14] = row[14][1:-1]
         # print(row[1][:-1])
         new_list = row[14][:-1].split("}, ")
         # print(new_list[2])
         new_list3 = list()
         new_list4 = list()
         for el in new_list:
             el = el[1:]
             # print(el)
             new_list2 = el.split(", ")
             # print(new_list2[0] +"/"+ new_list2[1])
             new_list3.append(new_list2[0].split(": ")[1])
             new_list4.append(new_list2[1].split(": ")[1])
             n = len(new_list3)
             i = 0
             while (i < n):
                 # print(new_list3[i]+":"+new_list4[i])
                 language_dict[new_list3[i]] = new_list4[i][1:-1]
                 i = i + 1
         # print(genres_dict)
         for el in new_list3:
             # print(el)
             el = el[1:-1]
             file.write("""INSERT INTO FILM_LANGUAGE(FILM_ID, LANGUAGE_ID) VALUES(""" +
                   str(row[3]) + ", " + "'" + str(el)+"'" + "); \n")


for el in genres_dict.keys():
    print(str(el) +":" + genres_dict[el])
    file2.write("""INSERT INTO GENRES(GENRE_ID, NAME) VALUES(""" + str(el) + ", '" + genres_dict[el] + "');\n")

for el in keyword_dict.keys():
    print(str(el) +":" + keyword_dict[el])
    file2.write("""INSERT INTO KEYWORDS(KEYWORD_ID, NAME) VALUES(""" + str(el) + ", '" + keyword_dict[el] + "');\n")

for el in company_dict.keys():
    print(str(el) +":" + company_dict[el].replace("&","and"))
    file2.write("""INSERT INTO PRODUCTION_COMPANY(COMPANY_ID, NAME) VALUES(""" + str(el) + ", '" + company_dict[el].replace("&","and") + "');\n")


with open('country_csv.csv', newline='', encoding='utf-8') as csvfile:
    spamreader = csv.reader(csvfile)
    for row in spamreader:
        file2.write("""INSERT INTO PRODUCTION_COUNTRY(COUNTRY_ID, NAME) VALUES('""" + str(row[1]) + "', '" + str(row[0]) + "');\n")

with open('language-codes_csv.csv', newline='', encoding='utf-8') as csvfile:
    spamreader = csv.reader(csvfile)
    for row in spamreader:
        file2.write("""INSERT INTO SPOKEN_LANGUAGES(LANGUAGE_ID, NAME) VALUES('""" + str(row[0]) + "', '" + str(row[1]) + "');\n")
file.close()
