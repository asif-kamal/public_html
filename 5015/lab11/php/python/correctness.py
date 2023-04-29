#!/home/TU/shi/anaconda3/bin/python
import numpy as np
import random
import sys
import os
from datetime import datetime
import string
import subprocess
from subprocess import call
from subprocess import check_output


if len(sys.argv) > 1:
    N = int(sys.argv[1]) #matrix size
else:
    print("Usage: correctness.py MatrixSize")
    exit() # For correctness tests only

x = 0 #Phase count
M1 = np.random.rand(N, N)
M2 = np.random.rand(N, N)


Matrix = [[0 for i in range(N)] for j in range(N)]
for i in range(N):
    for j in range(N):
        for k in range(N):
            Matrix[i][j] += M1[i,k] * M2[k,j]


print("<br>|i-j-k|<br>") 
for i in range(N):
    for j in range(N):
        print("{:4.2f}".format(Matrix[i][j]))
    print("<br>")

# Save output to "mout1.txt"
# np.savetxt(f"mout1.txt", Mout)


x = x + 1
Matrix = [[0 for i in range(N)] for j in range(N)]
for i in range(N):
    for k in range(N):
        for j in range(N):
            Matrix[i][j] += M1[i,k] * M2[k,j]


print("<br>|i-k-j|<br>") 
for i in range(N):
    for j in range(N):
        print("{:4.2f}".format(Matrix[i][j]))
    print("<br>")

    # Save output to "mout2.txt"
# np.savetxt(f"mout2.txt", Mout)

# output = subprocess.check_output(["diff", "mout1.txt", "mout2.txt"])
# if len(output) != 0:
#     print ("Differences found:"+"|"+output+"|")
# else:
#    print ("No differences found (i-k-j)") 

x = x + 1
Matrix = [[0 for i in range(N)] for j in range(N)]
for j in range(N):
    for i in range(N):
        for k in range(N):
            Matrix[i][j] += M1[i,k] * M2[k,j]

print("<br>|j-i-k|<br>") 
for i in range(N):
    for j in range(N):
        print("{:4.2f}".format(Matrix[i][j]))
    print("<br>")
    # Save output to "mout2.txt"
# np.savetxt(f"mout2.txt", Mout)

# output = subprocess.check_output(["diff", "mout1.txt", "mout2.txt"])
# if len(output) != 0:
#     print ("Differences found:"+"|"+output+"|")
# else:
#    print ("No differences found (j-i-k)") 

x = x + 1
Matrix = [[0 for i in range(N)] for j in range(N)]
for j in range(N):
    for k in range(N):
        for i in range(N):
            Matrix[i][j] += M1[i,k] * M2[k,j]

print("<br>|j-k-i|<br>") 
for i in range(N):
    for j in range(N):
        print("{:4.2f}".format(Matrix[i][j]))
    print("<br>")
    # Save output to "mout2.txt"
# np.savetxt(f"mout2.txt", Mout)

# output = subprocess.check_output(["diff", "mout1.txt", "mout2.txt"])
# if len(output) != 0:
#     print ("Differences found:"+"|"+output+"|")
# else:
#    print ("No differences found (j-k-i)") 

x = x + 1
Matrix = [[0 for i in range(N)] for j in range(N)]
for k in range(N):
    for i in range(N):
        for j in range(N):
            Matrix[i][j] += M1[i,k] * M2[k,j]

print("<br>|k-i-j|<br>") 
for i in range(N):
    for j in range(N):
        print("{:4.2f}".format(Matrix[i][j]))
    print("<br>")
    # Save output to "mout2.txt"
# np.savetxt(f"mout2.txt", Mout)

# output = subprocess.check_output(["diff", "mout1.txt", "mout2.txt"])
# if len(output) != 0:
#     print ("Differences found:"+"|"+output+"|")
# else:
#    print ("No differences found (k-i-j)") 

x = x + 1
Matrix = [[0 for i in range(N)] for j in range(N)]
for k in range(N):
    for j in range(N):
        for i in range(N):
            Matrix[i][j] += M1[i,k] * M2[k,j]

print("<br>|k-j-i|<br>") 
for i in range(N):
    for j in range(N):
        print("{:4.2f}".format(Matrix[i][j]))
    print("<br>")

    # Save output to "mout2.txt"
# np.savetxt(f"mout2.txt", Mout)

# output = subprocess.check_output(["diff", "mout1.txt", "mout2.txt"])
# if len(output) != 0:
#     print ("Differences found:"+"|"+output+"|")
# else:
#    print ("No differences found (k-j-i)") 

# subprocess.run(["rm","mout1.txt"])
# subprocess.run(["rm","mout2.txt"])

# w = open("m_time.txt", "w")
