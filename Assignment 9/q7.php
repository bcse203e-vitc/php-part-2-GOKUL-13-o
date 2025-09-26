<?php
class ArrayEmptyException extends Exception {}
function calculateAverage($numbers) {
    if (empty($numbers)) {
        throw new ArrayEmptyException("No numbers provided");
    }
    $sum = array_sum($numbers);
    $count = count($numbers);
    return $sum / $count;
}
$numbers = [40, 50, 30, 60, 80];
try {
    $average = calculateAverage($numbers);
    echo "The average of the numbers is: $average";
} catch (ArrayEmptyException $e) {
    echo "Error: " . $e->getMessage();
}
?>
