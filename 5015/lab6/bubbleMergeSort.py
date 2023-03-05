import random
import time


def bubble_sort(list):
    n = len(list)
    # Traverse through all list items
    for i in range(n):
        # Last i items are already in place
        for j in range(0, n-i-1):
            # traverse the list from 0 to n-i-1
            if list[j] > list[j+1]:
                list[j], list[j+1] = list[j+1], list[j]
            # Swap if the item found is greater than the next item
    return list


unsorted = []
sorted = []
i = 0


while i < 5000:
    number = random.randint(0, 10000)
    unsorted.append(number)
    i += 1
    # Build an unsorted list of 5000 items

i = 0
print("Unsorted List (First 20)")
while i < 20:
    print(unsorted[i])
    i += 1
    # print first 20 items of unsorted list


start_time = time.time()
sorted = bubble_sort(unsorted)

print()

i = 0
print("Sorted List (First 20)")
while i < 20:
    print(sorted[i])
    i += 1
    # print first 20 items of sorted list
end_time = time.time()
print("The bubble sort took", end_time - start_time, "seconds.")


print()
print("Partitioning unsorted list of 5000 integers into 2 sets of 2500 integers")
print()

# random.shuffle(unsorted)
# partition1 = unsorted[:2500]
# partition2 = unsorted[2500:]


unsorted = []
i = 0
partition1 = []
partition2 = []

while i < 5000:
    number = random.randint(0, 10000)
    unsorted.append(number)
    i += 1
    # Build an unsorted list of 5000 items


def partitionBubbleSort(arr):

    if len(arr) > 1:
        mid = len(arr)//2
        partition1 = arr[:mid]
        partition2 = arr[mid:]

        i = 0
        print()
        print("Unsorted Partition1 List (First 20)")
        while i < 20:
            print(partition1[i])
            i += 1
        # print first 20 items of partition1 list

        i = 0
        print()
        print("Unsorted Partition2 List (First 20)")
        while i < 20:
            print(partition2[i])
            i += 1
        # print first 20 items of partition2 list

        partition1 = bubble_sort(partition1)
        partition2 = bubble_sort(partition2)
        # create subarrays and bubble sort them


def mergeSort(subArr1, subArr2, sortedArr):

    i = k = j = 0
    # intial values for pointers we use to keep track of where we ate in the array

    while i < len(subArr1) and j < len(subArr2):
        if subArr1[i] < subArr2[j]:
            sortedArr[k] = subArr1[i]
            i += 1
        else:
            sortedArr[k] = subArr2[j]
            j += 1
        k += 1
    # until we reach the end of either start or end, pick larger among elements start and
    # end and place them in the correct position in the sorted array

    while i < len(subArr1):
        sortedArr[k] = subArr1[i]
        i += 1
        k += 1

    while j < len(subArr2):
        sortedArr[k] = subArr2[j]
        j += 1
        k += 1
    # when all elements are traversed in either partition1 or partition2,
    # pick up the remaining elements and put in sorted array


i = 0
print()
print("Unsorted List (First 20)")
while i < 20:
    print(unsorted[i])
    i += 1
    # print first 20 items of unsorted list

start_time = time.time()

sortedArr = []

partitionBubbleSort(unsorted)
mergeSort(partition1, partition2, sorted)

i = 0
print()
print("Sorted List (First 20)")
while i < 20:
    print(sorted[i])
    i += 1
    # print first 20 items of sorted list

end_time = time.time()
print("The bubble sorting of 2 partitioned sets and then applying mergeSort took",
      end_time - start_time, "seconds.")
