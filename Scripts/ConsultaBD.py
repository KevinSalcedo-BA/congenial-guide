import mysql.connector

mydb= mysql.connector.connect(
	host="localhost",
	user="root",
	password="",
	database="reputationbd"
	)

cursor1 = mydb.cursor()

sql="INSERT INTO detailsp (Email, Web) VALUES (%s,%s)"
val = ("Paxzu@pazxu.co", "www.paxzu.com.co")
cursor1.execute(sql,  val)
val = ("Habitat@hbitat.co", "www.Habitat.com.co")
cursor1.execute(sql,  val)
val = ("Mosvistar@Movistar.co", "www.Mosvistar.com.co")
cursor1.execute(sql,  val)

mydb.commit()

print(cursor1.rowcount, "Dato insertado")

cursor1.execute("SELECT * FROM detailsp")
result= cursor1.fetchall()
for x in result:
	print(x)

