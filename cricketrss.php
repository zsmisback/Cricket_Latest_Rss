<?php

include 'Back_End/config.php';

$url = "https://www.espncricinfo.com/rss/content/story/feeds/0.xml";
$xml = simplexml_load_file($url);




for($i=0;$i<sizeof($xml->channel->item);$i++)
{
	$title = $xml->channel->item[$i]->title;
	$description = $xml->channel->item[$i]->description;
	$pubdate = $xml->channel->item[$i]->pubDate;
	$links = $xml->channel->item[$i]->link;
	
	$sql = "INSERT INTO latest_cric_news(title,description,pubdate,link)VALUES('$title','$description','$pubdate','$links')";
	$result = $db->query($sql);
}


?>

