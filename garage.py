#!/usr/bin/env python


import time
#import serial
import datetime
import MySQLdb
import sched
from time import sleep
import re
import itertools as IT
import HTU21DF

timestr = time.strftime("%Y%m%d-%H")

s = sched.scheduler(time.time, time.sleep)

def run_it(sc):

#       if (ser.inWaiting()>0):
        if (1>0):

                temp=HTU21DF.read_temperature()
                humid=HTU21DF.read_humidity()

#               y=ser.readline()
#               z=re.findall("\d+\.\d+", temp2)[0]
#               zz=re.findall("\d+\.\d+", temp2)[1]
                z = round(temp, 2)
#               print z
                zz = round(humid, 2)
#               print zz
                ts = time.time()
                st = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
                conn = MySQLdb.connect(host= "localhost",
                user="root",
                passwd="mantas12jacob18",
                db="temperature")
                x = conn.cursor()
#               if y >= 1:
                try:
                        x.execute("""INSERT INTO temperature_tabel (fugtighed, klokken, temperatur) VALUES (%s, %s, %s)""",(zz, st, z))
                        conn.commit()
                        #print 'Try working'
                except:
                        #conn.rollback()
                        print 'shit'
                conn.close()
#               sleep(0.01)
#               print y
                s.enter(1, 1, run_it, (sc,))

s.enter(1, 1, run_it, (s,))
s.run()
