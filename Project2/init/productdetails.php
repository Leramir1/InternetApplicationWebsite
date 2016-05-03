<?php 
echo "<pre>\n"; 
require_once "pdo.php";
$stmt = $pdo->query("SELECT name, item_id, price FROM Product");
 echo '<table border="1">'."\n";
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	echo "<tr><td>";
	echo($row['name']);
	echo("</td><td>");
	echo($row['item_id']);
	echo("</td><td>");
	echo($row['price']);
	echo("</td></tr>\n");
	
} 
echo "</table>\n";
?>