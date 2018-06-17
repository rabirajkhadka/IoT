import time, RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
GPIO.setup(5,GPIO.OUT)
GPIO.setwarnings(False)
GPIO.output(5, True)
time.sleep(1)
