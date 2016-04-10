<?php include'header.php';?>
<?php include'database.php';?>

<!-- below is html -->
<div class="container">
	<div class="row">

		<?php

		$query = "SELECT * FROM cart_producten";
		// try to execute the query
		$query_result = $conn->query( $query );
		// returns the query
		$results_array = $query_result->fetchAll(PDO::FETCH_ASSOC);

		if ( $database_config['debug'] ){
			echo "<pre>";
			print_r( $results_array );
			echo"</pre>";
		}

		foreach ($results_array as $product) {
			?>
			<div class="col-md-4 col-xs-12 productlisting">
				<h2><?php echo $product['naam']; ?></h2>
				<p>€ <?php echo $product['prijs']; ?></p>
				<a href="./cart.php?pid=<?php echo $product['id']; ?>">Add to cart</a>
			</div>
			<?php 
		}
		?>

	</div>
</div>

<!-- above is html -->

<?php include'footer.php';?>