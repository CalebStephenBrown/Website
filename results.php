<?php
session_start(); 
$mytable = "example_sequences";
require 'includes/db_connect.php';
echo "<p> Displaying the query results for ", $_POST['species'], " and ", $_POST['protein'],"</p>";

$species = $_POST['species'];
$protein = $_POST['protein'];

$sql = "SELECT * FROM $mytable
WHERE species_name LIKE :species
AND protein_name LIKE :protein";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':species', "%$species%", PDO::PARAM_STR);
$stmt->bindValue(':protein', "%$protein%", PDO::PARAM_STR);
$stmt->execute();

$results = $stmt -> fetchAll(PDO::FETCH_ASSOC);

// adapted from week three contentm placeholders where added to the sql 
// query as it didn't initially work with $variable name 
// bindValue was adapted from https://www.php.net/manual/en/pdostatement.bindvalue.php

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