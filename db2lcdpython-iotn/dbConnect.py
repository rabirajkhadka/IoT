from mysql.connector import MySQLConnection, Error
from dbConfig import read_db_config
 
old_status = "OFF"
new_status ="OFF"
def connect():
    """ Connect to MySQL database """
 
    db_config = read_db_config()
    
    global old_status
    
    try:
        #print('Connecting to MySQL database...')
        conn = MySQLConnection(**db_config)
 
        if conn.is_connected():
            #print('connection established.')
            cursor = conn.cursor(dictionary=True)
            #cursor.execute("SELECT Humidity,Temperature FROM dht11 ORDER BY id DESC LIMIT 1")
            cursor.execute("SELECT * FROM led_one")
            #print("Old Humidity: {a} \nOld Temperature: {b}".format(a=old_Humidity,b=old_Temperature))
            
            for row in cursor:
                #print("New Humidity: {Humidity} \nNew Temperature: {Temperature}" .format(Humidity=row['Humidity'], Temperature=row['Temperature']))
                new_status = row["status"]

            if(old_status != new_status):
                old_status = new_status
                print("LED is {}".format(new_status))
                #GPIO.setmode(GPIO.BOARD)
                #GPIO.setup(5,GPIO.OUT)
                #GPIO.setwarnings(False)
                #GPIO.output(5, True)
                #time.sleep(1)

            #if(old_status == "OFF"):
                #print("LED OFF")
                #GPIO.setmode(GPIO.BOARD)
                #GPIO.setup(5,GPIO.OUT)
                #GPIO.setwarnings(False)
                #GPIO.output(5, False)
                #time.sleep(1)

            #row = cursor.fetchall()
            #print(row)
        else:
            print('connection failed.')
 
    except Error as error:
        print(error)
 
    finally:
        cursor.close()
        conn.close()
        #print('Connection closed.')

if __name__ == '__main__':
    connect()