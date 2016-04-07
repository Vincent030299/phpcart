<?php include'header.php';?>
<?php include'database.php';?>

<?php
try {
	$stmt = $conn->prepare("INSERT INTO cart_klant (
		naam,email)VALUES(?, ?)");
	$stmt->bindParam(1, $naam);
	$stmt->bindParam(1, $email);

//insert one row
	$name = $_POST['naam'];
	$name = $_POST['email'];
	$stmt->execute();
	$lastId = $conn->lastInsertId();

}catch (PDOException $ex){
	if($database_config['debug']){
		$error = $ex->getMessage();
		echo $error;
	}
}

session_start()
$total_order = 0;
if( isset( $_SESSION['cart_content'] ) ){
	$cart_array = explode(',', $_SESSION['cart_content'] );

	foreach ($cart_array as $item) {
		$query = "SELECT * FROM cart_producten WHERE id='" . $item . "' ";
		//try to execute the SQL query
		$query_result = $conn->query( $query );
		//return the result of the query
		$product = $query_result->fetch(PDO::FETCH_ASSOC);
		$total_order += $product['prijs'];
	}
}

try {
	$stmt = $conn->prepare("INSERT INTO cart_bestellingen (
		totaal_prijs, klant_id)VALUES(?, ?)");
	$stmt->bindParam(1, $totaal_prijs);
	$stmt->bindParam(1, $klant_id);

//insert one row
	$totaal_prijs = $total_order;
	$klant_id = $lastId;
	$stmt->execute();
	$lastOrderId = $conn->lastInsertId();

}catch (PDOException $ex){
	if($database_config['debug']){
		$error = $ex->getMessage();
		echo $error;
	}
}

///////////////////
// make a new order lines
//////////////////

if( isset( $_SESSION['cart_content'] )  {
	$cart_array = explode('.'. $_SESSION['cart_content'];

		foreach( $cart_array as $item){
			$query = "SELECT * FROM cart_producten WHERE id ='" . $item . "' ";
			//try to execute the query
			$query_result = $conn->query( $query );
			//returns the result
			$product = $query_result->fetch(PDO::FETCH_ASSOC);

			try{

				$stmt = $conn->prepare("INSERT INTO cart_bestelling_line (product_id, bestelling_id, aantal) VALUES(?,?,?)");
				$stmt->bindParam(1, $product_id);
				$stmt->bindParam(2, $bestelling_id);
				$stmt->bindParam(3, $aantal);

				$product_id = $item;
				$bestelling_id = $lastOrderId;
				$aantal = 1;

				$stmt->execute();
			}catch ( PDOException $ex){
				if($database_config['debug']){
					$error = $ex->getMessage();
					echo $error;
				}
			}
		}	
	}
	?>

	<?php include'footer.php';?>