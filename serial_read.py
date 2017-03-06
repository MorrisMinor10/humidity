#!/usr/bin/env python
          
      
import time
import serial
import datetime          
      
ser = serial.Serial(
              
               port='/dev/ttyUSB0',
               baudrate = 9600,
               parity=serial.PARITY_NONE,
               stopbits=serial.STOPBITS_ONE,
               bytesize=serial.EIGHTBITS,
               timeout=1
           )
# counter=1

timestr = time.strftime("%Y%m%d-%H")

f = open( timestr + 'temp.txt', 'w' )

t_end = time.time() + 3590
while time.time() < t_end:          
	if (ser.inWaiting()>0):      
#while 1:
               x=ser.readline()
               ts = time.time()
               st = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
               if x >= 1:
               	f.write( st+ " " + x ) #+  '\n' )
               	print x
f.close()

