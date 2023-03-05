dnaIn = open("dna1.dat")
contents = dnaIn.read()
dnaIn.close()

dna2In = open("dna2.dat")
contents2 = dna2In.read()
dna2In.close()


def hamming(lhs, rhs):
    return len([(x, y) for x, y in zip(lhs, rhs) if x != y])


with open("hammingOut.txt", "a") as f:
    f.write("Hamming distance: " + str(hamming(contents, contents2)))
f.close()
