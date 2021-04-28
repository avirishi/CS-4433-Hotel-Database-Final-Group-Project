<?php /** @noinspection SpellCheckingInspection */
/** @noinspection DuplicatedCode */
/** @noinspection PhpUndefinedVariableInspection */
/** @noinspection PhpRedundantClosingTagInspection */
include 'connection.php';

// posting user-input data to table
if(count($_POST) > 0) {
    mysqli_query($conn,"UPDATE customer set CustomerID='" . $_POST['CustomerID'] . "', FirstName='" . $_POST['FirstName'] . "', LastName='" . $_POST['LastName'] . "', Street='" . $_POST['Street'] . "' ,City='" . $_POST['City'] . "', State='" . $_POST['State']."' WHERE CustomerID='" . $_POST['CustomerID'] . "'");
    echo "Record Modified Successfully<br>";
}

if(count($_POST) > 0){
    mysqli_query($conn,"UPDATE reservation set ReservationID='" .$_POST['ReservationID'] . "', ArrivalDate='" . $_POST['ArrivalDate'] . "', DepartureDate='" . $_POST['DepartureDate'] ."', Occupants='" . $_POST['Occupants']. "'WHERE ReservationID='" . $_POST['ReservationID']."'");
}

if(count($_POST) > 0){
    mysqli_query($conn, "UPDATE room set RoomID='" .$_POST['RoomID'] . "', RoomType='" . $_POST['RoomType']. "' WHERE RoomID='" . $_POST['RoomID']."'");
}
if(isset($_REQUEST["submit"])) {
// select data from table
    $sql = "SELECT * FROM customer WHERE CustomerID = $_POST[CustomerID]";
    $sql1 = "SELECT * FROM reservation WHERE ReservationID = $_POST[ReservationID] AND CustomerID = $_POST[CustomerID]";
    $sqli2 = "SELECT * FROM room WHERE RoomID = $_POST[RoomID]";

//executing the query
    $result = $conn->query($sql);
    $resultt = $conn->query($sql1);
    $resulttt = $conn->query($sqli2);

// Printing out update result
    if ($result !== false && $result->num_rows > 0 && $resultt !== false && $resultt->num_rows && $resulttt !== false && $resulttt->num_rows) {
        //output data of each row after updating
        while ($row = $result->fetch_assoc()) {
            echo "<br>RESERVATION DETAILS<br>";
            echo "<br>" . "CustomerID: " . $row["CustomerID"] . "<br>" . "First Name: " . $row["FirstName"] . "<br>" . "Last Name: " . $row["LastName"] . "<br>" . "Street: " . $row["Street"] . "<br>" . "City: " . $row["City"] . "<br>" . "State: " . $row["State"] . "<br>" . "Zipcode: " . $row["ZipCode"] . "<br>" . "Email: " . $row["Email"] . "<br>";
            #echo "Reservation ID: ".$row["ReservationID"]."<br>"."Customer ID: ".$row["CustomerID"]."<br>"."Reservation Date: ".$row["ReservationDate"]."<br>"."Arrival Date: ".$row["ArrivalDate"]."<br>"."Departure Date: ".$row["DepartureDate"]."<br>"."Occupants: ". $row["Occupants"] . "<br>";
        }
        while ($row = $resultt->fetch_assoc()) {
            echo "Reservation ID: " . $row["ReservationID"] . "<br>" . "Customer ID: " . $row["CustomerID"] . "<br>" . "Reservation Date: " . $row["ReservationDate"] . "<br>" . "Arrival Date: " . $row["ArrivalDate"] . "<br>" . "Departure Date: " . $row["DepartureDate"] . "<br>" . "Occupants: " . $row["Occupants"] . "<br>";
        }
        while ($row = $resulttt->fetch_assoc()) {
            echo "Room ID: " . $row["RoomID"] . "<br>" . "Room Type: " . $row["RoomType"] . "<br>" . "Room Price: " . $row["RoomPrice"] . "<br>";
        }
    } else {
        echo "no results";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
</head>
<body>
<h1> Microtel Inn & Suites </h1>
<h2><br>Update Reservation</h2>
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
    <p>
        <label for="FirstName">First Name:</label>
        <input type="text" name="FirstName" id="FirstName">
    </p>
    <p>
        <label for="LastName">Last Name:</label>
        <input type="text" name="LastName" id="LastName">
    </p>
    <p>
        <label for="Street">Street:</label>
        <input type="text" name="Street" id="Street">
    </p>
    <p>
        <label for="City">City:</label>
        <input type="text" name="City" id="City">
    </p>
    <p>
        <label for="State">State:</label>
        <input type="text" name="State" id="State">
    </p>
    <p>
        <label for="ZipCode">ZipCode:</label>
        <input type="text" name="ZipCode" id="ZipCode">
    </p>
    <p>
        <label for="PhoneNumber">Phone Number:</label>
        <input type="text" name="PhoneNumber" id="PhoneNumber">
    </p>
    <p>
        <label for="Email">Email:</label>
        <input type="text" name="Email" id="Email">
    </p>
    <p>
        <label for="ArrivalDate">Arrival Date:</label>
        <input type="date" name="ArrivalDate" id="ArrivalDate">
    </p>
    <p>
        <label for="DepartureDate">Departure Date:</label>
        <input type="date" name="DepartureDate" id="DepartureDate">
    </p>
    <p>
        <label for="Occupants">Occupants:</label>
        <input type="text" name="Occupants" id="Occupants">
    </p>
    <p>
        <label for="RoomType">Room Type:</label>
        <select id="RoomType" name="RoomType">
            <option value="1 Queen Bed">1 Queen Bed</option>
            <option value="2 Queen Beds">2 Queen Beds</option>
            <option value="1 King Bed Suite">1 King Bed Suite</option>
            <option value="2 King Beds Suite">2 King Beds Suite</option>
        </select>
        <!--<input type="text" name="RoomType" id="RoomType">-->
    </p>
    <input type="submit" name="submit" value="SUBMIT"/>
</form>
