<?php

include 'vendor/autoload.php';


const HOST = 'db'; // the IP of the database
const DBNAME = 'web_project'; // the database name to be used
const USERNAME = 'user'; // the username to be used with the database
const PASSWORD = 'test'; // the password to be used with the username

ini_set('display_errors', '1');

try {
    $database = SimplePDO::getInstance();
    $settings_data = check_setting($database);
    $current_datetime = date("Y-m-d H:i:s");
    $last_attempt_datetime = date("Y-m-d H:i:s",strtotime($settings_data['last_attempt']));
    
    $interval = date_diff(date_create($current_datetime),date_create($last_attempt_datetime));
    if ( $interval->i >= $settings_data['update_interval']){
	    $database->query("SELECT * FROM `rss_sources`");
		$result = $database->resultSet();
		foreach ($result as $key => $value) {
			$source_id = $value['id'];
			update_source_attempt($database,$value['id']);
			update_source_dates($database,$value['id']);
			$news_data = get_feeds_xml($value['link']);
			foreach ($news_data->channel->item as $value) {
				$feedData = array( 'source_id' => $source_id, 
					'title' => $value->title, 
					'desc' => $value->description, 
					'link' => $value->link, 
					'pub_date' => date("Y-m-d H:i:s",strtotime($value->pubDate)), 
					'updated_date' => date("Y-m-d H:i:s"), 
					'status' => 1
				);

				$results = select_feed($database,$value->link);
				if (count($results) > 1){
					echo "data exists need update";
					update_feed($database,$feedData);
				}else{
					insert_feed($database,$feedData);
				}
				
				echo "<br> Data Updated <br>";
			}
		}
	}
	else{
		$database->query("SELECT * FROM `rss_sources`");
		$result = $database->resultSet();
		foreach ($result as $key => $value) {
			$source_id = $value['id'];
			update_source_attempt($database,$value['id']);
		}
	}
	
} catch( PDOException $e ) {
	print($e);
    //Do whatever you'd like with the error here
}


function get_feeds_xml($link){
	$xmlData = file_get_contents($link);
	$xml=simplexml_load_string($xmlData);
	return $xml;
}

function select_feed($database,$link){
	$database->query("SELECT * FROM `rss_feeds` WHERE link = :link");
	$database->bind(':link', $link);
	return $database->single();
}

function insert_feed($database,$data){
	$database->query("INSERT INTO `rss_feeds` (`source_id`, `title`, `description`, `link`, `pub_date`, `updated_date`, `status`) VALUES (:source_id, :title, :desc, :link, :pub_date, :updated_date, :status)");
	$database->bind(':source_id', $data['source_id']);
	$database->bind(':title', $data['title']);
	$database->bind(':desc', $data['desc']);
	$database->bind(':link', $data['link']);
	$database->bind(':pub_date', $data['pub_date']);
	$database->bind(':updated_date', $data['updated_date']);
	$database->bind(':status', $data['status']);
	$database->execute();
}

function update_feed($database,$data){
	$database->query("UPDATE `rss_feeds` SET `source_id` = :source_id, `title` = :title, `description` = :desc, `pub_date` = :pub_date, `updated_date` = :updated_date, `status` = :status WHERE `link` = :link");
	$database->bind(':source_id', $data['source_id']);
	$database->bind(':title', $data['title']);
	$database->bind(':desc', $data['desc']);
	$database->bind(':link', $data['link']);
	$database->bind(':pub_date', $data['pub_date']);
	$database->bind(':updated_date', $data['updated_date']);
	$database->bind(':status', $data['status']);
	$database->execute();
}

function update_source_attempt($database,$id){
	$database->query("UPDATE `rss_sources` SET `update_attempt` = :update_attempt WHERE `id` = :id");
	$database->bind(':update_attempt', date("Y-m-d H:i:s"));
	$database->bind(':id', $id);
	$database->execute();

	$database->query("UPDATE `settings` SET `last_attempt` = :last_attempt WHERE `id` = 1");
	$database->bind(':last_attempt', date("Y-m-d H:i:s"));
	$database->execute();
}

function update_source_dates($database,$id){
	$database->query("UPDATE `rss_sources` SET `updated_data` = :updated_data WHERE `id` = :id");
	$database->bind(':updated_data', date("Y-m-d H:i:s"));
	$database->bind(':id', $id);
	$database->execute();
}

function check_setting($database){
	$database->query("SELECT * FROM `settings`");
	return $database->single();
}
?>