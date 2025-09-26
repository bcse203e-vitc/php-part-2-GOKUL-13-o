<?php
$filename = "students.txt";
if (!file_exists($filename)) {
    die("File not found!");
}
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$students = [];
foreach ($lines as $line) {
    $parts = explode(",", $line);
    $name = trim($parts[0] ?? "");
    $email = trim($parts[1] ?? "");
    $dob = trim($parts[2] ?? "");
    $valid = true;
    $errors = [];
    if ($name === "") {
        $valid = false;
        $errors[] = "Name is missing";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
        $errors[] = "Invalid email";
    }
    $dobDate = DateTime::createFromFormat("Y-m-d", $dob);
    if (!$dobDate || $dobDate->format("Y-m-d") !== $dob) {
        $valid = false;
        $errors[] = "Invalid date of birth";
    }
    $students[] = [
        "name" => $name,
        "email" => $email,
        "dob" => $dob,
        "valid" => $valid,
        "errors" => $errors
    ];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Records Validation</title>
</head>
<body>
    <h3>Student Records</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Status</th>
            <th>Errors</th>
        </tr>
        <?php
        $serial = 1;
        foreach ($students as $student) {
            $status = $student['valid'] ? "Valid" : "Invalid";
            $errorMsg = $student['valid'] ? "-" : implode(", ", $student['errors']);
            echo "<tr>
                    <td>$serial</td>
                    <td>{$student['name']}</td>
                    <td>{$student['email']}</td>
                    <td>{$student['dob']}</td>
                    <td>$status</td>
                    <td>$errorMsg</td>
                  </tr>";
            $serial++;
        }
        ?>
    </table>
</body>
</html>
