import requests
from bs4 import BeautifulSoup
import csv
from datetime import datetime

url= 'https://talosintelligence.com/reputation_center/lookup?search=104.36.166.244'

pagina= requests.get(url).text
soup = BeautifulSoup(pagina, "lxml")

tabla = soup.find('div', attrs={'id': 'email-data-wrapper'})
tabla

emailR=""
Reputation=""
nroFila=0
for fila in tabla.find_all("tr"):
	if nroFila==1:
		nroCelda=0
		for celda in fila.find_all('td'):
			if nroCelda==0:
				emailR=celda.text
				print("Web Reputation: ", emailR)
			if nroCelda==2:
				Reputation=celda.text
				print("Estado: ", Reputation)
			nroCelda=nroCelda+1
	nroFila=nroFila+1		

print(tabla.text)			