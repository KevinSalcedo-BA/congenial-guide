from selenium import webdriver
from PIL import Image
from io import BytesIO

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
im.save('FirstScreenShot.png')

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
im2.save('SecondScreenShot.png')

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
im3.save('ThirdScreenShot.png')

