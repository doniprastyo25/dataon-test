<?php
$number = 1225441;

$dividers = [1000000, 200000, 20000, 5000, 400, 40, 1];

foreach ($dividers as $divider) {
    $count = floor($number / $divider);
    $number %= $divider;
    if ($count == 1) {
        echo $divider. ", ";
    }
}
?>