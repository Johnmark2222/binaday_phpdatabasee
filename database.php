<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data exists to avoid Undefined Array Key warnings
$Select_Event = isset($_POST['select_event']) ? $_POST['select_event'] : '';
$Select_Quantity = isset($_POST['select_quantity']) ? $_POST['select_quantity'] : '';
$Total_Price= isset($_POST['total_price']) ? $_POST['total_price'] : '';
$Your_Name = isset($_POST['your_name']) ? $_POST['your_name'] : '';
$Email_Address = isset($_POST['email_address']) ? $_POST['email_address'] : '';
$Payment_Method = isset($_POST['payment_method']) ? $_POST['payment_mathod'] : '';


// SQL query to insert data into the transactions table
$sql = "INSERT INTO transactions (select_event, select_quantity, total_price, your_name, email_address, payment_method)
VALUES ('$select_event', '$select_quantity', '$total_price', '$your_name', '$email_address', '$payment_method')";


if ($conn->query($sql) === TRUE) {
    echo "Transaction submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
