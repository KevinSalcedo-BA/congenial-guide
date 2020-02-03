from selenium import webdriver
from bs4 import BeautifulSoup
import pandas as pd
import csv

DRIVER = ('C:/Users/ASUS/Downloads/chromedriver/chromedriver.exe')
driver = webdriver.Chrome(DRIVER)

Email=[] #lista email reputation
WebR=[]#lista web reputation

driver.get("https://talosintelligence.com/reputation_center/lookup?search=104.36.166.244")

content = driver.page_source
soup = BeautifulSoup(content, "html5lib")
for a in soup.find_all('div',href=True, attrs={'id':'email-data-wrapper'}):
	emailR=a.find_all('span', attrs={'class':'vol-decrease'})
	weR=a.find_all('span', attrs={'class':'new-legacy-label'})
	Email=append(emailR.text)
	WebR=append(weR.text)

df = pd.DataFrame({'Email':Email,'Web':WebR})
df.to_csv('Prueba.csv', index=False, encoding='utf-8')