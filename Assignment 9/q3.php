<?php
$emails = ["gokul@email.com", "rahul-email@", "you@site", "bunny@gmail.com"];
$emailRegex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
foreach ($emails as $email) {
    if (preg_match($emailRegex, $email)) {
        echo "Valid email: $email\n";
    }
}
?>
