
import time
from selenium import webdriver

#C_TC2: We are using the Google Chrome browser to launch our app and is trying to checking the map.



driver= webdriver.Chrome("/home/antony/Desktop/high resolution image (thumbnail)/Irish Rail Microservice Testing/chromedriver")

driver.get('file:///home/antony/Downloads/ASE-Project-master(2)/ASE-Project-master/DublinBikes.html')


driver.refresh();
time.sleep(5) 
map=driver.find_element_by_xpath("/html/body/div[4]/div/div/div[1]/div[3]/div/div[3]/div[7]/img")

driver.save_screenshot("./Screenshot/C_TC2: Step-1.png")


map.click()
driver.save_screenshot("./Screenshot/C_TC2: Step-2.png")
