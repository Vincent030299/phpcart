<?php
$database_config = parse_ini_file("config.ini");

echo "<pre>";
print_r( $database_config );
echo"</pre>";

try {
	$conn = new PDO
		("mysql:host=" . $database_config['host'] .
	 	";dbname=". $database_config['database'],
	 	$database_config['user'],
	 	$database_config['password']
	 	);
    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully"; 
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}
?>