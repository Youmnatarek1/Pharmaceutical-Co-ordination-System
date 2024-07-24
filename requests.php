<?php
// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medication_sheet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extract the patient information from the form data
$patient_id = $_POST['patient_id'];
$patient_name = $_POST['patient_name'];
$drug_name = $_POST['drug_name'];
$strength = $_POST['strength'];
$route_adm = $_POST['route_adm'];
$freq = $_POST['freq'];
$duration = $_POST['duration'];
$remarks = $_POST['remarks'];
$status = $_POST['status'];
$action = $_POST['action'];

// Prepare the SQL INSERT statement
$sql = "INSERT INTO requests (patient_id, patient_name, drug_name, strength, route_adm, freq, duration, remarks, status, action)
        VALUES ('$patient_id', '$patient_name', '$drug_name', '$strength', '$route_adm', '$freq', '$duration', '$remarks', '$status', '$action')";

// Execute the SQL INSERT statement
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close the database connection
$conn->close();
?>