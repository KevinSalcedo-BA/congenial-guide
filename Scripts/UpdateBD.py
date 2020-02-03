import mysql.connector
from selenium import webdriver
import datetime 


DRIVER = ('C:/Users/ASUS/Downloads/chromedriver/chromedriver.exe')
driver = webdriver.Chrome(DRIVER)
driver.get("https://talosintelligence.com/reputation_center/lookup?search=104.36.166.244")
#Fecha
now = datetime.datetime.now()
#conexion BD
mydb= mysql.connector.connect(
	host="104.36.166.244",
	user="paxzupru_intra",
	password="intra1q2w3e4r5T",
	database="paxzupru_intra"
	)
cursor1 = mydb.cursor()
#webScraping
nav = driver.find_element_by_id("email-data-wrapper")
n=nav.text
#Corte info
part= n.split('N')
ress = part[2].split('WEB')

part1=n.split(')')
result = part1[1].split('LAST')

nav2 = driver.find_element_by_id("owner-data-wrapper")
n2= nav2.text

part2=n2.split('ADDRESS')
result2 = part2[1].split('FWD')

#Query BD
sql="UPDATE reputationdetails SET email_rep = %s, web_rep = %s, ip = %s, Fecha = %s WHERE ip = %s"
val = (ress[0],result[0],result2[0],now,result2[0])

cursor1.execute(sql,  val)
mydb.commit()

print(result2[0], " actualizado")

cursor1.execute("SELECT * FROM reputationdetails")
result= cursor1.fetchall()
for x in result:
	print(x)
#cerrar driver	
driver.quit()


driver2 = webdriver.Chrome(DRIVER)
driver2.get("https://talosintelligence.com/reputation_center/lookup?search=104.36.167.4")
#webScraping
nav3 = driver2.find_element_by_id("email-data-wrapper")
n=nav3.text
#Corte info
part9= n.split('N')
ress1 = part9[2].split('WEB')

part3=n.split(')')
result3 = part3[1].split('LAST')

nav4 = driver2.find_element_by_id("owner-data-wrapper")
n4= nav4.text

part4=n4.split('ADDRESS')
result4 = part4[1].split('FWD')

#Query BD
sql="UPDATE reputationdetails SET email_rep = %s, web_rep = %s, ip = %s, Fecha = %s WHERE ip = %s"
val = (ress1[0],result3[0],result4[0],now,result4[0])

cursor1.execute(sql,  val)
mydb.commit()

cursor1.execute("SELECT * FROM reputationdetails")
result= cursor1.fetchall()
for x in result:
	print(x)
#cerrar driver
driver2.quit()	


driver3 = webdriver.Chrome(DRIVER)
driver3.get("https://talosintelligence.com/reputation_center/lookup?search=192.190.43.2")
#webScraping
nav5 = driver3.find_element_by_id("email-data-wrapper")
n=nav5.text
#Corte info
part8= n.split('N')
ress2 = part8[2].split('WEB')

part5=n.split(')')
result5 = part5[1].split('LAST')

nav6 = driver3.find_element_by_id("owner-data-wrapper")
n6= nav6.text

part6=n6.split('ADDRESS')
result6 = part6[1].split('FWD')
#Query BD
sql="UPDATE reputationdetails SET email_rep = %s, web_rep = %s, ip = %s, Fecha = %s WHERE ip = %s"
val = (ress2[0],result5[0],result6[0],now,result6[0])

cursor1.execute(sql,  val)
mydb.commit()

cursor1.execute("SELECT * FROM reputationdetails")
result= cursor1.fetchall()
for x in result:
	print(x)
#cerrar driver	
driver3.quit()
