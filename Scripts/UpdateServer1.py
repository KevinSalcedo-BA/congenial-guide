import mysql.connector
from selenium import webdriver
 
DRIVER = ('C:/Users/ASUS/Downloads/chromedriver/chromedriver.exe')
driver = webdriver.Chrome(DRIVER)
 
driver.get("https://talosintelligence.com/reputation_center/lookup?search=104.36.166.244")
nav = driver.find_element_by_id("email-data-wrapper")
#print(nav.text)
n=nav.text
part1=n.split(')')
result = part1[1].split('LAST')
print(result[0])

driver.quit()
mydb= mysql.connector.connect(
	host="localhost",
	user="root",
	password="",
	database="reputationbd"
	)

cursor1 = mydb.cursor()

sql="INSERT INTO detailsp (Email, Web) VALUES (%s,%s)"
val = (n, "www.paxzu.com.co")
cursor1.execute(sql,  val)

mydb.commit()

print(cursor1.rowcount, "Dato insertado")

cursor1.execute("SELECT * FROM detailsp")
result= cursor1.fetchall()
for x in result:
	print(x)
