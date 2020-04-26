<?php

include 'vendor/autoload.php';


const HOST = 'db'; // the IP of the database
const DBNAME = 'web_project'; // the database name to be used
const USERNAME = 'user'; // the username to be used with the database
const PASSWORD = 'test'; // the password to be used with the username

ini_set('display_errors', '1');

try {
	$pubdate = date('Y-m-d', strtotime('-30 days'));
	$pub_date = $pubdate." 23:59:59";
    $database = SimplePDO::getInstance();
    $database->query("DELETE FROM `rss_feeds` WHERE pub_date <= :pubdate");
    $database->bind(':pubdate', $pubdate);
    $database->execute();
	echo "<br> Data Deleted <br>";
	
} catch( PDOException $e ) {
	print($e);
}

?>