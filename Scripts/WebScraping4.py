from bs4 import BeautifulSoup
import pymysql.cursors
from selenium import webdriver

#Coneccion pagina
 
DRIVER = ('C:/Users/ASUS/Downloads/chromedriver/chromedriver.exe')
driver = webdriver.Chrome(DRIVER)
 
driver.get("https://talosintelligence.com/reputation_center/lookup?search=104.36.166.244")
#Definir objeto Soup
bsObj = BeautifulSoup(driver)
DatosServe  = bsObj.findAll("div",{"id" : "email-data-wrapper"})

#Coneccion BD

connection = pymysql.connect(host='localhost',
							 user='root',
							 password='',
							 db='reputationbd',
							 charset='utf8_spanish2_ci',
							 cursorclass=pymysql.cursors.DictCursor)	 
try:
		with connection.cursor() as cursor:
			for record in DatosServe:
				Email = record.find("span", {"class": "details-rep--"}).get_text().strip()
				Web = record.find("span", {"class": "new-legacy-label"}).get_text().strip()
				sql= "INSERT INTO `detailsp` (`Email`, `Web`) VALUES (%s,%s)"
				cursor.execute(sql, (Email, Web))
		connection.commit()
finally:
	connection.close()	