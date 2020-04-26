from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time;
#C_TC3: We are using the Google Chrome browser to launch our app and obtain a Validating if the number of response of the API is matching the dynamically populated records.
driver= webdriver.Chrome("/home/antony/Desktop/Irish Rail Microservice Testing/chromedriver")
driver.get("http://localhost/ASE-Rail/index.php")
driver.maximize_window();
time.sleep(3) 
driver.save_screenshot("./Screenshot/C_TC3: Step-1.png")
my_list = []
try:
	for x in range(100):
		h=str(x+2)
		str1="/html/body/div/center/table/tbody/tr["+h+"]/td[1]"
		e = driver.find_element_by_xpath(str1)
		my_list.append(e.text)

except:
	print("An exception occurred:Out of range")

print("responses from API: ",my_list,"\n")
print("Total number of responses from API= ",len(my_list))
if (str(len(my_list)) in driver.page_source):
	print("Response Matched")

else:
	print("Response not Matched")


