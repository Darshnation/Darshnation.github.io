<?php
// Establish database connection
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "patel_airways";
$port = 3308; // New port number

$conn = new mysqli($servername, $username, $password, $dbname, $port);

//$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Sanitize inputs to prevent SQL injection
if(isset($_POST['book'])) {
    $From        = isset($_POST['From']) ? $_POST['From'] : '';
    $To          = isset($_POST['To']) ? $_POST['To'] : '';
    $Traveller   = isset($_POST['Traveller']) ? $_POST['Traveller'] : '';
    $Departure   = isset($_POST['Departure']) ? $_POST['Departure'] : '';
    $Return      = isset($_POST['Return']) ? $_POST['Return'] : '';
    //$Days        = isset($_POST['How many days']) ? $_POST['How many days'] : '';
    $Class       = isset($_POST['Class']) ? $_POST['Class'] : '';
    $Details     = isset($_POST['Details']) ? $_POST['Details'] : '';

    echo "from:::" . $From;
    echo "from:::" . $To;
    echo "from:::" . $Traveller;
    echo "from:::" . $Details;


// Insert data into the database
    $query = "INSERT INTO bookings VALUES ('$From', '$To', '$Traveller', '$Departure', '$Return' , '$Class', '$Details')";

    echo $query;
      if (mysqli_query($conn, $query)) {
         echo "New record created successfully";
      } else {
         echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
}
?>
