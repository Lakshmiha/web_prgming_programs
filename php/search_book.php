<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $title = $_GET['title'];

    $sql = "SELECT * FROM book WHERE title LIKE '%$title%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }
            h1 {
                color: #4CAF50;
                text-align: center;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            table, th, td {
                border: 1px solid #ddd;
            }
            th {
                background-color: #4CAF50;
                color: white;
                padding: 10px;
            }
            td {
                padding: 8px;
                text-align: left;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #ddd;
            }
        </style>
        ";

        echo "<h1>Search Results</h1>";
        echo "<table><tr><th>Accession Number</th><th>Title</th><th>Authors</th><th>Edition</th><th>Publisher</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['accession_number'] . "</td><td>" . $row['title'] . "</td><td>" . $row['authors'] . "</td><td>" . $row['edition'] . "</td><td>" . $row['publisher'] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<h1 style='color: red; text-align: center;'>No results found for the title '$title'.</h1>";
    }
}

$conn->close();
?>