<?php /** @noinspection PhpUndefinedVariableInspection */
/** @noinspection PhpRedundantClosingTagInspection */
include 'connection.php';

/*Enter data to database hotel*/
if(isset($_REQUEST["submit"])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Street = $_POST['Street'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $ZipCode = $_POST['ZipCode'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Email = $_POST['Email'];
    #$CustomerID = $_POST['CustomerID'];
    #$ReservationDate = $_POST['ReservationDate'];
    $ArrivalDate = $_POST['ArrivalDate'];
    $DepartureDate = $_POST['DepartureDate'];
    $Occupants = $_POST['Occupants'];
    #$HotelID = $_POST['HotelID'];
    $RoomType = $_POST['RoomType'];
    $roomArray = explode(" $", $RoomType);
    #$RoomPrice = $_POST['RoomPrice'];
    $TotalBill = ['TotalBill'];

    /* Price for room type */
    if($roomArray[0] == "One Queen Bed"){
        $RoomPrice = 105;
    }
    if($roomArray[0] == "Two Queen Beds"){
        $RoomPrice = 120;
    }
    if($roomArray[0] == "One King Bed Suite"){
        $RoomPrice = 140;
    }
    if($roomArray[0] == "Two King Beds Suite"){
        $RoomPrice = 160;
    }

    /** insert user-input data into table customer  */
    $sql = mysqli_query($conn, "INSERT INTO customer (FirstName,LastName, Street, City, State, ZipCode, PhoneNumber, Email)
    VALUES('$FirstName','$LastName','$Street','$City','$State','$ZipCode','$PhoneNumber','$Email')");
    echo "<br>KEEP NOTE OF BELOW INFORMATION<br>";
    echo "Your CustomerID is: " . mysqli_insert_id($conn);

    $CustomerID = mysqli_insert_id($conn);

    /** insert user-input data into table reservation */
    $sql = mysqli_query($conn, "INSERT INTO reservation (CustomerID,ArrivalDate,DepartureDate,Occupants)
    VALUES('$CustomerID','$ArrivalDate','$DepartureDate','$Occupants')");

    echo "<br>Your ReservationID is: ".mysqli_insert_id($conn);


    /**Set HotelID to 1 and enter value into table room*/
    $HotelID = 1;
    $sql = mysqli_query($conn, "INSERT INTO room (HotelID, RoomType, RoomPrice)
    VALUES ('$HotelID','$roomArray[0]','$RoomPrice')");

    echo "<br>Your RoomID is: ".mysqli_insert_id($conn);
    echo "<br>Your Room Price is: ".$RoomPrice;


}
flush();
/** redirect to page */
if(isset($_REQUEST["search"])) {
    header("location:http://localhost:63342/search.php/search.php");
    exit();
}
if(isset($_REQUEST["update"])) {
    header("location:http://localhost:63342/search.php/update.php");
    exit();
}
if(isset($_REQUEST["cancel"])) {
    header("location:http://localhost:63342/search.php/cancel.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
</head>
<body>
<h1> Microtel Inn & Suites </h1>
<h2><br>Reservation</h2>

<form action="" method="post">
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
<?php

/** Show recommended room types when customer make reservation */
    echo "<option>-- Select Room --</option>";
    $Queen = mysqli_query($conn, "select * from room where RoomType = 'One Queen Bed'");
    $Queens = mysqli_query($conn, "select * from room where RoomType = 'Two Queen Beds'");
    $King = mysqli_query($conn, "select * from room where RoomType = 'One King Bed Suite'");
    $Kings = mysqli_query($conn, "select * from room where RoomType = 'Two King Beds Suite'");
    $maxval = max($Queen->num_rows, $Queens->num_rows, $King->num_rows, $Kings->num_rows );

    if($maxval == 0){
        echo "<option>One Queen Bed $105</option>";
        echo "<option>Two Queen Beds $120</option>";
        echo "<option>One King Bed Suite $140</option>";
        echo "<option>Two King Beds Suite $160</option>";
    }
    else if($maxval == $Queen->num_rows){
        echo "<option>One Queen Bed $105(Recommended)</option>";
        echo "<option>Two Queen Beds $120</option>";
        echo "<option>One King Bed Suite $140</option>";
        echo "<option>Two King Beds Suite $160</option>";
    }
    else if($maxval == $Queens->num_rows){
        echo "<option>Two Queen Beds $120(Recommended)</option>";
        echo "<option>One Queen Bed $105</option>";
        echo "<option>One King Bed Suite $140</option>";
        echo "<option>Two King Beds Suite $160</option>";
    }
    else if($maxval == $King->num_rows){
        echo "<option>One King Bed Suite $140(Recommended)</option>";
        echo "<option>One Queen Bed $105</option>";
        echo "<option>Two Queen Beds $120</option>";
        echo "<option>Two King Beds Suite $160</option>";
    }
    else if($maxval == $Kings->num_rows){
        echo "<option>Two King Beds Suite $160(Recommended)</option>";
        echo "<option>One Queen Bed $105</option>";
        echo "<option>Two Queen Beds $120</option>";
        echo "<option>One King Bed Suite $140</option>";
    }

?>
        </select>
        <!--<input type="text" name="RoomType" id="RoomType">-->
    </p>
    <input type="submit" name="submit" value="SUBMIT"/>

    <h3><br>To confirm your reservation, click the button 'SEARCH'</h3>
    <input type="submit" name="search" value="SEARCH"/>
    <br>

    <h3>To update your reservation, click the button 'UPDATE'</h3>
    <input type="submit" name="update" value="UPDATE"/>
    <br>

    <h3>To cancel your reservation, click the button 'CANCEL'</h3>
    <input type="submit" name="cancel" value="CANCEL"/>
    <br>
    <br>
</form>
</body>
</html>