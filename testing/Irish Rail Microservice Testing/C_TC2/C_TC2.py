from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time
#C_TC1: We are using the Google Chrome browser to launch our app and is trying to provid a junk value for the train code to check its response(NULL resposne).
driver= webdriver.Chrome("/home/antony/Desktop/Irish Rail Microservice Testing/chromedriver")
driver.get("http://localhost/ASE-Rail/index.php")
driver.maximize_window();
time.sleep(3) 
driver.save_screenshot("./Screenshot/C_TC2:Step-1.png")
null_code="$%^#"

search_s= driver.find_element_by_xpath("/html/body/div/form/input[1]")
search_s.send_keys(null_code)
driver.execute_script("window.scrollTo(0, 20)") 
time.sleep(2) 
driver.save_screenshot("./Screenshot/C_TC2:Step-2.png")
search_button_s=driver.find_element_by_xpath("/html/body/div[1]/form/input[2]")
search_button_s.click()  
driver.execute_script("window.scrollTo(0, 1080)") 
time.sleep(2) 
driver.save_screenshot("./Screenshot/C_TC2:Step-3.png")
