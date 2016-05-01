<!DOCTYPE html>
<html>
<body>

<?php

// echo "<?php phpinfo();">;
$servername = "localhost";
$username = "";
$password = "";
$dbname = "balldb";

phpinfo();

phpinfo(INFO_MODULES);

try {
	$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	// $conn = mysql_connect('localhost', $username, $password);

	$item_id = 1;

	// Check connection
	if ($conn->connect_error) {
	    die("\nConnection failed: " . $conn->connect_error);
	} 


	$sql = "Select product_name, item_id, price, color, description, shape, circumference, weight, material, photo from Product where item_id =" . $_GET['product_id'];
	echo $sql;
	// $result = $conn->query($sql);

	// if ($result->num_rows > 0) {
	//     // output data of each row
	//     while($row = $result->fetch_assoc()) {
	//     	echo "Product Name: " . $row["name"] . "<br>" . "Item ID: " . $row["item_id"] . "<br>" . "Price: " . $row["price"] . "<br>" . "Color: " . $row["color"] . "<br>" . "Description: " . $row["description"] . "<br>" . "Additional Information" . "<br>". "Shape: " . $row["shape"] . "<br>" . "circumference: " . $row["circumference"] . "<br>" . "Weight: " . $row["weight"] . "<br>" . "Material: " . $row["material"] . "<br>";
	//     }
	// } else {
	//     echo "0 results";
	// }

	foreach($conn->query($sql) as $row) {
		print $row['photo'];
		print "\nProduct Name: " . $row['product_name'];
		print "\nItem ID:" . $row['item_id'];
		print "\nPrice:" . $row['price'];
		print "\nColor: " . $row['color'];
		print "\nDescription: " . $row['description'];
		print "\nShape: " . $row['shape'];
		print "\nCircumference: " . $row['circumference'];
		print "\nWeight: " . $row['weight'];
		print "\nMaterial: " . $row['material'];
	}
	// $conn->close();


 } catch(PDOException $e) {
 	echo "Connection failed: " . $e->getMessage();
 }




?>


</body>
</html>