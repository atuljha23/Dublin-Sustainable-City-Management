import time
from selenium import webdriver

#C_TC1: We are using the Google Chrome browser to launch our app and is trying to obtain a bike's availability and also checking the link of weather.

driver= webdriver.Chrome("/home/antony/Desktop/high resolution image (thumbnail)/Irish Rail Microservice Testing/chromedriver")
driver.get('file:///home/antony/Downloads/ASE-Project-master(2)/ASE-Project-master/DublinBikes.html')
driver.maximize_window();
driver.refresh();
print(driver.find_element_by_id("Availability").text)
driver.save_screenshot("./Screenshot/C_TC1: Step-1.png")
time.sleep(5) 
driver.execute_script("window.scrollTo(0, 100)") 
driver.save_screenshot("./Screenshot/C_TC1: Step-2.png")
link=driver.find_element_by_xpath("/html/body/footer/a[2]")
link.click()
driver.save_screenshot("./Screenshot/C_TC1: Step-3.png")
