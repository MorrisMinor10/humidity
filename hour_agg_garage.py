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

#def run_it(sc):

#       if (ser.inWaiting()>0):
if (1>0):

                ts = time.time()
                st = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
                newst = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:00:00')
                newst2 = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H')
                connection = MySQLdb.connect(host= "localhost",
                user="X",
                passwd="X",
                db="temperature")

#               if y >= 1:
#               try:
                cursor = connection.cursor ()
                cursor.execute ("SELECT avg(temperatur), avg(fugtighed) FROM temperature_tabel WHERE DATE_FORMAT(klokken, '%Y-%m-%d %H') = DATE_FORMAT('"+newst2+"', '%Y-%m-%d %H') group by DATE_FORMAT('"+newst2+"'$
#               cursor.execute ("SELECT max(klokken), temperatur, fugtighed FROM temperature_tabel WHERE klokken = '"+newst+"'")
                data = cursor.fetchall ()
                for row in data :
                        print row[0]
                        print row[1]#, row[2]
                        var0 = row[0]
                        var1 = row[1]
#                       var2 = row[2]
#                       print var0, var1#, var2
                        print newst, newst2
                x = connection.cursor()
#               if y >= 1:
                try:
                        x.execute("""INSERT INTO temperature_tabel_hour_agg (temperatur, klokken, fugtighed) VALUES (%s, %s, %s)""",(var0, newst, var1))
                        connection.commit()
                        #print 'Try working'
                except:
                        #conn.rollback()
                        print 'shit'
