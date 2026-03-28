<?php
session_start(); 
$mytable = "example_sequences";
require 'includes/db_connect.php';
echo "Example database table:";



$sql = "SELECT * FROM $mytable";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt -> fetchAll(PDO::FETCH_ASSOC);

echo "<p>Number of results: " . count($results) . "</p>";

echo "<table border='1'>";
echo "<tr>";
foreach (array_keys($results[0]) as $columnName) {
echo "<th>" . htmlspecialchars($columnName) . "</th>";
}
echo "</tr>";

foreach ($results as $row) {
echo "<tr>";
foreach ($row as $value) {
echo "<td>" . htmlspecialchars($value) . "</td>";
}
echo "</tr>";
}
echo "</table>";

?>