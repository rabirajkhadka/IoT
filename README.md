# IoT

**Database Configuration for WebApp**
* databaseName: "iot"
* tableName:    "led_one"
* userName:     "root"
* passWord:     ""

**Prerequisities for db2lcdPython-iotn**
* ApScheduler
  * pip install APScheduler 
* MySQL Connector for Python
  * pip install mysql-connector-python-rf

Instructions to Use Web Interface
* Click on LED ON and LED OFF button on index.php OR,
* Toggle the Switch from index2.php and click on Insert

Instructions to Read Database Entry from python Interface
* Run dbConnect.py or dbConnect2.py to check if "LED is ON" or "LED is OFF" shown or not
* Run scheduled.py or scheduled2.py to run script which get automatically updated on change in database
