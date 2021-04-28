<?php /** @noinspection ALL */
include 'connection.php';

if(isset($_REQUEST["search"])) {
    //$CustomerID = $_POST['CustomerID'];
    //$ReservationID = $_POST['ReservationID'];
// Geting user-input to fetch data from customer and reservation table for particular ID
    $sql = "SELECT * FROM customer WHERE CustomerID = $_POST[CustomerID]";
    $sql1 = "SELECT * FROM reservation WHERE ReservationID = $_POST[ReservationID] AND CustomerID = $_POST[CustomerID]";
// executing query
    $result = $conn->query($sql);
    $resultt = $conn->query($sql1);
//printing out data
    if($result !== false && $result->num_rows > 0 && $resultt !== false && $resultt->num_rows){
        //output data of each row
        while($row = $result->fetch_assoc()) {
            echo "RESERVATION DETAILS<br>";
            echo "<br>"."CustomerID: ".$row["CustomerID"]."<br>"."First Name: ".$row["FirstName"]."<br>"."Last Name: ".$row["LastName"]."<br>"."Street: ".$row["Street"]."<br>"."City: ".$row["City"]."<br>"."State: ".$row["State"]."<br>"."Zipcode: ".$row["ZipCode"]."<br>"."Email: ".$row["Email"]."<br>";
            #echo "Reservation ID: ".$row["ReservationID"]."<br>"."Customer ID: ".$row["CustomerID"]."<br>"."Reservation Date: ".$row["ReservationDate"]."<br>"."Arrival Date: ".$row["ArrivalDate"]."<br>"."Departure Date: ".$row["DepartureDate"]."<br>"."Occupants: ". $row["Occupants"] . "<br>";
        }
        while($row = $resultt->fetch_assoc()){
            echo "Reservation ID: ".$row["ReservationID"]."<br>"."Customer ID: ".$row["CustomerID"]."<br>"."Reservation Date: ".$row["ReservationDate"]."<br>"."Arrival Date: ".$row["ArrivalDate"]."<br>"."Departure Date: ".$row["DepartureDate"]."<br>"."Occupants: ". $row["Occupants"] . "<br>";
        }
    }
    else{
        echo "no results";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>
<h1> Microtel Inn & Suites </h1>
<h2><br>Search Reservation</h2>
<form action="" method="post">
    <p>
        <label for="CustomerID">Customer ID:</label>
        <input type="text" name="CustomerID" id="CustomerID">
    </p>
    <p>
        <label for="ReservationID">Reservation ID:</label>
        <input type="text" name="ReservationID" id="ReservationID">
    </p>
    <input type="submit" name="search" value="SEARCH"/>
</form>
</body>
</html>

