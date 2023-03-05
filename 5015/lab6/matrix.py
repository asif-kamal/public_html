import numpy as np
import random

# Input control variables
Nm = 100
R = 10

# Generate M1 and M2
M1 = np.random.rand(Nm, Nm)
M2 = np.random.rand(Nm, Nm)

# Initialize Mout
Mout = np.zeros((Nm, Nm))

# i-j-k loop for Mout=M1*M2
for r in range(R):
    for k in range(Nm):
        for j in range(Nm):
            for i in range(Nm):
                Mout[k,j] += M1[k,i] * M2[j,i]

    # Save output to "mout1.txt"
    np.savetxt(f"mout1_{r}.txt", Mout)

    # Reset Mout
    Mout = np.zeros((Nm, Nm))

# i-k-j loop for Mout=M1*M2
for r in range(R):
    for k in range(Nm):
        for i in range(Nm):
            for j in range(Nm):
                Mout[k,j] += M1[k,i] * M2[j,i]

    # Save output to "mout2.txt"
    np.savetxt(f"mout2_{r}.txt", Mout)

    # Reset Mout
    Mout = np.zeros((Nm, Nm))

# Compare "mout1.txt" and "mout2.txt" for differences
for r in range(R):
    mout1 = np.loadtxt(f"mout1_{r}.txt")
    mout2 = np.loadtxt(f"mout2_{r}.txt")
    if not np.allclose(mout1, mout2):
        print(f"mout1_{r}.txt and mout2_{r}.txt are different.")
        # Terminate if matrices are different
        break
else:
    print("All matrices are the same.")

# out = check_output([“diff”,”mout1.txt”,”mout2.txt”])
# if len(out) != 0:
#     print (“Differences found:”+”|”+out+”|”)
# else:
#    print (“No differences found”) 

# no differences were found in all the permutations