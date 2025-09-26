<?php
$filename = "access.log";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $action = trim($_POST["action"]);
    $timestamp = date("Y-m-d H:i:s");
    $entry = "$username – $timestamp – $action" . PHP_EOL;
    file_put_contents($filename, $entry, FILE_APPEND);
}
$logs = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
$lastLogs = array_slice($logs, -5);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Access Log</title>
</head>
<body>
    <h3>Write Log Entry</h3>
    <form method="post">
        Username: <input type="text" name="username" required>
        Action: <input type="text" name="action" required>
        <input type="submit" value="Add Log">
    </form>

    <h3>Last 5 Log Entries</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>Log Entry</th></tr>
        <?php
        if (!empty($lastLogs)) {
            foreach ($lastLogs as $log) {
                echo "<tr><td>$log</td></tr>";
            }
        } else {
            echo "<tr><td>No logs found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
