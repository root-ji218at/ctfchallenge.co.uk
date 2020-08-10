file = open("0-1000.txt", "w")

for num in range (1001):
	file.write(str(num)+"\n")

file.close()

print("Completly printed 0-1000 in file 0-1000.txt")
