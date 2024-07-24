<?php
// Establish a connection to the first database
$first_db_connection = mysqli_connect("localhost", "root", "", "medication_sheet");

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Retrieve data from the first database
$sql = "SELECT * FROM medication_sheet";
$result = mysqli_query($first_db_connection, $sql);

// Generate HTML content based on the retrieved data
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row["column_name"] . "</p>";
    }
} else {
    echo "No results found.";
}

// Close the connection to the first database
mysqli_close($first_db_connection);

// Establish a connection to the second database
$second_db_connection = mysqli_connect("localhost", "root", "", "projectpharmacy");

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Update data in the second database
$sql = "UPDATE requests SET column_name = 'new_value' WHERE id = 1";
if (mysqli_query($second_db_connection, $sql)) {
    echo "Record updated successfully.";
} else {
    echo "Error updating record: " . mysqli_error($second_db_connection);
}

// Close the connection to the second database
mysqli_close($second_db_connection);
?>