<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM requests";
$result = $conn->query($sql);

// Generate HTML code based on the fetched data
if ($result->num_rows > 0) {
    $html = '<table>
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Drug Name</th>
                        <th>Strength</th>
                        <th>Route Adm</th>
                        <th>Freq</th>
                        <th>Duration</th>
                        <th>Remarks</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $html .= '<tr class="request-row">
                    <td>'.$row["patient_id"].'</td>
                    <td>'.$row["patient_name"].'</td>
                    <td>'.$row["drug_name"].'</td>
                    <td>'.$row["strength"].'</td>
                    <td>'.$row["route_adm"].'</td>
                    <td>'.$row["freq"].'</td>
                    <td>'.$row["duration"].'</td>
                    <td>'.$row["remarks"].'</td>
                    <td>'.$row["status"].'</td>
                    <td>
                        <div class="approve-div">
                            <a href="#" class="button approve-button" id="approve-'.$row["patient_id"].'">Approve</a>
                        </div>
                        <div class="reject-div">
                            <a href="#" class="button reject-button" id="reject-'.$row["patient_id"].'">Reject</a>
                        </div>
                        <div class="fulfill-div">
                            <a href="#" class="button fulfill-button" id="fulfill-'.$row["patient_id"].'">Fulfill</a>
                        </div>
                        <div class="notes-div">
                            <input type="text" id="notes" placeholder="Add notes...">
                            <a href="#" class="button save-notes-button">Save Notes</a>
                        </div>
                    </td>
                </tr>';
    }
    $html .= '</tbody></table>';

} else {
    $html = "No requests found";
}

// Close database connection
$conn->close();

// Output the generated HTML code
echo $html;
?>