dnaIn = open("dna1.dat")
contents = dnaIn.read()
dnaIn.close()

def cg_content(dna):
    cg = [base for base in dna if base in 'CG']
    return float(len(cg)/len(dna))


with open("dna1-gcCount.txt", "a") as f:
    f.write("CG counts out of all bases: " + str((cg_content(contents) * 100)) + "%\n")
f.close()
