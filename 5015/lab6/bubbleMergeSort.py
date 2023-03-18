import random
import datetime
import subprocess
import numpy as np


# Define the number of control variables
Ns = 5000  # Size of sort
R = 10  # Number of repeated tests

# Generate input data
input_list = list(np.random.randint(0, 100, Ns))
input_numpy = np.random.randint(0, 100, Ns)

# Bubble sort function
def bubble_sort(arr):
    n = len(arr)
    for i in range(n):
        for j in range(0, n-i-1):
            if arr[j] > arr[j+1]:
                arr[j], arr[j+1] = arr[j+1], arr[j]
    return arr

# Test bubble sort with small Ns
small_input = [4, 2, 1, 7, 5]
assert bubble_sort(small_input) == [1, 2, 4, 5, 7]

sorted = []
# Run bubble sort R-times and report the average time
bubble_sort_times = []
for i in range(R):
    start_time = datetime.datetime.now()
    sorted = bubble_sort(input_list)
    end_time = datetime.datetime.now()
    bubble_sort_times.append((end_time - start_time).total_seconds())

    with open("one_pass_sort_output.txt", "w") as f:
        f.write(str(sorted))


print("Bubble Sort average time:", sum(bubble_sort_times)/R)

# Divide input into two sets
split_index = Ns // 2
input_list1 = input_list[:split_index]
input_list2 = input_list[split_index:]

# Merge sort function
def merge_sort(arr):
    if len(arr) <= 1:
        return arr
    mid = len(arr) // 2
    left = merge_sort(arr[:mid])
    right = merge_sort(arr[mid:])
    return merge(left, right)

def merge(left, right):
    result = []
    i, j = 0, 0
    while i < len(left) and j < len(right):
        if left[i] < right[j]:
            result.append(left[i])
            i += 1
        else:
            result.append(right[j])
            j += 1
    result += left[i:]
    result += right[j:]
    return result

# Run bubble sort on both sets
start_time = datetime.datetime.now()
sorted_list1 = bubble_sort(input_list1)
sorted_list2 = bubble_sort(input_list2)

# Merge the two intermediate outputs
merged_output = merge(sorted_list1, sorted_list2)
end_time = datetime.datetime.now()

print("The bubble sorting of 2 partitioned sets and then applying mergeSort took",
      end_time - start_time, "seconds.")
with open("split_sort_output.txt", "w") as f:
    f.write(str(merged_output))

# Compare the contents of the two files using the "diff" command-line tool
try:
    output = subprocess.check_output(["diff", "split_sort_output.txt", "one_pass_sort_output.txt"])
    if output:
        print("Outputs of split-sort and one-pass sort differ")
    else:
        print("Outputs of split-sort and one-pass sort are the same")
except subprocess.CalledProcessError as e:
    print("Error: ", e)

subprocess.run(["rm","split_sort_output.txt"])
subprocess.run(["rm","one_pass_sort_output.txt"])
