import RPi.GPIO as GPIO
import time
import spidev
from DbClass import DbClass
from datetime import datetime

spi = spidev.SpiDev()
spi.open(0,0)

# koeling = 21

R = 13
G = 19
B = 26
Relais = 21
binnensensor = 0
buitensensor = 1

def ReadChannel(channel):
  adc = spi.xfer2([1,(8+channel)<<4,0])
  data = ((adc[1]&3) << 8) + adc[2]
  return data

def ConvertVolts(data,places):
  milivolts = ((data) / float(1024))*5000
  milivolts = round(milivolts,places)
  return milivolts

def ConvertTemp(data, places):
    # ADC Value
    # (approx)  Temp  Volts
    #    0      -50    0.00
    #   78      -25    0.25
    #  155        0    0.50
    #  233       25    0.75
    #  310       50    1.00
    #  465      100    1.50
    #  775      200    2.50
    # 1023      280    3.30

    temp = (data)/10
    temp = round(temp, places)
    return temp

GPIO.setmode(GPIO.BCM)
GPIO.setup(Relais, GPIO.OUT)
# GPIO.setup(koeling, GPIO.OUT)
# GPIO.output(koeling, GPIO.HIGH)
# GPIO.setup(R, GPIO.OUT)
# GPIO.setup(G, GPIO.OUT)
# GPIO.setup(B, GPIO.OUT)
#
# GPIO.output(R, 255)
# time.sleep(2)
# GPIO.output(G, 255)
# time.sleep(2)
# GPIO.output(B, 255)
# time.sleep(2)
# GPIO.output(R, 0)
# GPIO.output(G, 0)
# GPIO.output(B, 0)

while True:
    temp_level_binnen = ReadChannel(binnensensor)
    temp_volts_binnen = ConvertVolts(temp_level_binnen, 2)
    temp_binnen = ConvertTemp(temp_volts_binnen, 2)

    temp_level_buiten = ReadChannel(buitensensor)
    temp_volts_buiten = ConvertVolts(temp_level_buiten, 2)
    temp_buiten = ConvertTemp(temp_volts_buiten, 2)

    print("")
    print("Temperatuur binnen: {} ({}mV) {} deg C".format(temp_level_binnen, temp_volts_binnen, temp_binnen))
    print("Temperatuur buiten: {} ({}mV) {} deg C".format(temp_level_buiten, temp_volts_buiten, temp_buiten))

    if (temp_binnen > 5.0):
        print('aan')
        GPIO.output(Relais, GPIO.HIGH)
    else:
        print('uit')
        GPIO.output(Relais, GPIO.LOW)

    DB_layer = DbClass()

    devicenaam = 'Prototype'

    DB_layer.setTemps(temp_binnen, temp_buiten, devicenaam)

    time.sleep(2)

    #test