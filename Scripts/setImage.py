from selenium import webdriver
from PIL import Image
from io import BytesIO
import ftplib
import os

#FTP datos
ftp_servidor = 'ftp.paxzu.co'
ftp_usuario = 'dashboard@paxzu.co'
ftp_clave = '1q2w3e4r5T_2019'


#Llamo chromedriver
DRIVER = ('C:/Users/ASUS/Downloads/chromedriver/chromedriver.exe')
driver = webdriver.Chrome(DRIVER)
#Tomo screenshot first
driver.get('https://talosintelligence.com/reputation_center/lookup?search=104.36.166.244')
element=driver.find_element_by_id('email-data-wrapper')
location = element.location
size = element.size
screenshot = driver.get_screenshot_as_png()
driver.quit()

im= Image.open(BytesIO(screenshot))

left= location['x']
top= location['y']
right= location['x']+ size['width']
bottom= location['y']+size['height']

im= im.crop((left,top,right,bottom))
im.save('C:/Users/ASUS/Desktop/ScreenShots/FirstScreenShot.png')

#Tomo Screenshot second

driver2 = webdriver.Chrome(DRIVER)
driver2.get('https://talosintelligence.com/reputation_center/lookup?search=104.36.167.4')
element=driver2.find_element_by_id('email-data-wrapper')
location = element.location
size = element.size
screenshot2 = driver2.get_screenshot_as_png()
driver2.quit()

im2= Image.open(BytesIO(screenshot2))

left= location['x']
top= location['y']
right= location['x']+ size['width']
bottom= location['y']+size['height']

im2= im2.crop((left,top,right,bottom))
im2.save('C:/Users/ASUS/Desktop/ScreenShots/SecondScreenShot.png')

#Tomo ScreenShot third

driver3 = webdriver.Chrome(DRIVER)
driver3.get('https://talosintelligence.com/reputation_center/lookup?search=192.190.43.2')
element=driver3.find_element_by_id('email-data-wrapper')
location = element.location
size = element.size
screenshot3 = driver3.get_screenshot_as_png()
driver3.quit()

im3= Image.open(BytesIO(screenshot3))

left= location['x']
top= location['y']
right= location['x']+ size['width']
bottom= location['y']+size['height']

im3= im3.crop((left,top,right,bottom))
im3.save('C:/Users/ASUS/Desktop/ScreenShots/ThirdScreenShot.png')

#datos de los ScreenShoot a subir
fichero_origen = 'C:/Users/ASUS/Desktop/ScreenShots/FirstScreenShot.png' # Ruta al ScreenShoot que vamos a subir
fichero_origen2 = 'C:/Users/ASUS/Desktop/ScreenShots/SecondScreenShot.png' # Ruta al ScreenShoot que vamos a subir
fichero_origen3 = 'C:/Users/ASUS/Desktop/ScreenShots/ThirdScreenShot.png' # Ruta al ScreenShoot que vamos a subir|
fichero_destino = 'FirstScreenShot.png' # Nombre que tendrá el ScreenShoot en el servidor
fichero_destino2 = 'SecondScreenShot.png' # Nombre que tendrá el ScreenShoot en el servidor
fichero_destino3 = 'ThirdScreenShot.png' # Nombre que tendrá el ScreenShoot en el servidor


try:
	s=ftplib.FTP(ftp_servidor, ftp_usuario, ftp_clave)
	try:
		f3 = open(fichero_origen3, 'rb')
		#s.cwd()
		s.storbinary('STOR '+fichero_destino3, f3)
		f3.close()
		s.quit()
	except:
		print ("No se ha podido encontrar el screenshot "+fichero_origen3)
except:
	print ("No se ha podido conectar al servidor "+ftp_servidor) 



try:
	s=ftplib.FTP(ftp_servidor, ftp_usuario, ftp_clave)
	try:
		f2 = open(fichero_origen2, 'rb')
		#s.cwd()
		s.storbinary('STOR '+fichero_destino2, f2)
		f2.close()
		s.quit()
	except:
		print ("No se ha podido encontrar el screenshot "+fichero_origen2)
except:
	print ("No se ha podido conectar al servidor "+ftp_servidor)


try:
	s= ftplib.FTP(ftp_servidor, ftp_usuario, ftp_clave)
	try:
		f = open(fichero_origen, 'rb')
		#s.cwd()
		s.storbinary('STOR '+fichero_destino, f)
		f.close()
		s.quit()
	except:
		print ("No se ha podido encontrar el screenshot "+fichero_origen)
except:
	print ("No se ha podido conectar al servidor "+ftp_servidor)

