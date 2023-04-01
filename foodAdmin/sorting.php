<?php

//class of sorting algorithms
class Algorithms
{
    public static function copyArray($arr)
    {
        $newArr = array();
        foreach ($arr as $ar) {
            $newArr[] = $ar['id'];
        }
        return $newArr;
    }

    //seach by id in arr
    public static function search($arr, $id)
    {
        $newArr = array();
        foreach ($arr as $ar) {
            if ($ar['id'] == $id) {
                return $ar;
            }
        }
        return NULL;
    }

    //function to sort the array using bubble sort
    public static function bubbleSortAscending(&$array)
    {
        $length = count($array);
        for ($i = 0; $i < $length - 1; $i++) {
            for ($j = 0; $j < $length - 1 - $i; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }
    public static function bubbleSort(&$array)
    {
        $length = count($array);
        for ($i = 0; $i < $length - 1; $i++) {
            for ($j = 0; $j < $length - 1 - $i; $j++) {
                if ($array[$j] < $array[$j + 1]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }
    //function to sort the array using insertion sort
    public static function insertionSort(&$arr)
    {
        $n = count($arr);
        for ($i = 1; $i < $n; $i++) {
            $key = $arr[$i];
            $j = $i - 1;

            // Move elements of arr[0..i-1],
            // that are    greater than key, to
            // one position ahead of their
            // current position
            while ($j >= 0 && $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j = $j - 1;
            }

            $arr[$j + 1] = $key;
        }
    }
    //function to sort the array using selection sort
    public static function selection_sort(&$arr)
    {
        $n = count($arr);
        for ($i = 0; $i < $n; $i++) {
            $low = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($arr[$j] < $arr[$low]) {
                    $low = $j;
                }
            }

            // swap the minimum value to $ith node
            if ($arr[$i] > $arr[$low]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$low];
                $arr[$low] = $tmp;
            }
        }
    }

    public static function merge(&$arr, $l, $m, $r)
    {
        $n1 = $m - $l + 1;
        $n2 = $r - $m;

        /* create temp arrays */
        $L = array();
        $R = array();
        /* Copy data to temp arrays L[] and R[] */
        for ($i = 0; $i < $n1; $i++)
            $L[$i] = $arr[$l + $i];
        for ($j = 0; $j < $n2; $j++)
            $R[$j] = $arr[$m + 1 + $j];

        /* Merge the temp arrays back into arr[l..r]*/
        $i = 0; // Initial index of first subarray
        $j = 0; // Initial index of second subarray
        $k = $l; // Initial index of merged subarray
        while ($i < $n1 && $j < $n2) {
            if ($L[$i] <= $R[$j]) {
                $arr[$k] = $L[$i];
                $i++;
            } else {
                $arr[$k] = $R[$j];
                $j++;
            }
            $k++;
        }

        /* Copy the remaining elements of L[], if there
        are any */
        while ($i < $n1) {
            $arr[$k] = $L[$i];
            $i++;
            $k++;
        }

        /* Copy the remaining elements of R[], if there
        are any */
        while ($j < $n2) {
            $arr[$k] = $R[$j];
            $j++;
            $k++;
        }
    }
    /*
    
    */
    /* l is for left index and r is right index of the
    sub-array of arr to be sorted */
    public static function mergeSort(&$arr, $l, $r)
    {
        if ($l < $r) {
            // Same as (l+r)/2, but avoids overflow for
            // large l and h
            $m = $l + (int) (($r - $l) / 2);

            // Sort first and second halves
            Algorithms::mergeSort($arr, $l, $m);
            Algorithms::mergeSort($arr, $m + 1, $r);

            Algorithms::merge($arr, $l, $m, $r);
        }
    }
    public static function quickSort($my_array)
    {
        $loe = $gt = array();
        if (count($my_array) < 2) {
            return $my_array;
        }
        $pivot_key = key($my_array);
        $pivot = array_shift($my_array);
        foreach ($my_array as $val) {
            if ($val <= $pivot) {
                $loe[] = $val;
            } elseif ($val > $pivot) {
                $gt[] = $val;
            }
        }
        return array_merge(Algorithms::quickSort($loe), array($pivot_key => $pivot), Algorithms::quickSort($gt));
    }
    public static function heapify(&$arr, $N, $i)
    {
        $largest = $i; // Initialize largest as root
        $l = 2 * $i + 1; // left = 2*i + 1
        $r = 2 * $i + 2; // right = 2*i + 2

        // If left child is larger than root
        if ($l < $N && $arr[$l] > $arr[$largest])
            $largest = $l;

        // If right child is larger than largest so far
        if ($r < $N && $arr[$r] > $arr[$largest])
            $largest = $r;

        // If largest is not root
        if ($largest != $i) {
            $swap = $arr[$i];
            $arr[$i] = $arr[$largest];
            $arr[$largest] = $swap;

            // Recursively heapify the affected sub-tree
            Algorithms::heapify($arr, $N, $largest);
        }
    }

    // main function to do heap sort
    public static function heapSort(&$arr)
    {
        $N = count($arr);
        // Build heap (rearrange array)
        for ($i = $N / 2 - 1; $i >= 0; $i--)
            Algorithms::heapify($arr, $N, $i);

        // One by one extract an element from heap
        for ($i = $N - 1; $i > 0; $i--) {
            // Move current root to end
            $temp = $arr[0];
            $arr[0] = $arr[$i];
            $arr[$i] = $temp;

            // call max heapify on the reduced heap
            Algorithms::heapify($arr, $i, 0);
        }
    }

    
}
?>