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
else{
echo "connected successfully!!";
}

$table_creation_sql="CREATE TABLE IF NOT EXISTS book (id INT AUTO_INCREMENT PRIMARY KEY,accession_number VARCHAR(50),title VARCHAR(255),authors VARCHAR(255),edition VARCHAR(50),publisher VARCHAR(255))";
if ($conn->query($table_creation_sql) === TRUE){
echo "Table book created successfully!!";
} else {
echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accession_number = $_POST['accession_number'];
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];

    $insert_sql = "INSERT INTO book (accession_number, title, authors, edition, publisher)
            VALUES ('$accession_number', '$title', '$authors', '$edition', '$publisher')";

    if ($conn->query($insert_sql) === TRUE) {
    echo "New book added successfully";
    } 
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>