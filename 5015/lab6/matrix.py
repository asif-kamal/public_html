import numpy as np
import random
import subprocess
from datetime import datetime

# Input control variables
Nm = 100
R = 10

# Generate M1 and M2
M1 = np.random.rand(Nm, Nm)
M2 = np.random.rand(Nm, Nm)

# Initialize Mout
Mout = np.zeros((Nm, Nm))

# i-j-k loop for Mout=M1*M2

for i in range(Nm):
    for j in range(Nm):
        for k in range(Nm):
            Mout[i,j] += M1[i,k] * M2[k,j]

# Save output to "mout1.txt"
np.savetxt(f"mout1.txt", Mout)

# Reset Mout
Mout = np.zeros((Nm, Nm))

# i-k-j loop for Mout=M1*M2
for i in range(Nm):
    for k in range(Nm):
        for j in range(Nm):
            Mout[i,j] += M1[i,k] * M2[k,j]

    # Save output to "mout2.txt"
np.savetxt(f"mout2.txt", Mout)

output = subprocess.check_output(["diff", "mout1.txt", "mout2.txt"])
if len(output) != 0:
    print ("Differences found:"+"|"+output+"|")
else:
   print ("No differences found (i-k-j)") 

Mout = np.zeros((Nm, Nm))

# j-i-k loop for Mout=M1*M2
for j in range(Nm):
    for i in range(Nm):
        for k in range(Nm):
            Mout[i,j] += M1[i,k] * M2[k,j]

    # Save output to "mout2.txt"
np.savetxt(f"mout2.txt", Mout)

output = subprocess.check_output(["diff", "mout1.txt", "mout2.txt"])
if len(output) != 0:
    print ("Differences found:"+"|"+output+"|")
else:
   print ("No differences found (j-i-k)") 

Mout = np.zeros((Nm, Nm))

# j-k-i loop for Mout=M1*M2
for j in range(Nm):
    for k in range(Nm):
        for i in range(Nm):
            Mout[i,j] += M1[i,k] * M2[k,j]

    # Save output to "mout2.txt"
np.savetxt(f"mout2.txt", Mout)

output = subprocess.check_output(["diff", "mout1.txt", "mout2.txt"])
if len(output) != 0:
    print ("Differences found:"+"|"+output+"|")
else:
   print ("No differences found (j-k-i)") 

Mout = np.zeros((Nm, Nm))

# k-i-j loop for Mout=M1*M2
for k in range(Nm):
    for i in range(Nm):
        for j in range(Nm):
            Mout[i,j] += M1[i,k] * M2[k,j]

    # Save output to "mout2.txt"
np.savetxt(f"mout2.txt", Mout)

output = subprocess.check_output(["diff", "mout1.txt", "mout2.txt"])
if len(output) != 0:
    print ("Differences found:"+"|"+output+"|")
else:
   print ("No differences found (k-i-j)") 

Mout = np.zeros((Nm, Nm))

# k-j-i loop for Mout=M1*M2
for k in range(Nm):
    for j in range(Nm):
        for i in range(Nm):
            Mout[i,j] += M1[i,k] * M2[k,j]

    # Save output to "mout2.txt"
np.savetxt(f"mout2.txt", Mout)

output = subprocess.check_output(["diff", "mout1.txt", "mout2.txt"])
if len(output) != 0:
    print ("Differences found:"+"|"+output+"|")
else:
   print ("No differences found (k-j-i)") 

subprocess.run(["rm","mout1.txt"])
subprocess.run(["rm","mout2.txt"])

w = open("m_time.txt", "w")
    

#ijk
subprocess.run(["cp","matrixTemplate.c","matrix_ijk.c" ])
subprocess.run(["sed","-i","s/#1/i/g","matrix_ijk.c"])
subprocess.run(["sed","-i","s/#2/j/g","matrix_ijk.c"])
subprocess.run(["sed","-i","s/#3/k/g","matrix_ijk.c"])
subprocess.run(["gcc","-o","matrix_ijk","-DN="+str(Nm),"matrix_ijk.c" ])
# result = subprocess.run(["gcc","-o","matrix_ijk","-DN="+str(Nm),"matrix_ijk.c" ], capture_output=True, text=True)
# print(result.returncode)
# print(result.stdout)
# print(result.stderr)

start_time = datetime.now()

for i in range(R):
    subprocess.run(["./matrix_ijk"])

