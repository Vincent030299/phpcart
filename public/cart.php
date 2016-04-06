<?php include'header.php';?>
<?php include'database.php';?>

<?php


session_start();

if ( isset ( $_GET['pid'] )  ){
	if ( !isset( $_SESSION['cart_content'] ) ){
		$_SESSION['cart_content'] = $_GET['pid'];
	}else {
		$_SESSION['cart_content'] .= ',';
		$_SESSION['cart_content'] .= $_GET['pid'];
	}
}

if ( isset ( $_GET['empty'] ) ) {
	session_destroy();
	header('location: cart.php');
}
if ( $database_config['debug'] ) {
	echo "<pre>";
	print_r( $_SESSION);
	echo "</pre>";
}

?>

<!-- below is html -->


<!-- above is html -->

<?php include'footer.php';?>