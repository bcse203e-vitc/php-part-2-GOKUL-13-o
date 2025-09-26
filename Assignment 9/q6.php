<?php
date_default_timezone_set("Asia/Kolkata");

$currentDateTime = date("d-m-Y H:i:s");
$daysLeft = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dob = $_POST["dob"];
    $dobDate = DateTime::createFromFormat("Y-m-d", $dob);
    $currentYear = (int)date("Y");

    $nextBirthday = DateTime::createFromFormat("Y-m-d", $currentYear . "-" . $dobDate->format("m-d"));

    $today = new DateTime();
    if ($nextBirthday < $today) {
        $nextBirthday->modify("+1 year");
    }

    $interval = $today->diff($nextBirthday);
    $daysLeft = $interval->days;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Birthday Calculator</title>
</head>
<body>
    <h3>Current Date and Time: <?php echo $currentDateTime; ?></h3>

    <form method="post">
        Enter your Date of Birth: <input type="date" name="dob" required>
        <input type="submit" value="Calculate Days Left">
    </form>

    <?php
    if ($daysLeft !== "") {
        echo "<h4>Days left until your next birthday: $daysLeft day(s)</h4>";
    }
    ?>
</body>
</html>
