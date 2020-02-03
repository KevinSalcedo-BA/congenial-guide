from selenium import webdriver
 
DRIVER = ('C:/Users/ASUS/Downloads/chromedriver/chromedriver.exe')
driver = webdriver.Chrome(DRIVER)
 
driver.get("https://talosintelligence.com/reputation_center/lookup?search=104.36.166.244")
nav = driver.find_element_by_id("email-data-wrapper")
print(nav.text)

driver.quit()