#!/home/TU/shi/anaconda3/bin/python
"""Usage: sizeOfMatrix Repetiton"""
import numpy as np
import random
import sys
import os
from datetime import datetime
import string
import subprocess
from subprocess import call
from subprocess import check_output
import mysql.connector 

if len(sys.argv) > 6:
    Nm = int(sys.argv[1]) #matrix size
    R = int(sys.argv[2]) #number of repetitions
    SERVER = sys.argv[3]
    USER = sys.argv[4]
    PASSWORD = sys.argv[5]
    DATABASE = sys.argv[6]
else:
    print("Usage: bestOrder.py Nm Repetition Server User Password Database")
    exit()
#Matrix Performance Tests
#matrix.tmp.bak is the template file to generate different (ijk) orders
#w = open("MTime.txt", "w") ## Open MTime.txt log file
print("Received {N} R{r}\n".format(N=Nm,r=R))

def subprocess_cmd(command):
    process = subprocess.Popen(command,stdout=subprocess.PIPE, shell=True)
    proc_stdout = process.communicate()[0].strip()
    print (proc_stdout)

conn = mysql.connector.connect(host=SERVER, user=USER, password=PASSWORD, db=DATABASE)
cur = conn.cursor()
cur.execute("Truncate table PLogs")
conn.commit()

subprocess_cmd('cd python; make SIZE='+str(Nm))
# Do ijk
Te = datetime.now()
for i in range(R):
    subprocess.run(["python/bestOrder", "ijk", SERVER, USER, PASSWORD, DATABASE])
# Run
Te = datetime.now() - Te
TotalUs = float((Te.seconds * 1000000 + Te.microseconds)/R)
print("Matrix i-j-k: {N} {T} {M}\n".format(N=Nm, T=TotalUs, M=pow(Nm,3)/TotalUs))
now = datetime.now()
cur.execute("INSERT into PLogs (TimeStamp, ElapsedTime, Size,MFLOPS,LoopOrder)values (%s,%s,%s,%s,%s)",(now.strftime('%Y-%m-%d%H:%M:%S'),TotalUs,Nm,pow(Nm,3)/TotalUs,'ijk'))
conn.commit()
BestUs = TotalUs
BestOrder = "i-j-k"

# Do ikj
Te = datetime.now()
for i in range(R):
    subprocess.run(["python/bestOrder", "ikj", SERVER, USER, PASSWORD, DATABASE])
# Run
Te = datetime.now() - Te
TotalUs = float((Te.seconds * 1000000 + Te.microseconds)/R)
print("Matrix i-k-j: {N} {T} {M}\n".format(N=Nm, T=TotalUs, M=pow(Nm,3)/TotalUs))
now = datetime.now()
cur.execute("INSERT into PLogs (TimeStamp, ElapsedTime, Size,MFLOPS,LoopOrder)values (%s,%s,%s,%s,%s)",(now.strftime('%Y-%m-%d%H:%M:%S'),TotalUs,Nm,pow(Nm,3)/TotalUs,'ikj'))
conn.commit()
BestUs = TotalUs
BestOrder = "i-k-j"

# Do jik
Te = datetime.now()
for i in range(R):
    subprocess.run(["python/bestOrder", "jik", SERVER, USER, PASSWORD, DATABASE])
# Run
Te = datetime.now() - Te
TotalUs = float((Te.seconds * 1000000 + Te.microseconds)/R)
print("Matrix j-i-k: {N} {T} {M}\n".format(N=Nm, T=TotalUs, M=pow(Nm,3)/TotalUs))
now = datetime.now()
cur.execute("INSERT into PLogs (TimeStamp, ElapsedTime, Size,MFLOPS,LoopOrder)values (%s,%s,%s,%s,%s)",(now.strftime('%Y-%m-%d%H:%M:%S'),TotalUs,Nm,pow(Nm,3)/TotalUs,'jik'))
conn.commit()
BestUs = TotalUs
BestOrder = "j-i-k"

# Do jki
Te = datetime.now()
for i in range(R):
    subprocess.run(["python/bestOrder", "jki", SERVER, USER, PASSWORD, DATABASE])
# Run
Te = datetime.now() - Te
TotalUs = float((Te.seconds * 1000000 + Te.microseconds)/R)
print("Matrix j-k-i: {N} {T} {M}\n".format(N=Nm, T=TotalUs, M=pow(Nm,3)/TotalUs))
now = datetime.now()
cur.execute("INSERT into PLogs (TimeStamp, ElapsedTime, Size,MFLOPS,LoopOrder)values (%s,%s,%s,%s,%s)",(now.strftime('%Y-%m-%d%H:%M:%S'),TotalUs,Nm,pow(Nm,3)/TotalUs,'jki'))
conn.commit()
BestUs = TotalUs
BestOrder = "j-k-i"

# Do kij
Te = datetime.now()
for i in range(R):
    subprocess.run(["python/bestOrder", "kij", SERVER, USER, PASSWORD, DATABASE])
# Run
Te = datetime.now() - Te
TotalUs = float((Te.seconds * 1000000 + Te.microseconds)/R)
print("Matrix k-i-j: {N} {T} {M}\n".format(N=Nm, T=TotalUs, M=pow(Nm,3)/TotalUs))
now = datetime.now()
cur.execute("INSERT into PLogs (TimeStamp, ElapsedTime, Size,MFLOPS,LoopOrder)values (%s,%s,%s,%s,%s)",(now.strftime('%Y-%m-%d%H:%M:%S'),TotalUs,Nm,pow(Nm,3)/TotalUs,'kij'))
conn.commit()
BestUs = TotalUs
BestOrder = "k-i-j"

# Do kji
Te = datetime.now()
for i in range(R):
    subprocess.run(["python/bestOrder", "kji", SERVER, USER, PASSWORD, DATABASE])
# Run
Te = datetime.now() - Te
TotalUs = float((Te.seconds * 1000000 + Te.microseconds)/R)
print("Matrix k-j-i: {N} {T} {M}\n".format(N=Nm, T=TotalUs, M=pow(Nm,3)/TotalUs))
now = datetime.now()
cur.execute("INSERT into PLogs (TimeStamp, ElapsedTime, Size,MFLOPS,LoopOrder)values (%s,%s,%s,%s,%s)",(now.strftime('%Y-%m-%d%H:%M:%S'),TotalUs,Nm,pow(Nm,3)/TotalUs,'kji'))
conn.commit()
BestUs = TotalUs
BestOrder = "k-j-i"

print("Best Order: {B} {T} {N}\n".format(B=BestOrder, T=BestUs/1000000, P=pow(Nm, 3)/BestUs))
now = datetime.now() 
cur.execute("INSERT INTO PLogs (Host, Timestamp, ElapsedTime, Size, MFLOPS, LoopOrder) values (%s,%s,%s,%s,%s,%s)", 
            ("Best Order", now.strftime('%Y-%m-%d %H:%M:%S'), BestUs,Nm,pow(Nm,3)/BestUs, BestOrder))
conn.commit()
conn.close
cur.close
