<?php include'header.php';?>
<?php include'database.php';?>

<!-- below is html -->
<div class="container">
	<div class="row">

		<?php

		$query = "SELECT * FROM `cart_producten`";
		// try to execute the query
		$query_result = $conn->query( $query );
		// returns the query
		print_r($query_result->fetchAll(PDO::FETCH_ASSOC));


		?>

	</div>
</div>

<!-- above is html -->

<?php include'footer.php';?>