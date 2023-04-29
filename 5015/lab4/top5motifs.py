from collections import Counter 

k = 5

dnaIn = open("dna1.dat")
contents = dnaIn.read().rstrip("\n")
dnaIn.close()

motifs = Counter([contents[i:i+k] for i in range(len(contents) - k + 1)])

with open("Top5Motifs.txt", "a") as f:
    f.write("Most common motifs: " + str(motifs.most_common(5)) + "\n")
f.close()