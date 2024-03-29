<!-- author:Abhishek Gupta -->
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
	<h1>Songs: &nbsp
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Genre</th>
<th>Singer</th>
</tr>
<?php
$conn = mysqli_connect("localhost:3307", "root", "", "entertainment_database");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM song ORDER BY genre";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["sid"]. "</td><td>" . $row["sname"] . "</td><td>"
. $row["genre"]."</td><td>" . $row["singer"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>