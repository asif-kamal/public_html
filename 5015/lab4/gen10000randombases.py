import random

with open("dnaOut.txt", "a") as f:
    f.write("".join([random.choice('ACGT') for _ in range(10000)]))
f.close()
