from selenium import webdriver
DRIVER = ('C:/Users/ASUS/Downloads/chromedriver/chromedriver.exe')
driver = webdriver.Chrome(DRIVER)
driver.get('https://www.talosintelligence.com/reputation_center/lookup?search=192.190.43.2')
screenshot = driver.save_screenshot('my_screenshot.png')
driver.quit()