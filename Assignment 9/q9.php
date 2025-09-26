<?php
$originalFile = "data.txt";
if (!file_exists($originalFile)) {
    die("Original file not found!");
}
date_default_timezone_set("Asia/Kolkata");
$datetime = date("Y-m-d_H-i");
$pathInfo = pathinfo($originalFile);
$backupFile = $pathInfo['filename'] . "_" . $datetime . "." . $pathInfo['extension'];
if (copy($originalFile, $backupFile)) {
    echo "Backup created successfully: $backupFile";
} else {
    echo "Failed to create backup.";
}
?>
