<?php
include('database.php');
include('sorting.php');

$algo = $_POST['id'];

$query = "SELECT * FROM credentials WHERE person = 'admin'";
$arr = db::getRecords($query);


$newArr = Algorithms::copyArray($arr);


if ($algo == 0) {
    Algorithms::bubbleSortAscending($arr);
} else if ($algo == 1) {
    Algorithms::selection_sort($arr);
} else if ($algo == 2) {
    Algorithms::insertionSort($arr);
} else if ($algo == 3) {
    Algorithms::mergeSort($arr, 0, count($arr) - 1);
} else if ($algo == 4) {
    Algorithms::quickSort($arr);
}else if ($algo == 5) {
    Algorithms::heapSort($arr);
}


for ($i = 0; $i < count($newArr); $i++) {
    $id = $newArr[$i];
    $ar = Algorithms::search($arr, $id);
    ?>
    <tr>
        <td>
            <?= $ar['id'] ?>
        </td>
        <td><?= $ar['fname'] ?></td>
        <td>
            <?= $ar['lname'] ?>
        </td>
        <td><?= $ar['email'] ?></td>
        <td>
            <?= $ar['person'] ?>
        </td>
        <?php
}



?>