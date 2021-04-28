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
    echo "Connected successfully";

    //CREATE TABLES
    /*$sql = "CREATE TABLE hotel(
                HotelID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                HotelName varchar(255),
                Street varchar(255),
                City varchar(255),
                State varchar(255),
                Zipcode int,
                PhoneNumber int,
                )";
    $sql2 = "CREATE TABLE room(
                RoomID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                RoomType varchar(255),
                RoomPrice int,
                RoomNumber int,
                FOREIGN KEY HotelID REFERENCES Hotel(HotelID)
                )";
    $sql3 = "CREATE TABLE reservation(
                ReservationID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                CustomerID int,
                ReservationDate date,
                ArrivalDate date,
                DepartureDate date,
                Occupants int,
                FOREIGN KEY CustomerID  REFERENCES Customer(CustomerID),
                )";
    $sql4 = "CREATE TABLE receptionist (
                ReceptionistID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                FirstName varchar(255),
                LastName varchar(255),
                PhoneNumber int,
                PRIMARY KEY (ReceptionistID)
                )";
    $sql5 = "CREATE TABLE billing(
                BillingID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                CustomerID int,
                ReservationID int,
                PaymentType int,
                PaymentDate date,
                TotalBill decimal(10,2),
                FOREIGN KEY CustomerID  REFERENCES Customer(CustomerID),
                FOREIGN KEY ReservationID REFERENCES Reservation(ReservationID)
                )";
    $sql6 = "CREATE TABLE customer(
                CustomerID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                FirstName varchar(255),
                LastName varchar(255),
                Street varchar(255),
                City varchar(255),
                State char(2),
                ZipCode int,
                PhoneNumber varchar(50),
                Email varchar(255),
                )";

    if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE && $conn->query($sql5) === TRUE && $conn->query($sql6) === TRUE){
        echo "Tables created successfully";
    }
    else{
        echo "Error creating table" .$conn->error;
    }

    $conn->close();
*/

?>


