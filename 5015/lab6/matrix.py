import numpy as np
import random
import subprocess
import time

# Input control variables
Nm = 10
R = 1

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
   print ("No differences found") 

subprocess.run(["rm","mout1.txt"])
subprocess.run(["rm","mout2.txt"])

#ijk
subprocess.run(["cp","matrixTemplate.c","matrix.c" ])
subprocess.run(["sed","-i s/#1/i/g","matrix.c"])
subprocess.run(["sed","-i s/#2/j/g","matrix.c"])
subprocess.run(["sed","-i s/#3/k/g","matrix.c"])
subprocess.run(["gcc","-DN="+str(Nm),"-o","matrix_ijk","matrix_ijk.c" ])
start_time = time.time()

for i in range(R):
    subprocess.run(["./matrix_ijk"])
elapsed_time = time.time() - start_time

# no differences were found in all the permutations