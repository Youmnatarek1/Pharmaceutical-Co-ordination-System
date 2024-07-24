<?php
// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectpharmacy";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy Management System - Requests</title>
    <style>
        /* Add styling to the header */
        header {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2B2D42;
        }

        h1 {
            margin: 0;
            font-size: 28px;
            color: #FFFFFF;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            align-items: center;
        }

        nav a {
            display: inline-block;
            padding: 10px;
            margin-left: 10px;
            color: #FFFFFF;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #485b7d;
        }

        nav a.active {
            background-color: #7a949b;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type=text] {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 12px;
            width: 100%;
        }

        .button {
            background-color: #7a949b;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #485b7d;
        }

        /* Hide the notes input and button by default */
        .notes-div {
            display: none;
        }
    </style>
</head>
<body>
<header>
    <h1>Beating Spirit Pharmacy</h1>
    <nav>
        <a href="dashboard.html">Dashboard</a>
        <a href="requests.html" class="active">Requests</a>
        <a href="orders.html">Orders</a>
        <a href="Medicines.html">Medicines</a>
        <a href="customers.html">Customers</a>
        <a href="reports.html">Reports</a>
        <a href="settings.html">Settings</a>
    </nav>
</header>
<h2>Requests</h2>
<form method="post">
    <label for="patient_id">Patient ID:</label>
    <input type="text" name="patient_id" id="patient_id" required>
    <br>
    <label for="patient_name">Patient Name:</label>
    <input type="text" name="patient_name" id="patient_name" required>
    <br>
    <label for="drug_name">Drug Name:</label>
    <input type="text" name="drug_name" id="drug_name" required>
    <br>
    <label for="strength">Strength:</label>
    <input type="text" name="strength" id="strength" required>
    <br>
    <label for="route_adm">Route of Administration:</label>
    <input type="text" name="route_adm" id="route_adm" required>
    <br>
    <label for="freq">Frequency:</label>
    <input type="text" name="freq" id="freq" required>
    <br>
    <label for="duration">Duration:</label>
    <input type="text" name="duration" id="duration" required>
    <br>
    <label for="remarks">Remarks:</label>
    <input type="text" name="remarks" id="remarks" required>
    <br>
    <label for="status">Status:</label>
    <input type="text" name="status" id="status" required>
    <br>
    <label for="action">Action:</label>
    <input type="text" name="action" id="action" required>
    <br>
    <button type="submit" class="button">Submit</button>
</form>
</body>
</html>