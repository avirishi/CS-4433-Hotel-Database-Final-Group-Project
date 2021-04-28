<?php /** @noinspection PhpRedundantClosingTagInspection */
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "Avirishi1!";
    $db = "hotel";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

?>


