<?php
// Establish database connection
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];

$connection = mysqli_connect('localhost', $username, $password, 'production');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Collect post data
$uuid = $_POST['uuid'];
$keyEvent = $_POST['keyEvent'];
$keyCode = $_POST['keyCode'];
$keyChar = $_POST['keyChar'];
$altKey = $_POST['altKey'];
$ctrlKey = $_POST['ctrlKey'];
$shiftKey = $_POST['shiftKey'];
$isBot = $_POST['isBot'];
$timestamp = $_POST['timestamp'];

// Insert data
if (!mysqli_query($connection, "INSERT INTO KEYSTROKE_METRICS (`uuid`, `key_event`, `key_code`, `key_char`, `alt_key`, `ctrl_key`, `shift_key`, `is_bot`, `timestamp`) VALUES ('$uuid', '$keyEvent', '$keyCode', '$keyChar', '$altKey', '$ctrlKey', '$shiftKey', '$isBot', '$timestamp')")) {
    echo("Error description: " . mysqli_error($connection));
}

// Close connection
mysqli_close($connection);
?>
