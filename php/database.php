<?php
$servername="localhost";
$username="root";
$password="";
$dbname="db";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}
else
{
echo "Connected successfully!!";
}
$table_creation_sql="CREATE TABLE IF NOT EXISTS Users(id INT(6) PRIMARY KEY,firstname VARCHAR(50) NOT NULL,lastname varchar(50) NOT NULL,age INT NOT NULL)";
if ($conn->query($table_creation_sql) === TRUE){
echo "Table Users created successfully";
}else{
echo "Error creating table: " . $conn->error;
}
$sql = "SELECT COUNT(*) AS total_count FROM Users";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['total_count'] == 0)
{
    // Insert sample data
$insert_sql = "INSERT INTO Users (id, firstname, lastname, age) VALUES
(101,'Aswathy','Menon',22),(102, 'Navya', 'Das', 23),(105, 'Lakshmi', 'Nair', 26)";

if ($conn->query($insert_sql) === TRUE) {
echo "New records created successfully!!<br>";    
} else {
echo "Error inserting records: " . $conn->error . "<br>";   
}
}


// Retrieve data from table and show it in a neat HTML table format
$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
 // Start the table
echo "<html><head><title>Data Table</title></head><body>";
echo "<h1>User Details</h1>";
echo "<table border='1' style='border-collapse: collapse;'>";
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th></tr>";

    
// Loop through the results and output them as table rows
while ($row = $result->fetch_assoc()){
echo "<tr>";
echo "<td>" . $row["id"] . "</td>";
echo "<td>" . $row["firstname"] . "</td>";        
echo "<td>" . $row["lastname"] . "</td>";        
echo "<td>" . $row["age"] . "</td>";     
echo"</tr>";
}

    
// End the table
echo "</table>";
echo "</body></html>";
}
else{
echo "0 results<br>";
}
$conn->close();
?>
