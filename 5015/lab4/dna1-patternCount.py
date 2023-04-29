dnaIn = open("dna1.dat")
contents = dnaIn.read()
dnaIn.close()

input1 = input(("Which pattern? Type 'Total DNA bases' for all bases: "))
Count = contents.count(input1)

with open("dna1-patternCount.txt", "a") as f:
    if input1 != "Total DNA bases":
        f.write(input1 + ": " + str(Count) + "\n")
    else:
        Count = contents.count("A") + contents.count("C") + \
            contents.count("T") + contents.count("G")
        f.write(input1 + ": " + str(Count) + "\n")
f.close()
