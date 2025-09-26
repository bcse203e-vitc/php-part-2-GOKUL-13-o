<?php
$students = [
    "Gokul" => 86,
    "rahul" => 99,
    "shannu" => 88,
    "karthi" => 95,
    "mahi" => 98
];
arsort($students);
$topStudents = array_slice($students, 0, 3, true);
echo "<h3>Top 3 Students</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Name</th><th>Marks</th></tr>";
foreach ($topStudents as $name => $marks) {
    echo "<tr><td>$name</td><td>$marks</td></tr>";
}
echo "</table>";
?>
