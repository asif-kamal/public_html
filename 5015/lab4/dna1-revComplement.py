dnaIn = open("dna1.dat")
contents = dnaIn.read().rstrip("\n")
dnaIn.close()


def reverse_complement(dna):
    complement = {'A': 'T', 'C': 'G', 'G': 'C', 'T': 'A'}
    return "".join([complement[base] for base in dna[::-1]])


with open("dna1-revComplement.txt", "a") as f:
    f.write("Reverse Complement: " + reverse_complement(contents))
f.close()