elapsed_time = datetime.now() - start_time
total_us = float((elapsed_time.seconds * 1000000 + elapsed_time.microseconds)/R)
w.write("matrix i-j-k:\n {N} {T} {M} \n".format(N=Nm, T= total_us, M=pow(Nm, 3)/total_us))

#ikj
subprocess.run(["cp","matrixTemplate.c","matrix_ikj.c" ])
subprocess.run(["sed","-i","s/#1/i/g","matrix_ikj.c"])
subprocess.run(["sed","-i","s/#2/k/g","matrix_ikj.c"])
subprocess.run(["sed","-i","s/#3/j/g","matrix_ikj.c"])
subprocess.run(["gcc","-o","matrix_ikj","-DN="+str(Nm),"matrix_ikj.c" ])
start_time = datetime.now()

for i in range(R):
    subprocess.run(["./matrix_ikj"])

elapsed_time = datetime.now() - start_time
total_us = float((elapsed_time.seconds * 1000000 + elapsed_time.microseconds)/R)
w.write("matrix i-k-j:\n {N} {T} {M} \n".format(N=Nm, T= total_us, M=pow(Nm, 3)/total_us ))

#jik
subprocess.run(["cp","matrixTemplate.c","matrix_jik.c" ])
subprocess.run(["sed","-i","s/#1/j/g","matrix_jik.c"])
subprocess.run(["sed","-i","s/#2/i/g","matrix_jik.c"])
subprocess.run(["sed","-i","s/#3/k/g","matrix_jik.c"])
subprocess.run(["gcc","-o","matrix_jik","-DN="+str(Nm),"matrix_jik.c" ])
start_time = datetime.now()

for i in range(R):
    subprocess.run(["./matrix_jik"])

elapsed_time = datetime.now() - start_time
total_us = float((elapsed_time.seconds * 1000000 + elapsed_time.microseconds)/R)
w.write("matrix j-i-k:\n {N} {T} {M} \n".format(N=Nm, T= total_us, M=pow(Nm, 3)/total_us ))

#jki
subprocess.run(["cp","matrixTemplate.c","matrix_jki.c" ])
subprocess.run(["sed","-i","s/#1/j/g","matrix_jki.c"])
subprocess.run(["sed","-i","s/#2/k/g","matrix_jki.c"])
subprocess.run(["sed","-i","s/#3/i/g","matrix_jki.c"])
subprocess.run(["gcc","-o","matrix_jki","-DN="+str(Nm),"matrix_jki.c" ])
start_time = datetime.now()

for i in range(R):
    subprocess.run(["./matrix_jki"])

elapsed_time = datetime.now() - start_time
total_us = float((elapsed_time.seconds * 1000000 + elapsed_time.microseconds)/R)
w.write("matrix j-k-i:\n {N} {T} {M} \n".format(N=Nm, T= total_us, M=pow(Nm, 3)/total_us ))

#kij
subprocess.run(["cp","matrixTemplate.c","matrix_kij.c" ])
subprocess.run(["sed","-i","s/#1/k/g","matrix_kij.c"])
subprocess.run(["sed","-i","s/#2/i/g","matrix_kij.c"])
subprocess.run(["sed","-i","s/#3/j/g","matrix_kij.c"])
subprocess.run(["gcc","-o","matrix_kij","-DN="+str(Nm),"matrix_kij.c" ])
start_time = datetime.now()

for i in range(R):
    subprocess.run(["./matrix_kij"])

elapsed_time = datetime.now() - start_time
total_us = float((elapsed_time.seconds * 1000000 + elapsed_time.microseconds)/R)
w.write("matrix k-i-j:\n {N} {T} {M} \n".format(N=Nm, T= total_us, M=pow(Nm, 3)/total_us ))

#kji
subprocess.run(["cp","matrixTemplate.c","matrix_kji.c" ])
subprocess.run(["sed","-i","s/#1/k/g","matrix_kji.c"])
subprocess.run(["sed","-i","s/#2/j/g","matrix_kji.c"])
subprocess.run(["sed","-i","s/#3/i/g","matrix_kji.c"])
subprocess.run(["gcc","-o","matrix_kji","-DN="+str(Nm),"matrix_kji.c" ])
start_time = datetime.now()

for i in range(R):
    subprocess.run(["./matrix_kji"])

elapsed_time = datetime.now() - start_time
total_us = float((elapsed_time.seconds * 1000000 + elapsed_time.microseconds)/R)
w.write("matrix k-j-i:\n {N} {T} {M} \n".format(N=Nm, T= total_us, M=pow(Nm, 3)/total_us ))
w.close()

# no differences were found in all the permutations