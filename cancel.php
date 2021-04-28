<?php
include "connection.php";

if(isset($_REQUEST["submit"])) {
    $CustomerID = $_POST['CustomerID'];
    $ReservationID = $_POST['ReservationID'];
    $RoomID = $_POST["RoomID"];

// sql to delete a record
    $sql = "DELETE FROM customer WHERE CustomerID =  $CustomerID ";
    $sql1 = "DELETE FROM reservation WHERE ReservationID = $ReservationID";
    $sql2 = "DELETE FROM room WHERE RoomID = $RoomID";

    if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        echo "Reservation cancelled successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cancel</title>
</head>
<body>
<h1> Microtel Inn & Suites </h1>
<h2><br>Cancel Reservation</h2>
<form action="" method="post">
    <p>
        <label for="CustomerID">Customer ID:</label>
        <input type="text" name="CustomerID" id="CustomerID">
    </p>
    <p>
        <label for="ReservationID">Reservation ID:</label>
        <input type="text" name="ReservationID" id="ReservationID">
    </p>
    <p>
        <label for="RoomID">Room ID:</label>
        <input type="text" name="RoomID" id="RoomID">
    </p>
    <input type="submit" name="submit" value="SUBMIT"/>
</form>