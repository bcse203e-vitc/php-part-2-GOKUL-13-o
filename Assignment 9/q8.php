<?php
$inputFile = "data.txt";
$outputFile = "numbers.txt";
if (!file_exists($inputFile)) {
    die("Input file not found!");
}
$text = file_get_contents($inputFile);
preg_match_all("/\b\d{10}\b/", $text, $matches);
$numbers = array_unique($matches[0]); 
if (!empty($numbers)) {
    file_put_contents($outputFile, implode(PHP_EOL, $numbers));
    echo "Mobile numbers extracted successfully to $outputFile";
} else {
    echo "No valid mobile numbers found in the file.";
}
?>
